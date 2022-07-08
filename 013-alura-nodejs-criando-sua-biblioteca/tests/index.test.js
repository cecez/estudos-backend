import pegaArquivo from "../index.js";

describe("pegaArquivo::", () => {
  const resultExpected = [
    { "(CJS)": "https://nodejs.org/docs/latest/api/modules.html" },
    { "(ESM)": "https://nodejs.org/docs/latest/api/esm.html" },
    { coco: "http://ccococo.com" },
  ];

  it("must be a function", () => {
    expect(typeof pegaArquivo).toBe("function");
  });

  it("should find links", async () => {
    const results = await pegaArquivo("./tests/fixtures/eins.md");
    const linksFound = results.length;

    expect(linksFound).toBe(3);
    expect(results).toStrictEqual(resultExpected);
  });

  it("deve resolver a função com sucesso", async () => {
    await expect(pegaArquivo("./tests/fixtures/eins.md")).resolves.toEqual(
      resultExpected
    );
  });

  it("should not find links", async () => {
    const results = await pegaArquivo("./tests/fixtures/zwei.md");
    const linksFound = results.length;

    expect(results).toEqual([]);
    expect(linksFound).toBe(0);
  });

  it("should test async errors", async () => {
    await expect(
      pegaArquivo("./tests/fixtures/noneczistem.md")
    ).rejects.toThrow("não há arquivo no caminho");
  });
});
