package accounts

type SavingAccount struct {
	Holder                    Holder
	Agency, Number, Operation int
	balance                   float64
}

func (c *SavingAccount) Balance() float64 {
	return c.balance
}

func (c *SavingAccount) Withdraw(valueToWithdraw float64) {
	canWithdraw := valueToWithdraw > 0 && valueToWithdraw <= c.balance
	if !canWithdraw {
		return
	}
	c.balance -= valueToWithdraw
}

func (c *SavingAccount) Deposit(valueToDeposit float64) {
	canBeDeposited := valueToDeposit > 0
	if !canBeDeposited {
		return
	}
	c.balance += valueToDeposit
}
