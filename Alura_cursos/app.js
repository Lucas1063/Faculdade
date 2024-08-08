alert ('Boas vindas ao jogo do numero secreto'); //apenas exibe uma mensagem
let numeroSecreto = 29; //define variavel que guarda o numero secreto let = define variavel
console.log (numeroSecreto); // mostra o numero da variavel numerosecreto no console
let chute;
let tentativas = 1;
// != não igual| == igual | > maior que| < menor que

while (chute != numeroSecreto){
    chute = prompt ('Escolha um número entre 1 e 30'); //mostra uma mensagem e permite que o usuario informe o valor
    //se chute for igual ao numero secreto
  if (numeroSecreto == chute ) {
        alert (`isso ai! Você descobriu o numero secreto ${numeroSecreto} com ${tentativas}` ) 
     } else {
         if (chute > numeroSecreto ){
             alert (`o numero secreto é menor que ${chute}`);
         } else {
             alert (`o numero secreto é maior que ${chute}`);
         }
         tentativas++; // ++ é uma forma de atribuir + 1 e -- diminui o valor

        }

}
