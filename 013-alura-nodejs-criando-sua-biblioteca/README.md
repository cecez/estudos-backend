# CommonJs (CJS)
- module.exports e require()
```javascript
module.exports = function soma(num1, num2) {
 return num1 + num2;
};

const soma = require('./caminho/arquivo');
```

# EcmaScript Modules (ESM)
- export / export default e import <nomeModulo> from ‘./caminho/arquivo’.
- .mjs (exporta módulo)
```javascript
export function soma(num1, num2) {
 return num1 + num2;
}

import soma from './caminho/arquivo';
```