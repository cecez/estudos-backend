package accounts

// structure declaration
// private fields or methods (lower case) are not accessible from outside the structure
// public fields or methods (upper case) are accessible from outside the structure
type CheckingAccount struct {
	Holder  Holder
	Agency  int
	Number  int
	balance float64
}

func (c *CheckingAccount) Balance() float64 {
	return c.balance
}

func (c *CheckingAccount) Withdraw(valueToWithdraw float64) {
	canWithdraw := valueToWithdraw > 0 && valueToWithdraw <= c.balance
	if !canWithdraw {
		return
	}
	c.balance -= valueToWithdraw
}

func (c *CheckingAccount) Deposit(valueToDeposit float64) {
	canBeDeposited := valueToDeposit > 0
	if !canBeDeposited {
		return
	}
	c.balance += valueToDeposit
}

func (from *CheckingAccount) Transfer(to *CheckingAccount, value float64) {
	from.Withdraw(value)
	to.Deposit(value)
}
