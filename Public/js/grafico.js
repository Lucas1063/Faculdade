document.addEventListener("DOMContentLoaded", function () {
    carregarFeedbacks(); // Carrega os feedbacks ao iniciar
});

// Função para carregar feedbacks e exibi-los na tabela
function carregarFeedbacks() {
    const feedbackTableBody = document.getElementById('feedbackTableBody');

    fetch('../Public/scr/data.php')
        .then(response => { 
            if (!response.ok) {
                throw new Error("Erro ao carregar os dados do feedback.");
            }
            return response.json();
        })
        .then(data => {
            if (data.feedbacks && data.feedbacks.length > 0) {
                feedbackTableBody.innerHTML = ''; 
                data.feedbacks.forEach(feedback => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${feedback.pergunta}</td>
                        <td>${feedback.setor}</td> <!-- Exibe o setor -->
                        <td>${feedback.feedback}</td>
                        <td>${feedback.nota}</td>
                        <td>${feedback.data_hora}</td>
                    `;
                    feedbackTableBody.appendChild(row);
                });
            } else {
                feedbackTableBody.innerHTML = '<tr><td colspan="5">Nenhum feedback encontrado.</td></tr>';
            }
        })
        .catch(error => {
            console.error("Erro ao carregar feedbacks:", error.message);
            feedbackTableBody.innerHTML = '<tr><td colspan="5">Erro ao carregar os feedbacks.</td></tr>';
        });
}


// Função para renderizar o gráfico
function renderGrafico() {
    const ctx = document.getElementById('graficoMedia').getContext('2d');

    fetch('../Public/scr/data.php')
        .then(response => { 
            if (!response.ok) {
                throw new Error("Erro ao carregar os dados do gráfico.");
            }
            return response.json();
        })
        .then(data => {
            if (data.medias && data.medias.length > 0) {
                const labels = data.medias.map(item => item.pergunta); 
                const valores = data.medias.map(item => item.media); 

                new Chart(ctx, {
                    type: 'bar', 
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Média das Respostas',
                            data: valores,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Perguntas',
                                    color: '#333',
                                    font: {
                                        size: 14,
                                        weight: 'bold'
                                    }
                                },
                                ticks: {
                                    display: false // Oculta os rótulos no eixo X
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Média',
                                    color: '#333',
                                    font: {
                                        size: 14,
                                        weight: 'bold'
                                    }
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                position: 'top'
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    }
                });
            } else {
                console.error("Nenhum dado disponível para o gráfico.");
            }
        })
        .catch(error => {
            console.error("Erro ao carregar os dados do gráfico:", error.message);
        });
}


let chartRendered = false;

// Função para alternar entre abas
function openTab(tabId) {
    const contents = document.querySelectorAll('.tab-content');
    contents.forEach(content => content.style.display = 'none');

    const tab = document.getElementById(tabId);
    if (tab) {
        tab.style.display = 'block';
    }

    if (tabId === 'grafico' && !chartRendered) {
        renderGrafico();
        chartRendered = true;
    }
}
