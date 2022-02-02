// na maior parte do tempo, independe usar "interface" ou "type", porém há diferenças

// qual usar?
// interface = tipos de dados padrão
interface Usuario {
    id: "string",
    nome: "string",
    idade: number
}

interface Timestamps {
    createdAt: Date,
    updatedAt: Date,
}

// type = unions e intersecções
type Naipes = 'CORACAO' | 'OURO' | 'PAUS' | 'ESPADA' // unions
type DadoPersistido = Usuario & Timestamps  // intersection

// principais diferenças
//
// - é garantido que as interfaces são "nomeadas" nas mensagens de erro, type não
// - interfaces não podem ser usadas para renomear typos literais ou primitivos
type OutraString = string;

// - type não podem participar das declarações mescladas que as interfaces podem
interface UsuarioMesclado {
    id: string
    nome: string
}

interface UsuarioMesclado {
    idade: number
}

// as duas interfaces são mescladas!? sim.

const usuarioMescladinho: UsuarioMesclado = {
    id: "um",
    nome: "Nominho",
    idade: 12
}
