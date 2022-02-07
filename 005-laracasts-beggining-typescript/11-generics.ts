interface Caixa<T> {
    conteudo: T
}

const caixaUm: Caixa<string[]> = {
    conteudo: ["stringue", "estilingue"]
}

const caixaIdades: Caixa<number[]> = {
    conteudo: [12, 13, 14]
}

const caixaNome: Caixa<string> = {
    conteudo: "estringue"
}


///
const identidade = <T>(x: T): T => x


///
const elementoAleatorio = <A>(xs: A[]): A => {
    const indice = Math.floor(Math.random() * xs.length)
    return (xs[indice] as A)
}

const umNumero = elementoAleatorio([1, 2, 3])
const umaLetra = elementoAleatorio(['a', 'B', 'c'])
const umaZoera = elementoAleatorio([1, 2, 'a', false, {"ate": "objeto"}])