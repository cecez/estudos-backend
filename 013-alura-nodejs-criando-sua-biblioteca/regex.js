(async () => {
  const retrieveData = require("./fs");
  const text = await retrieveData("./README.md");

  const regex = /\[(.*)\]\((.*)\)/gm;
  let m;
  while ((m = regex.exec(text)) !== null) {
    // This is necessary to avoid infinite loops with zero-width matches
    if (m.index === regex.lastIndex) {
      regex.lastIndex++;
    }

    // The result can be accessed through the `m`-variable.
    m.forEach((match, groupIndex) => {
      console.log(`Found match, group ${groupIndex}: ${match}`);
    });
  }
})();
