package main

import "fmt"
import "os"

// import "reflect"

func main() {
	boasVindas()
	exibeMenuDeOpcoes()
	var opcaoEscolhida = pedeOpcaoDoUsuario()
	processaOpcaoEscolhida(opcaoEscolhida)
}

func boasVindas() {
	// Go possui inferência de tipos, ou seja,
	// a partir da atribuição ela descobre o tipo, por exemplo:
	// var nome = "conteúdo" (string)
	// const idade = 22 (int)
	// const versao = 1.1 (float64)
	var nome = "Cezar"
	const versao float32 = 0.1

	// operador de declaração curta de variáveis:
	// declara uma variável e infere seu tipo (a := "conteudo")
	idade := 36

	fmt.Println("Olá mundo e", nome, "que tem", idade, "anos, certo?")
	fmt.Println("Versão do software:", versao)

	// fmt.Println("O tipo da variável nome é", reflect.TypeOf(nome))
	// fmt.Println("O tipo da variável idade é", reflect.TypeOf(idade))
	// fmt.Println("O tipo da variável versao é", reflect.TypeOf(versao))
}

func exibeMenuDeOpcoes() {
	fmt.Println("####### Menu de opções ########")
	fmt.Println("# 1 - Iniciar monitoramento   #")
	fmt.Println("# 2 - Exibir logs             #")
	fmt.Println("# 0 - Sair                    #")
	fmt.Println("###############################")
}

func pedeOpcaoDoUsuario() int {
	fmt.Print("Digite sua opção: ")
	var comando int
	// scan infere tipo da variável e restringe/formata entrada automaticamente
	fmt.Scan(&comando)
	//fmt.Println("Olha só onde ficou armazenada sua escolha:", &comando)

	// outra forma de obter entrada (explicitando formato da entrada)
	// fmt.Scanf("%d", &comando)
	return comando
}

func processaOpcaoEscolhida(opcao int) {
	fmt.Println("Você escolheu", opcao)

	// if opcao == 1 {
	// 	fmt.Println("Vamos fazer monitoramento...")
	// } else if opcao == 2 {
	// 	fmt.Println("Exibindo logs")
	// } else if opcao == 0 {
	// 	fmt.Println("Saindo, adeus.")
	// } else {
	// 	fmt.Println("Opção inválida.")
	// }

	switch opcao {
	case 0:
		fmt.Println("Saindo, adeus.")
		os.Exit(0)
		//fallthrough
	case 1:
		fmt.Println("Vamos fazer monitoramento...")
	case 2:
		fmt.Println("Exibindo logs")
	default:
		fmt.Println("Opção inválida.")
		os.Exit(1)
	}

}
