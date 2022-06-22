class Person {
    constructor(name) {
        this.name = name;
    }

    greet() {
        console.log(`Hello! My name is ${this.name}.`);
    }
}

class Gamer extends Person {
    constructor(name, favoriteConsole) {
        super(name);
        this.favoriteConsole = favoriteConsole;
    }

    greet() {
        console.log(`Hello! My name is ${this.name} and i love playing ${this.favoriteConsole}.`);
    }
}


const myPerson = new Person("João");
myPerson.greet();
const myGamer = new Gamer("João gamer", "Nintendo Switch");
myGamer.greet();

// object.call()
// object.apply()
// object.bind()