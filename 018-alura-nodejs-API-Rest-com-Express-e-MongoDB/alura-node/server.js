import app from "./src/app.js"

const porta = process.env.PORT || 3000;

app.listen(3000, () => {
  console.log("Express escutando ...");
});
