import autores from "../models/Autor.js";

class AutorController {
  static listarAutores = (_, resposta) => {
    autores.find((_, autores) => {
      resposta.status(200).json(autores);
    });
  };

  static listaAutor = (requisicao, resposta) => {
    const id = requisicao.params.id;
    autores.findById(id, (erro, autores) => {
      if (erro || autores == null) {
        resposta.status(400).send(erro || "Nenhum autor encontrado");
        return;
      }
      resposta.status(200).json(autores);
    });
  };

  static cadastraAutor = (requisicao, resposta) => {
    let autor = new autores(requisicao.body);
    autor.save((erro) => {
      if (erro) {
        resposta.status(500).send(erro);
        return;
      }
      resposta.status(201).send(autor.toJSON());
    });
  };

  static atualizaAutor = (requisicao, resposta) => {
    const id = requisicao.params.id;
    autores.findByIdAndUpdate(id, { $set: requisicao.body }, (erro) => {
      if (erro) {
        resposta.status(500).send(erro);
        return;
      }
      resposta.status(200).send("Autor atualizado com sucesso");
    });
  };

  static excluirAutor = (requisicao, resposta) => {
    const id = requisicao.params.id;
    autores.findByIdAndDelete(id, null, (erro) => {
      if (erro) {
        resposta.status(500).send(erro);
        return;
      }
      resposta.status(200).send("Autor removido com sucesso");
    });
  };
}

export default AutorController;
