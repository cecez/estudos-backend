function dorme(ms) {
  return new Promise((resolve) => setTimeout(resolve, ms));
}

async function inc(n) {
  console.log(n);
  await dorme(2000);

  if (n == 3) return;

  return inc(n + 1);
}

inc(1);
console.trace();