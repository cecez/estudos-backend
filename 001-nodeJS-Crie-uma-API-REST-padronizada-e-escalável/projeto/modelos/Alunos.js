const Sequelize = require('sequelize')
const instanciaBD = require('../banco-de-dados')

const colunas = {
    nome: {
        type: Sequelize.STRING,
        allowNull: false
    },
    email: {
        type: Sequelize.STRING,
        allowNull: false
    },
    cpf: {
        type: Sequelize.STRING,
        allowNull: false
    },
    data_de_nascimento: {
        type: Sequelize.DATE,
        allowNull: false
    },
    categoria: {
        type: Sequelize.ENUM('ração', 'brinquedo'),
        allowNull: false
    }
}

const opcoes = {
    freezeTableName: true,
    tableName: 'alunos',
    timestamps: true,
}

module.exports = instanciaBD.define('alunos', colunas, opcoes)