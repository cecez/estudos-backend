const { Router } = require('express');
const AlunosController = require('../controllers/AlunosController');

const router = Router();

router
    // .delete('/pessoas/:id', PessoaController.delete)
     .get('/alunos', AlunosController.index)
    // .get('/pessoas/ativas', PessoaController.indexActives)
    // .get('/pessoas/:id', PessoaController.show)
    // .post('/pessoas', PessoaController.create)
    // .post('/pessoas/:estudanteId/cancela', PessoaController.cancela)
    // .post('/pessoas/:id/restaura', PessoaController.restore)
    // .put('/pessoas/:id', PessoaController.update);


module.exports = router;