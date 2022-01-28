// tipos literais (literal types)
const caraOuCoroa = (): 'Cara'|'Coroa' => Math.random() < 0.5 ? 'Cara' : 'Coroa'
console.log(caraOuCoroa())

// declarando um enum
enum Naipe1 {
    OURO,
    BELO,
    ESPADA,
    PAUS
}
console.log(Naipe1.ESPADA) // 2

const descricaoNaipe = (naipe: Naipe1): string => {
    if (Naipe1.BELO === naipe) return 'Sete belo'
    if (Naipe1.OURO === naipe) return 'Douro'
    if (Naipe1.ESPADA === naipe) return 'Espadachim'
    if (Naipe1.PAUS === naipe) return 'Vara'
    return 'Nada'
}
console.log(descricaoNaipe(Naipe1.BELO))

// definindo um tipo literal com uniões (type=semelhante a interface)
type Naipe = 'Ouro'|'Belo'|'Espada'|'Paus'