document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    // Validação simples para garantir que todas as perguntas foram respondidas antes de enviar
    form.addEventListener("submit", function (event) {
        const respostas = document.querySelectorAll("input[type='hidden']");
        let allFilled = true;

        respostas.forEach(input => {
            if (input.value === "") {
                allFilled = false;
            }
        });

        if (!allFilled) {
            alert("Por favor, responda todas as perguntas.");
            event.preventDefault();
        }
    });

    // Função para avançar para a próxima pergunta
    window.proximaPergunta = function (index) {
        const perguntas = document.querySelectorAll(".pergunta");
        perguntas[index].style.display = "none";
        if (index + 1 < perguntas.length) {
            perguntas[index + 1].style.display = "block";
        } else {
            document.getElementById("enviarAvaliacao").style.display = "block"; // Exibe o botão de envio no final
        }
    };

    // Função para selecionar uma nota e ativar o botão de confirmação
    window.selecionarNota = function (botao, index) {
        const valor = botao.getAttribute("data-valor");
        const inputResposta = document.getElementById(`resposta-${index}`);
        const confirmarBtn = document.querySelector(`#pergunta-${index} .confirmar-btn`);

        // Define o valor selecionado no input escondido
        inputResposta.value = valor;

        // Remove a classe "selecionado" de todos os botões e adiciona ao botão clicado
        const botoes = document.querySelectorAll(`#pergunta-${index} .botao-nota`);
        botoes.forEach(b => b.classList.remove("selecionado"));
        botao.classList.add("selecionado");

        // Ativa o botão de confirmação
        confirmarBtn.disabled = false;
    };
});
