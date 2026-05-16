const express = require('express');
const mysql = require('mysql2');
const path = require('path');
const cors = require('cors');

const app = express();
app.use(express.json());
app.use(cors());

// Servir os arquivos estáticos (HTML)
app.use(express.static(path.join(__dirname)));

// Configuração do Banco de Dados usando variáveis de ambiente
const dbConfig = {
  host: process.env.DB_HOST || 'db',
  user: process.env.DB_USER || 'root',
  password: process.env.DB_PASSWORD || 'unify123',
  database: process.env.DB_NAME || 'unify_db'
};

let db;

// Função para conectar ao banco com tentativas (pois o DB demora mais para subir que o Node)
function connectWithRetry() {
  db = mysql.createConnection(dbConfig);
  db.connect((err) => {
    if (err) {
      console.log('Falha ao conectar ao banco. Tentando novamente em 5 segundos...', err.message);
      setTimeout(connectWithRetry, 5000);
    } else {
      console.log('Conectado ao banco de dados MySQL com sucesso!');
      // Criar a tabela de músicas automaticamente
      const createTableQuery = `
        CREATE TABLE IF NOT EXISTS musics (
          id INT AUTO_INCREMENT PRIMARY KEY,
          title VARCHAR(255) NOT NULL,
          artist VARCHAR(255) NOT NULL,
          genre VARCHAR(100) NOT NULL
        )
      `;
      db.query(createTableQuery, (err) => {
        if (err) console.error('Erro ao criar tabela:', err);
        else console.log('Tabela de músicas pronta para uso no UNIFY.');
      });
    }
  });
}

connectWithRetry();

// ROTA: Cadastrar Música (CREATE)
app.post('/api/musics', (req, res) => {
  const { title, artist, genre } = req.body;
  const query = 'INSERT INTO musics (title, artist, genre) VALUES (?, ?, ?)';
  db.query(query, [title, artist, genre], (err, results) => {
    if (err) return res.status(500).json({ error: err.message });
    res.status(201).json({ id: results.insertId, title, artist, genre });
  });
});

// ROTA: Consultar Músicas (READ)
app.get('/api/musics', (req, res) => {
  const query = 'SELECT * FROM musics ORDER BY id DESC';
  db.query(query, (err, results) => {
    if (err) return res.status(500).json({ error: err.message });
    res.status(200).json(results);
  });
});

// Iniciar o servidor
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Servidor UNIFY rodando na porta ${PORT}`);
});