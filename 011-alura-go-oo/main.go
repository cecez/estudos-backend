package main

import "fmt"

// structure declaration
type CheckingAccount struct {
	holder  string
	agency  int
	number  int
	balance float64
}

func main() {
	// structure instantiation
	cezarAccount := CheckingAccount{
		holder:  "Cezar",
		agency:  123,
		number:  456,
	}
	anaAccount := CheckingAccount{"Ana", 123, 457, 0.0}

	fmt.Println(cezarAccount)
	fmt.Println(anaAccount)
}
