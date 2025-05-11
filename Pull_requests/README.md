const fetch = require("node-fetch");

const repoOwner = "MTECHDevelopment";
const repoName = "Portfolio";
const apiUrl = `https://api.github.com/repos/${repoOwner}/${repoName}/pulls`;

async function listPullRequests() {
  try {
    const response = await fetch(apiUrl);
    const pullRequests = await response.json();
    pullRequests.forEach(pr => {
      console.log(`- [${pr.title}](${pr.html_url})`);
    });
  } catch (error) {
    console.error("Erro ao buscar os Pull Requests:", error);
  }
}

listPullRequests();

## Conquistas 🎉

https://api.github.com/repos/CatPy123/Python/pulls

## Conquistas 🎉

[![Pull Request](https://img.shields.io/badge/Pull%20Request-1-blue)](https://api.github.com/repos/CatPy123/Python/pulls)

## Conquistas 🎉
- ![First Pull Request](https://img.shields.io/badge/achievement-first--pull--request-brightgreen)

## Conquistas 🎉
- [Opened my first pull request! 🚀](https://github.com/MTECHDevelopment/repo-name/pull/1)

## Pull Requests 📂

Clique nos links abaixo para ver mais detalhes sobre os pull requests:

- [Pull Request #1](https://github.com/MTECHDevelopment/Portfolio/pull/1)
- [Pull Request #2](https://github.com/MTECHDevelopment/Portfolio/pull/2)

const express = require("express");
const fetch = require("node-fetch");

const app = express();
const port = 3000;

const repoOwner = "MTECHDevelopment";
const repoName = "Portfolio";
const apiUrl = `https://api.github.com/repos/${repoOwner}/${repoName}/pulls`;

app.get("/pull-requests", async (req, res) => {
  try {
    const response = await fetch(apiUrl);
    const pullRequests = await response.json();
    res.send(pullRequests);
  } catch (error) {
    res.status(500).send("Erro ao buscar os Pull Requests");
  }
});

app.listen(port, () => {
  console.log(`App rodando em http://localhost:${port}`);
});

[![Pull Request](https://img.shields.io/badge/View-Pull%20Request-blue)](https://github.com/MTECHDevelopment/Portfolio/pull/1)
