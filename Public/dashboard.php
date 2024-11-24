<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dash.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/grafico.js" defer></script>
    <script src="js/script.js" defer></script>
</head>

<body>
    <div class="dashboard-container">
        <h1>Dashboard</h1>
        <div class="dashboard-buttons">
            <button class="tab-button" onclick="openTab('grafico')">Gráficos</button>
            <button class="tab-button" onclick="openTab('feedbacks')">Feedbacks</button>
            <button class="tab-button" onclick="openTab('gerenciar')">Gerenciar Perguntas</button>
            <button class="tab-button" onclick="openTab('gerenciarSetores')">Gerenciar Setores</button>
        </div>

        <!-- Conteúdo de Gráficos -->
        <div id="grafico" class="tab-content">
            <canvas id="graficoMedia"></canvas>
        </div>

        <!-- Conteúdo de Feedbacks -->
        <div id="feedbacks" class="tab-content">
            <table>
                <thead>
                    <tr>
                        <th>Pergunta</th>
                        <th>Setor</th>
                        <th>Feedback</th>
                        <th>Nota</th>
                        <th>Data/Hora</th>
                    </tr>
                </thead>
                <tbody id="feedbackTableBody">
                    <!-- Feedbacks serão carregados aqui -->
                </tbody>
            </table>
        </div>

        <!-- Conteúdo para Gerenciar Perguntas -->
        <div id="gerenciar" class="tab-content">
            <h2>Gerenciar Perguntas</h2>

            <form id="addPerguntaForm" class="form-container">
                <label for="textoPergunta">Nova Pergunta:</label>
                <textarea id="textoPergunta" name="textoPergunta" required></textarea>
                <label for="setorPergunta">Setor:</label>
                <select id="setorPergunta" name="setorPergunta" required>
                    <!-- Setores serão carregados dinamicamente -->
                </select>
                <button type="submit">Adicionar Pergunta</button>
            </form>


            <!-- Lista de perguntas para excluir -->
            <h3>Perguntas Cadastradas</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pergunta</th>
                        <th>Setor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="perguntasTableBody">
                    <!-- Perguntas serão carregadas dinamicamente -->
                </tbody>
            </table>
        </div>

        <!-- Conteúdo da aba de Gerenciar Setores -->
        <div id="gerenciarSetores" class="tab-content">
            <h2>Gerenciar Setores</h2>

            <!-- Formulário para adicionar setores -->
            <form id="addSetorForm" class="form-container">
                <label for="nomeSetor">Nome do Setor:</label>
                <input type="text" id="nomeSetor" name="nomeSetor" required>
                <button type="submit">Adicionar Setor</button>
            </form>


            <!-- Lista de setores -->
            <h3>Setores Cadastrados</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Setor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="setoresTableBody">
                    <!-- Os setores serão carregados dinamicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Função para alternar entre abas
        function openTab(tabId) {
            // Oculta todos os conteúdos
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => content.style.display = 'none');

            // Exibe o conteúdo correspondente à aba clicada
            const tab = document.getElementById(tabId);
            if (tab) {
                tab.style.display = 'block';
            }
        }

        // Esconde todos os conteúdos no início
        document.addEventListener('DOMContentLoaded', function () {
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => content.style.display = 'none');

            // Abre a primeira aba por padrão
            openTab('grafico');
        });
    </script>
</body>

</html>