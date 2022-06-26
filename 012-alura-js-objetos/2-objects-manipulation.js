const student = {
    name: 'João',
    age: 6,
    weight: 70,
    height: 1.75,
    student: true,
    hobbies: ['Play videogames', 'Running'],
    friends: [],
    addFriend: function(name, age) {
        this.friends.push({
            name: name,
            age: age
        });
    }
};

// Traversing object list of hobbies:
for (let hobby of student.hobbies) {
    console.log("-> " + hobby);
}
// another way
student.hobbies.forEach(hobby => console.log("-> " + hobby));

// array of objects:
student.friends.push({"name": "Miguel", "age": 9});
student.friends.push({"name": "Gustavo", "age": 6});

// invoking addFriend method:
student.addFriend("Pedro", 10);

console.log(student);

// cloning an object:
const anotherStudent = Object.assign({}, student);
anotherStudent.name += " (clone)";
anotherStudent.age = 9;
console.log(student);
console.log(anotherStudent);
// also another way:
const anotherStudent2 = {...student};
anotherStudent2.name += " (clone) (clone)";
console.log(anotherStudent2);
