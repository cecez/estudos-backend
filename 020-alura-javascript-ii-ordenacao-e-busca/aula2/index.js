const listaLivros = require("./arrays");

function mergeSort(array) {
  if (array.length > 1) {
    const meio = Math.floor(array.length / 2);
    const parte1 = mergeSort(array.slice(0, meio));
    const parte2 = mergeSort(array.slice(meio, array.length));
    array = ordena(parte1, parte2);
  }

  return array;
}

function ordena(lista1, lista2) {
  let listaFinal = [];
  const tamanhoListaFinal = lista1.length + lista2.length;
  let indiceLista1 = 0,
    indiceLista2 = 0;
  for (
    let indiceListaFinal = 0;
    indiceListaFinal < tamanhoListaFinal;
    indiceListaFinal++
  ) {
    if (indiceLista1 >= lista1.length)
      listaFinal[indiceListaFinal] = lista2[indiceLista2++];
    else if (indiceLista2 >= lista2.length)
      listaFinal[indiceListaFinal] = lista1[indiceLista1++];
    else if (lista1[indiceLista1].preco < lista2[indiceLista2].preco)
      listaFinal[indiceListaFinal] = lista1[indiceLista1++];
    else listaFinal[indiceListaFinal] = lista2[indiceLista2++];
  }
  return listaFinal;
}

console.log(mergeSort(listaLivros));
