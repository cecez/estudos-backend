const fs = require("fs");

// synchronous way
// fs.readFileSync("./README.md", "utf-8", (_, data) => {
//   console.log(data);
// });

// asynchronous way with promises
// fs.promises
//   .readFile("./README.md", "utf-8")
//   .then((data) => console.log(data))
//   .catch((error) => {
//     throw new Error(error);
//   });

// asynchronous way with async-await
async function retrieveData(filepath) {
  try {
    const data = await fs.promises.readFile(filepath, "utf-8");
    return data;
  } catch (error) {
    console.error(error);
  }
}

module.exports = retrieveData;
