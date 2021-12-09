const modeloAluno = require('../modelos/Alunos')

modeloAluno
    .sync()
    .then(() => console.log('Tabela de alunos syncada com sucesso'))
    .catch(console.log)