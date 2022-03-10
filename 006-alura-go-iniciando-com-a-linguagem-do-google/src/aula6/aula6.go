package main

import (
	"fmt"
	"net/http"
	"os"
	"time"
)

// import "reflect"

func main() {
	boasVindas()
	for {
		exibeMenuDeOpcoes()
		opcaoEscolhida := pedeOpcaoDoUsuario()
		processaOpcaoEscolhida(opcaoEscolhida)
	}
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
		monitoramento()
	case 2:
		fmt.Println("Exibindo logs")
	default:
		fmt.Println("Opção inválida.")
		os.Exit(1)
	}

}

func monitoramento() {
	const MONITORAMENTOS = 5
	const INTERVALO_ENTRE_MONITORAMENTO = 5 // em segundos

	// Arrays tem tipo e tamanho fixo
	// Quando os arrays são criados, eles assumem os valores padrão para os tipos de seus elementos. (p.ex, string = "", int = 0)
	// var sites [3]string
	// sites[0] = "https://www.cecez.com.br"
	// sites[1] = "https://www.alura.com.br"
	// sites[2] = "https://www.google.com.br"

	// Slices são abstrações de arrays
	// Não é necessário informar tamanho/capacidade
	// Gerenciam a capacidade (tamanho) que o array tem
	// var sliceSites []string
	// sliceSites = append(sliceSites, "www.site1.com.br")
	// sliceSites = append(sliceSites, "site2.com.br")

	fmt.Println("-> Iniciando monitoramento ...")

	//sites := []string{"https://www.cecez.com.br", "https://www.google.com.br", "https://coco-status-code.herokuapp.com"}

	sites := retornaListaDeSitesDoArquivo()

	for i := 0; i < MONITORAMENTOS; i++ {
		for _, site := range sites {
			testaSite(site)
		}
		time.Sleep(INTERVALO_ENTRE_MONITORAMENTO * time.Second)
	}

	fmt.Println("<- ... terminando monitoramento.")
}

func testaSite(url string) {
	resposta, err := http.Get(url)

	if err != nil {
		fmt.Println("Erro ao realizar requisição GET:", err)
	}

	if resposta.StatusCode == http.StatusOK {
		fmt.Println("Site", url, "carregado com sucesso!")
	} else {
		fmt.Println("Não foi possível carregar o site", url, ". Status Code:", resposta.StatusCode)
	}
}

func retornaListaDeSitesDoArquivo() []string {
	var sites []string

	arquivo, err := os.Open("sites.txt")

	if err != nil {
		fmt.Println("Erro ao abrir arquivo:", err)
	}

	fmt.Println(arquivo)
	

	return sites
}