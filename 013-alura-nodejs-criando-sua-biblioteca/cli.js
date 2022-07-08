#!/usr/bin/env node

import chalk from "chalk";
import pegaArquivo from "./index.js";
import httpValidator from "./httpValidation.js";

const argumentos = process.argv;

async function processText(argumentos) {
  const links = await pegaArquivo(argumentos[2]);

  if (argumentos[3] == "--validate") {
    console.log(
      chalk.green("Validated link list:"),
      await httpValidator(links)
    );
  } else {
    console.log(chalk.yellow("Link list:"), links);
  }
}

processText(argumentos);
