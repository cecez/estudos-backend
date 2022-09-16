const listaLivros = require("./arrayOrdenado");

function busca(lista, de, para, valorItemBuscado) {
  if (de > para) return -1;

  const indiceMeio = Math.floor((de + para) / 2);
  const itemMeio = lista[indiceMeio];
  const valorItemMeio = itemMeio.preco;

  if (valorItemBuscado === valorItemMeio) return itemMeio;
  if (valorItemBuscado < valorItemMeio)
    return busca(lista, de, indiceMeio - 1, valorItemBuscado);
  if (valorItemBuscado > valorItemMeio)
    return busca(lista, indiceMeio + 1, para, valorItemBuscado);
}

console.log(listaLivros);
console.log(busca(listaLivros, 0, listaLivros.length - 1, 36));
