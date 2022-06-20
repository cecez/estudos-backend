module.exports = {
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