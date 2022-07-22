const dados = [10, 3, 11, 0, 90, 14, 44, 7];

for (let indice = 1 ; indice < dados.length; indice++) {
    let indiceAtual = indice;
    while (indiceAtual - 1 >= 0 && dados[indiceAtual] < dados[indiceAtual - 1]) {
        let valorAnterior = dados[indiceAtual - 1];
        dados[indiceAtual - 1] = dados[indiceAtual];
        dados[indiceAtual] = valorAnterior;
        indiceAtual--;
    }
}

console.log(dados);