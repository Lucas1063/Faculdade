# Usar a imagem oficial do Node
FROM node:18-alpine

# Definir diretório de trabalho no container
WORKDIR /usr/src/app

# Copiar os arquivos de dependências
COPY app/package*.json ./

# Instalar dependências
RUN npm install

# Copiar o resto do código da aplicação
COPY app/ ./

# Expor a porta 3000
EXPOSE 3000

# Comando para iniciar a aplicação
CMD ["npm", "start"]