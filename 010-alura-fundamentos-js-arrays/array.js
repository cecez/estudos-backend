const notas = [1, 2, 3, 4];
notas.push(5);
ultimaNota = notas.pop();
//console.log(ultimaNota);

// splice - emendar/juntar


// forEach
let soma = 0;
notas.forEach(function(nota) {
    soma += nota;
});
let media = soma / notas.length;
console.log(notas);
console.log(media);

// map
let novasNotas = notas.map(function(nota) {
    return nota * 2;
});
console.log(novasNotas);

// reduce
let soma2 = notas.reduce(function(total, nota) {
    return total + nota;
}, 0);
console.log(soma2);