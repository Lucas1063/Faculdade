
    // Função para selecionar uma nota
    window.selecionarNota = function (botao, index) {
        const valor = botao.getAttribute("data-valor");
        const inputResposta = document.getElementById(`resposta-${index}`);
        const confirmarBtn = document.querySelector(`#pergunta-${index} .confirmar-btn`);

        inputResposta.value = valor;

        const botoes = document.querySelectorAll(`#pergunta-${index} .botao-nota`);
        botoes.forEach(b => b.classList.remove("selecionado"));

        botao.classList.add("selecionado");
        confirmarBtn.disabled = false;
    };

    // Função para avançar para a próxima pergunta
    window.proximaPergunta = function (index) {
        const perguntas = document.querySelectorAll(".pergunta");
        perguntas[index].style.display = "none";

        if (index + 1 < perguntas.length) {
            perguntas[index + 1].style.display = "block";
        } else {
            document.getElementById("enviarAvaliacao").style.display = "block";
        }
    };

    // Evento para capturar o clique no botão de edição
    const perguntasTableBody = document.getElementById('perguntasTableBody');
    perguntasTableBody.addEventListener('click', function (e) {
        if (e.target.classList.contains('edit-button')) {
            const idPergunta = e.target.getAttribute('data-id');
            const textoPergunta = e.target.getAttribute('data-texto');
            const idSetor = e.target.getAttribute('data-setor');

            document.getElementById('idPergunta').value = idPergunta;
            document.getElementById('textoPergunta').value = textoPergunta;
            document.getElementById('setorPergunta').value = idSetor;
            document.getElementById('addPerguntaForm').scrollIntoView();
        }

        if (e.target.classList.contains('delete-button')) {
            const idPergunta = e.target.getAttribute('data-id');
            if (confirm("Tem certeza que deseja excluir esta pergunta?")) {
                fetch('../public/scr/perguntas.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `idPergunta=${encodeURIComponent(idPergunta)}`
                })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        if (result.success) {
                            carregarPerguntasESetores();
                        }
                    })
                    .catch(error => console.error("Erro ao excluir pergunta:", error.message));
            }
        }
    });

    // Submissão do formulário de pergunta
    const addPerguntaForm = document.getElementById('addPerguntaForm');
    addPerguntaForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(addPerguntaForm);

        fetch('../public/scr/perguntas.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                if (result.success) {
                    carregarPerguntasESetores();
                    addPerguntaForm.reset();
                    document.getElementById('idPergunta').value = '';
                }
            })
            .catch(error => console.error("Erro ao adicionar ou editar pergunta:", error.message));
    });

    // Carregar perguntas e setores ao iniciar
    carregarPerguntasESetores();
