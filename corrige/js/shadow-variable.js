/*
    Améliorations apportées :
    - Remplacement des 'var' par des 'let'
    - Variables renommées pour éviter des confusions
    - Utilisation d'une variable pour le total de kudos (pour éviter les confusions)
*/

const articleList = []; // In a real app this list would be full of articles.
let maxKudos = 5;

function calculateTotalKudos(articles) {
  let nbTotalKudos = 0;
  
  articles.forEach(article => {
    nbTotalKudos += article.kudos;
  });
  
  return nbTotalKudos;
}

let totalKudos = calculateTotalKudos(articleList);

document.write(`
  <p>Maximum kudos you can give to an article: ${maxKudos}</p>
  <p>Total Kudos already given across all articles: ${totalKudos}</p>
`);