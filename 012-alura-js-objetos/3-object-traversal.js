const student = require("./0-main-object");

// traversing object properties
let report = "";
for (let property in student) {
  let isFunction = typeof student[property] === "function";
  let isObject = typeof student[property] === "object";
  if (isFunction || isObject) {
    continue;
  }
  report += `${property}: ${student[property]}\n`;
}
console.log(report);

// detecting a specific property
student.addFriend("Maria", 5);
if (student.hasOwnProperty("friends")) {
  const amountOfFriends = student.friends.length;
  console.log(`Student has ${amountOfFriends} friends.`);
}
// another way to detect a specific property
const studentProperties = Object.keys(student);
if (studentProperties.includes("friends")) {
  const amountOfFriends = student.friends.length;
  console.log(`Student has ${amountOfFriends} friends.`);
}

// object values
const studentValues = Object.values(student);
console.log(studentValues);

// object keys and values
const studentKeysAndValues = Object.entries(student);
console.log(studentKeysAndValues);

const fichaGuerreiro = { nome: "Aragorn", classe: "guerreiro" };
const equipoGuerreiro = { espada: "Andúril", capa: "capa élfica +2" };

// not spreading an object
const fichaGuerreiro2 = { fichaGuerreiro, equipoGuerreiro };
console.log(fichaGuerreiro2);

// spreading an object
const fichaGuerreiroComEquipamento = { ...fichaGuerreiro, ...equipoGuerreiro };
console.log(fichaGuerreiroComEquipamento);
