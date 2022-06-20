//Basic structure (key: value)):
const student = {
    name: 'João',
    age: 6,
    weight: 70,
    height: 1.75,
    student: true,
    hobbies: ['Play videogames', 'Running']
};

// Accessing properties:
console.log(student.name);
console.log(student["name"]);

// Adding properties:
student.lastName = 'Rosa';
student.test = true;
console.log(student);

// Modifying properties:
student.name = 'João Pedro';

// Removing properties:
delete student.test;
console.log(student);

anotherStudent = student;
anotherStudent.age = 9;
console.log(student);
console.log(anotherStudent);

