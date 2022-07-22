const dados = [22, 10, 456, 11, 9, 99, 33];

let indiceMenorValor;
dados.forEach((valor, indice) => {
    indiceMenorValor = indice;
    for (let i = indice; i < dados.length; i++) {
        if (dados[i] < dados[indiceMenorValor]) {
            indiceMenorValor = i;
        }
    }

    dados[indice] = dados[indiceMenorValor];
    dados[indiceMenorValor] = valor;
})

console.log(dados);