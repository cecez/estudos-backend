oo com js

 hoisting (funcoes e variaveis sao "içadas" para o comeco na execucao do codigo)

 - herança de protótipo
 ```js
 Object.setPrototypeOf(object, prototype)
 ```

__proto__ é uma propriedade que todos os objetos têm e que aponta para o protótipo que foi definido para aquele objeto.

prototype é uma propriedade da função que é definida como protótipo quando usamos new para criar novos objetos.

```js
class User {
 _role = '';

 // setter para atributo
 set role(tipoRole) {
   if (tipoRole !== 'admin') {
     tipoRole = 'estudante'
   }
   this._role = tipoRole
 }

 // getter
 get role() {
   return this._role
 }

 constructor(nome) {
   this._nome = nome;
 }
}
```