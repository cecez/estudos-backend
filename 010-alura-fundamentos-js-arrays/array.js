const notas = [1, 2, 3, 4];
notas.push(5);
ultimaNota = notas.pop();
console.log(ultimaNota);

// splice - emendar/juntar
animaisDoAquario = ['🐋', '🐙', '🐬', '🦈']

animaisDoAquario.splice(1,0,'🐠')
animaisDoAquario.splice(3,2,'🐟')

console.log(animaisDoAquario)


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

// Array.includes()
// o método includes() confere se o elemento passado por parâmetro está incluso em uma array;

/*
Por mais que declaremos um array como constante, conseguimos alterá-lo de acordo com alguns métodos do próprio array. Quando criamos uma constante no JavaScript, somos somente impedidos de fazer uma nova atribuição para a constante.

Exemplo:
*/
const umArray = [1, 2, 3];
umArray.push(55);
console.log(umArray);
//umArray = []; // TypeError: Assignment to constant variable.

// for of
let retorno = "";
for (let item of umArray) {
    retorno += item + "-";
}
console.log(retorno);

// teste forEach para uma string (não funciona pois não é método de string)
let palavra = "Palavra";
// palavra.forEach((l) => console.log(l)); // erro
console.log(palavra[0]);

// spread operator
const arranjo = [1, 2, 3];
const novoArranjo = [...arranjo, 10];
console.log(arranjo);
console.log(novoArranjo);

// Set
const arranjoRepetido = [1, 1, 2, 2, 1, 3];
const conjunto = new Set(arranjoRepetido);
console.log(conjunto);
const arranjoNaoRepetido = [...conjunto];
console.log(arranjoNaoRepetido);