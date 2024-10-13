const perguntas = [
    "Com base na sua experiência em nossa instituição, como você avaliaria nosso atendimento?",
    "Como você avaliaria a limpeza do ambiente?",
    "Você ficou satisfeito com a rapidez do atendimento?",
    "Como você avaliaria a qualidade dos serviços prestados?",
    "Você recomendaria nossos serviços a amigos ou familiares?",
    // Adicione mais perguntas conforme necessário
];

let perguntaAtual = 0;

// Função para carregar a pergunta atual
function carregarPergunta() {
    const perguntaElement = document.getElementById('pergunta');
    const botoesElement = document.getElementById('botoes');
    const lerPerguntaButton = document.getElementById('ler-pergunta');

    if (perguntaAtual < perguntas.length) {
        perguntaElement.innerText = perguntas[perguntaAtual];
        botoesElement.innerHTML = ''; // Limpa botões antigos

        // Cria botões para as respostas de 0 a 10
        for (let i = 0; i <= 10; i++) {
            const botao = document.createElement('button');
            botao.classList.add('btn-resposta');
            botao.innerText = i;
            botao.onclick = () => {
                processarResposta(i);
            };
            botoesElement.appendChild(botao);
        }
    } else {
        // Se não houver mais perguntas, finalize
        perguntaElement.innerText = "Obrigado por suas respostas!";
        botoesElement.innerHTML = ''; // Limpa os botões
        lerPerguntaButton.style.display = 'none'; // Esconde o botão de ler
    }
}

// Função para processar a resposta e passar para a próxima pergunta
function processarResposta(resposta) {
    console.log(`Resposta para pergunta ${perguntaAtual + 1}: ${resposta}`);
    perguntaAtual++;
    carregarPergunta();
}

// Função para ler a pergunta em voz alta
function lerPergunta() {
    const perguntaElement = document.getElementById('pergunta').innerText;
    const utterance = new SpeechSynthesisUtterance(perguntaElement);
    window.speechSynthesis.speak(utterance);
}

// Adiciona o evento de clique para o botão de ler pergunta
document.getElementById('ler-pergunta').addEventListener('click', lerPergunta);

// Carregar a primeira pergunta quando a página for carregada
document.addEventListener('DOMContentLoaded', () => {
    carregarPergunta();
});
