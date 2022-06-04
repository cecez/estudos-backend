package main

import "fmt"

// structure declaration
type CheckingAccount struct {
	holder  string
	agency  int
	number  int
	balance float64
}

func (c *CheckingAccount) Withdraw(valueToWithdraw float64) {
	canWithdraw := valueToWithdraw > 0 && valueToWithdraw <= c.balance
	if canWithdraw {
		c.balance -= valueToWithdraw
	}
}

func main() {
	// structure instantiation
	cezarAccount := CheckingAccount{
		holder:  "Cezar",
		agency:  123,
		number:  456,
	}
	anaAccount := CheckingAccount{"Ana", 123, 457, 0.0}

	// using pointer to structure
	var joaoAccount *CheckingAccount
	joaoAccount = new(CheckingAccount)
	joaoAccount.holder = "João"
	joaoAccount.agency = 321

	fmt.Println(cezarAccount)
	fmt.Println(anaAccount)
	fmt.Println(joaoAccount)
	fmt.Println(*joaoAccount)

	// method using pointer to structure
	cezarAccount.balance = 1000.0
	cezarAccount.Withdraw(500.0)
	fmt.Println(cezarAccount)
	cezarAccount.Withdraw(1500.0)
	fmt.Println(cezarAccount)
}
