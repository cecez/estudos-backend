const bodyParser = require('body-parser')
 
const alunos = require('./alunosRoute')

module.exports = app => {
 app.use(
   bodyParser.json(),
   alunos
   )
 }