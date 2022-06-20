// JSON was created as a way to transfer data between programs.
// You cannot declare functions in JSON.
// Native methods to convert/parse JSON:
// JSON.stringify()
// JSON.parse()

// javascript object
const student = require("./0-main-object");
console.log(student);

// converting to json
const json = JSON.stringify(student);
console.log(json);

// parsing from json
const student2 = JSON.parse(json);
console.log(student2);