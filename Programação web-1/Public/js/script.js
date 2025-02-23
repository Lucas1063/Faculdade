document.addEventListener("DOMContentLoaded", function () {
    const perguntasTableBody = document.getElementById('perguntasTableBody');
    const setorPergunta = document.getElementById('setorPergunta');
    const addPerguntaForm = document.getElementById('addPerguntaForm');
    const modal = document.getElementById('modal');
    const listaPerguntas = document.getElementById('listaPerguntas');
    const setoresTableBody = document.getElementById("setoresTableBody");
    const addSetorForm = document.getElementById("addSetorForm");
    const basePerguntasPath = '../public/scr/perguntas.php';
    const baseSetoresPath = '../public/scr/setores.php';

    // Função para carregar perguntas e setores
    function carregarPerguntasESetores() {
        fetch(basePerguntasPath)
            .then(response => response.json())
            .then(data => {
                // Preencher dropdown de setores
                setorPergunta.innerHTML = ''; // Limpa o dropdown
                data.setores.forEach(setor => {
                    const option = document.createElement('option');
                    option.value = setor.id_setor;
                    option.textContent = setor.nome_setor;
                    setorPergunta.appendChild(option);
                });

                // Preencher tabela de perguntas
                perguntasTableBody.innerHTML = ''; // Limpa a tabela
                data.perguntas.forEach(pergunta => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${pergunta.id_pergunta}</td>
                        <td>${pergunta.texto_pergunta}</td>
                        <td>${pergunta.nome_setor}</td>
                        <td>
                            <button class="delete-button" data-id="${pergunta.id_pergunta}">Excluir</button>
                        </td>
                    `;
                    perguntasTableBody.appendChild(row);
                });
            })
            .catch(error => console.error("Erro ao carregar perguntas e setores:", error.message));
    }

    // Função para carregar setores
    function carregarSetores() {
        fetch(baseSetoresPath)
            .then(response => response.json())
            .then(data => {
                setoresTableBody.innerHTML = ""; // Limpa a tabela
                if (data.setores && data.setores.length > 0) {
                    data.setores.forEach(setor => {
                        const row = document.createElement("tr");
                        row.innerHTML = `
                            <td>${setor.id}</td>
                            <td>${setor.nome}</td>
                            <td>
                                <button class="delete-setor-button" data-id="${setor.id}">Excluir</button>
                            </td>
                        `;
                        setoresTableBody.appendChild(row);
                    });
                } else {
                    setoresTableBody.innerHTML = '<tr><td colspan="3">Nenhum setor cadastrado.</td></tr>';
                }
            })
            .catch(error => console.error("Erro ao carregar setores:", error.message));
    }

    // Função para adicionar ou editar pergunta
    addPerguntaForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(addPerguntaForm);

        fetch(basePerguntasPath, {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                if (result.success) {
                    carregarPerguntasESetores(); // Atualiza a lista
                    addPerguntaForm.reset(); // Limpa o formulário
                }
            })
            .catch(error => console.error("Erro ao adicionar ou editar pergunta:", error.message));
    });

    // Adicionar evento para exclusão de perguntas
    perguntasTableBody.addEventListener('click', function (e) {
        if (e.target.classList.contains('delete-button')) {
            const idPergunta = e.target.getAttribute('data-id');
            if (confirm("Tem certeza que deseja excluir esta pergunta?")) {
                fetch(basePerguntasPath, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `idPergunta=${encodeURIComponent(idPergunta)}`
                })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        if (result.success) {
                            carregarPerguntasESetores(); // Atualiza a lista
                        }
                    })
                    .catch(error => console.error("Erro ao excluir pergunta:", error.message));
            }
        }
    });

    // Evento para adicionar setor
    addSetorForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const nomeSetor = document.getElementById("nomeSetor").value;

        fetch(baseSetoresPath, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ nomeSetor }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    carregarSetores();
                    addSetorForm.reset();
                }
            })
            .catch(error => console.error("Erro ao adicionar setor:", error.message));
    });

    // Adicionar evento para exclusão de setores
    setoresTableBody.addEventListener("click", function (e) {
        if (e.target.classList.contains("delete-setor-button")) {
            const idSetor = e.target.getAttribute("data-id");
            if (confirm("Tem certeza que deseja excluir este setor?")) {
                fetch(`${baseSetoresPath}?id=${idSetor}`, {
                    method: "DELETE",
                })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        if (data.success) {
                            carregarSetores();
                        }
                    })
                    .catch(error => console.error("Erro ao excluir setor:", error.message));
            }
        }
    });
    // Carrega perguntas e setores ao iniciar
    carregarPerguntasESetores();
    carregarSetores();
});

    // Adicionar pergunta
    addPerguntaForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(addPerguntaForm);

        fetch(basePath, {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Erro ao adicionar pergunta.");
                }
                return response.json();
            })
            .then(result => {
                alert(result.message);
                if (result.success) {
                    carregarPerguntasESetores(); // Atualiza a lista
                    addPerguntaForm.reset(); // Limpa o formulário
                }
            })
            .catch(error => {
                console.error("Erro ao adicionar pergunta:", error.message);
            });
    });

    // Adicionar evento para exclusão
    perguntasTableBody.addEventListener('click', function (e) {
        if (e.target.classList.contains('delete-button')) {
            const idPergunta = e.target.getAttribute('data-id');
            if (confirm("Tem certeza que deseja excluir esta pergunta?")) {
                fetch(basePath, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `idPergunta=${encodeURIComponent(idPergunta)}`
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("Erro ao excluir pergunta.");
                        }
                        return response.json();
                    })
                    .then(result => {
                        alert(result.message);
                        if (result.success) {
                            carregarPerguntasESetores(); // Atualiza a lista
                        }
                    })
                    .catch(error => {
                        console.error("Erro ao excluir pergunta:", error.message);
                    });
            }
        }
    });

    // Função para abrir modal para adicionar/editar perguntas
    document.getElementById("adicionarPergunta").addEventListener("click", function () {
        modal.style.display = "flex";
        addPerguntaForm.reset(); 
    });

    // Fechar modal
    modal.querySelector(".close").addEventListener("click", function () {
        modal.style.display = "none";
    });
