import fetch from "node-fetch";

async function checkStatus(urls) {
  const status = await Promise.all(
    urls.map(async (url) => {
      console.log(`checking ${url} ...`);
      const response = await fetch(url);
      return response.status;
    })
  );
  return status;
}

function getUrlArray(links) {
  return links.map((links) => Object.values(links).join());
}

export default async function httpValidator(links) {
  const urls = getUrlArray(links);
  const status = await checkStatus(urls);
  const results = links.map((link, index) => ({
    ...link,
    status: status[index],
  }));

  return results;
}
