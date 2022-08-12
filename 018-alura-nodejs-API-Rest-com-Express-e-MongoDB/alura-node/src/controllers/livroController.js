import livros from "../models/Livro.js";

class LivroController {
  static listarLivros = (_, resposta) => {
    livros
      .find()
      .populate("autor")
      .exec((_, livros) => {
        resposta.status(200).json(livros);
      });
  };

  static listaLivro = (requisicao, resposta) => {
    const id = requisicao.params.id;
    livros
      .findById(id)
      .populate("autor", "nome")
      .exec((erro, livros) => {
        if (erro) {
          resposta.status(400).send(erro);
        } else {
          resposta.status(200).json(livros);
        }
      });
  };

  static cadastraLivro = (requisicao, resposta) => {
    let livro = new livros(requisicao.body);
    livro.save((erro) => {
      if (erro) {
        resposta.status(500).send(erro);
      } else {
        resposta.status(201).send(livro.toJSON());
      }
    });
  };

  static atualizaLivro = (requisicao, resposta) => {
    const id = requisicao.params.id;
    livros.findByIdAndUpdate(id, { $set: requisicao.body }, (erro) => {
      if (erro) {
        resposta.status(500).send(erro);
      } else {
        resposta.status(200).send("Livro atualizado com sucesso");
      }
    });
  };

  static excluirLivro = (requisicao, resposta) => {
    const id = requisicao.params.id;
    livros.findByIdAndDelete(id, null, (erro) => {
      if (erro) {
        resposta.status(500).send(erro);
      } else {
        resposta.status(200).send("Livro removido com sucesso");
      }
    });
  };

  static listaLivrosPorEditora = (requisicao, resposta) => {
    const editora = requisicao.query.editora;
    console.log(editora);
    livros.find({ editora: editora }, {}, (erro, retorno) => {
      if (erro || retorno == null) {
        resposta.status(500).send(erro || "Nenhum livro encontrado");
        return;
      }

      resposta.status(200).send(retorno);
    });
  };
}

export default LivroController;
