function getvalor1() {
    return parseFloat(document.getElementById("valor1").value) || 0;
}

function getvalor2() {
    return parseFloat(document.getElementById("valor2").value) || 0;
}

function soma() {
    informaresultado(getvalor1() + getvalor2());
}

function subtracao() {
    informaresultado(getvalor1() - getvalor2());
}

function multiplicacao() {
    informaresultado(getvalor1() * getvalor2());
}

function divisao() {
    var valor2 = getvalor2();
    if (valor2 === 0) {
        informaresultado('Erro: Divisão por zero');
        return;
    }
    informaresultado(getvalor1() / valor2);
}

function informaresultado(valor) {
    var elresultado = document.getElementById("resultado");
    if (typeof valor === 'string') {
        elresultado.value = valor;
        elresultado.style.backgroundColor = "gray";
    } else {
        elresultado.value = valor;
        if (valor < 0) {
            elresultado.style.backgroundColor = "red";
        } else if (valor > 0) {
            elresultado.style.backgroundColor = "green";
        } else {
            elresultado.style.backgroundColor = "gray";
        }
    }
}
