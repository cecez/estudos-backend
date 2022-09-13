const { edFolha, edGalho } = require("./arrays");

function juntaListas(lista1, lista2) {
  let listaFinal = [];
  let posicaoAtualLista1 = 0;
  let posicaoAtualLista2 = 0;
  let indiceListaFinal = 0;

  while (
    posicaoAtualLista1 < lista1.length &&
    posicaoAtualLista2 < lista2.length
  ) {
    let itemAtualLista1 = lista1[posicaoAtualLista1];
    let itemAtualLista2 = lista2[posicaoAtualLista2];

    if (itemAtualLista1.preco < itemAtualLista2.preco) {
      listaFinal[indiceListaFinal++] = itemAtualLista1;
      posicaoAtualLista1++;
    } else {
      listaFinal[indiceListaFinal++] = itemAtualLista2;
      posicaoAtualLista2++;
    }
  }

  while (posicaoAtualLista1 < lista1.length) {
    listaFinal[indiceListaFinal++] = lista1[posicaoAtualLista1++];
  }

  while (posicaoAtualLista2 < lista2.length) {
    listaFinal[indiceListaFinal++] = lista2[posicaoAtualLista2++];
  }

  return listaFinal;
}

function juntaListas2(lista1, lista2) {
    let listaFinal = [];
    const tamanhoListaFinal = lista1.length + lista2.length;
    let indiceLista1 = 0, indiceLista2 = 0;
    for (let indiceListaFinal = 0; indiceListaFinal < tamanhoListaFinal; indiceListaFinal++) {
        if (indiceLista1 >= lista1.length) listaFinal[indiceListaFinal] = lista2[indiceLista2++];
        else if (indiceLista2 >= lista2.length) listaFinal[indiceListaFinal] = lista1[indiceLista1++];
        else if (lista1[indiceLista1].preco < lista2[indiceLista2].preco) listaFinal[indiceListaFinal] = lista1[indiceLista1++]; 
        else listaFinal[indiceListaFinal] = lista2[indiceLista2++];
    }
    return listaFinal;
}

// console.log(juntaListas(edFolha, edGalho));
console.log(juntaListas2(edFolha, edGalho));
