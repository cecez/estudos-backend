package main

import (
	a "accounts"
	"fmt"
)

func Pay(account Payable, value float64) {
	account.Withdraw(value)
}

type Payable interface {
	Withdraw(value float64)
}

func main() {
	// structure instantiation
	cezarClient := a.Holder{
		Name:       "Cezar",
		CPF:        "123.456.789-10",
		Profession: "programmer",
	}
	cezarAccount := a.CheckingAccount{
		Holder: cezarClient,
		Agency: 123,
		Number: 456,
	}

	anaClient := a.Holder{
		Name:       "Ana",
		CPF:        "987.654.321-10",
		Profession: "educator",
	}
	anaAccount := a.CheckingAccount{
		Holder: anaClient,
	}

	// using pointer to structure
	var joaoClient *a.Holder
	joaoClient = new(a.Holder)
	joaoClient.Name = "João"
	joaoClient.CPF = "987.654.321-11"
	joaoClient.Profession = "student"

	var joaoAccount *a.CheckingAccount
	joaoAccount = new(a.CheckingAccount)
	joaoAccount.Holder = *joaoClient
	joaoAccount.Agency = 321

	fmt.Println(cezarAccount)
	fmt.Println(anaAccount)
	fmt.Println(joaoAccount)
	fmt.Println(*joaoAccount)

	// method using pointer to structure
	cezarAccount.Deposit(1000.0)
	cezarAccount.Withdraw(500.0)
	fmt.Println(cezarAccount)
	cezarAccount.Withdraw(1500.0)
	fmt.Println(cezarAccount)
	cezarAccount.Deposit(500.0)
	fmt.Println(cezarAccount)

	cezarAccount.Transfer(&anaAccount, 500.0)
	fmt.Println(cezarAccount)
	fmt.Println(anaAccount)
	fmt.Println(cezarAccount.Balance())

	// create a savingAccount
	savingAccount := a.SavingAccount{
		Holder: a.Holder{
			Name:       "Cezar",
			CPF:        "123.456.789-10",
			Profession: "programmer",
		},
		Agency: 123,
		Number: 456,
	}
	savingAccount.Deposit(1000.0)
	Pay(&savingAccount, 500.0)
	fmt.Println(savingAccount)
}
