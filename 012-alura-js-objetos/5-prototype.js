// - property __proto__ list properties and methods of the object
// many of these methods were "inherited" from some prototype

// a way to define a ""class""
function Client(name, cpf, email, birthDate) {
  // properties/attributes/data
  this.name = name;
  this.cpf = cpf;
  this.email = email;
  this.birthDate = birthDate;

  // methods/functions/behaviors
  this.greet = function () {
    return `Heelllooo, I'm ${this.name}, welcome aboard!`;
  };
}

const myClient = new Client(
  "Cezar",
  12312312322,
  "email@email.com",
  "10/01/1986"
);
console.log(myClient.greet());
console.log(myClient);

// a way to define "" an inherited class ""
// chain of prototypes
function GamerClient(name, cpf, email, birthDate, favoriteConsole) {
  Client.call(this, name, cpf, email, birthDate);
  this.favoriteConsole = favoriteConsole;
  this.greet = function () {
    return `Heelllooo, my name is ${this.name} and i love playing ${this.favoriteConsole}!`;
  };
}

// extending "class" through its prototype
GamerClient.prototype.setFavoriteConsole = function (console) {
  this.favoriteConsole = console;
};

const myGamer = new GamerClient(
  "GAMER Cezar",
  12312312322,
  "email@email.com",
  "10/01/1986",
  "Super Nintendo"
);
console.log(myGamer.greet());
myGamer.setFavoriteConsole("PlayStation 4");
console.log(myGamer.greet());

// in an object, each property has three attributes
// - writable: whether the property can be added/written
// - enumearable: whether the property can be "iterable" through for...in, forEach, etc
// - configurable: whether the property can be modified/deleted
//
// added properties (own properties) have true to all attributes
// most inherited properties have false to all attributes
//
console.log(Object.getOwnPropertyDescriptor(myGamer, "favoriteConsole"));

//
// literal objects (const obj = {a: 1}) use Object.prototype as prototype; 
// objects created with new from a constructor inherit the prototype property from its constructor function;
// objects created with Object.create() receive the prototype from the first parameter, which can be null.
// 