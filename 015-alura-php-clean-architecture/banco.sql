CREATE TABLE alunos (
    cpf TEXT PRIMARY KEY,
    nome TEXT,
    email TEXT
);

CREATE TABLE telefones (
    ddd TEXT,
    numero TEXT,
    cpf_aluno TEXT,
    PRIMARY KEY (ddd, numero),
    FOREIGN KEY(cpf_aluno) REFERENCES alunos(cpf)
);

CREATE TABLE indicacoes (
    cpf_indicador TEXT,
    cpf_indicado TEXT,
    data_indicacao TEXT,
    PRIMARY KEY (cpf_indicador, cpf_indicado),
    FOREIGN KEY(cpf_indicador) REFERENCES alunos(cpf),
    FOREIGN KEY(cpf_indicado) REFERENCES alunos(cpf)
);