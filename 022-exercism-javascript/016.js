// Functions

// parameters
// Values of primitive data types are immutable. The original value is never affected by what happens to the argument in the function body.
let variavel = false;

function toggle(param1 = false) {
    console.log(param1);
    param1 = true;
    console.log(param1);
}

console.log(variavel);
toggle(variavel);
console.log(variavel);

// For all other values (objects, arrays, functions), a reassignment will not affect the original value. However, if you modify such an argument (e.g. add a key to an object), that also modifies the original value that was passed in.

let objeto = {
    chave: 'valor',
    chave2: 'valor2'
};

function mudaObjeto(param1 = {}) {
    param1.chave = 'valor alterado';
}

console.log(objeto);
mudaObjeto(objeto);
console.log(objeto);