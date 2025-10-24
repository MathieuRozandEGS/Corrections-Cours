import { GAMES } from './games.js';
import { NEWS } from './news.js';



const gamesPromesse = new Promise((resolve, reject) => { // Création d'une promesse pour récupérer les jeux
    if (typeof GAMES !== 'undefined' && GAMES.length > 0) { // Vérification que les données existent
        resolve(GAMES); // Résolution de la promesse avec les données des jeux
    }
    else {
        reject('Erreur : données de jeux non disponibles'); // Rejet de la promesse avec un message d'erreur
    }
});

const sectionGame = document.querySelector('#gamesSection');

gamesPromesse.then((games) => { // Si la promesse est résolue
    games.forEach(game => { // Pour chaque jeu
        const tem = document.querySelector('#card'); // Récupérer le template
        const cloneGame = document.importNode(tem.content, true); // Cloner le template pour chaque jeu
        const titreGame = cloneGame.querySelector('h2'); // Récupérer le titre du jeu
        const imageGame = cloneGame.querySelector('.container > img'); // Récupérer l'image du jeu
        const etoileGame = cloneGame.querySelectorAll('.flex li img'); // Récupérer la note du jeu

        titreGame.textContent = game.name; // Mettre à jour le titre
        imageGame.src = game.image; // Mettre à jour l'image
        imageGame.alt = `Image du jeu ${game.name}`;// Mettre à jour l'alt de l'image

        // Mettre à jour les étoiles en fonction de la note
        etoileGame.forEach((star, index) => {
            if (index < game.rate) {
                star.src = 'img/star.png'; // Étoile remplie
                star.alt = 'Étoile remplie';
            } else {
                star.src = 'img/starEmpty.png'; // Étoile vide
                star.alt = 'Étoile vide';
            }
        });
        sectionGame.appendChild(cloneGame);
    });
}).catch((error) => {// Gestion des erreurs
    const temError = document.querySelector('#error'); // Récupérer le template d'erreur
    const cloneError = document.importNode(temError.content, true); // Cloner le template d'erreur
    const message = cloneError.querySelector('span'); // Récupérer le span pour afficher le message d'erreur
    message.textContent = error; // Le message du reject()
    sectionGame.appendChild(cloneError); // Ajouter le message d'erreur à la section des jeux
});


const newsPromesse = new Promise((resolve, reject) => { // Création d'une promesse pour récupérer les news
    if (typeof NEWS !== 'undefined' && NEWS.length > 0) { // Vérification que les données existent
        resolve(NEWS); // Résolution de la promesse avec les données des news
    }
    else {
        reject('Erreur : données de news non disponibles'); // Rejet de la promesse avec un message d'erreur
    }
});

const sectionNews = document.querySelector('#newsSection');

newsPromesse.then((newsList) => { // Si la promesse est résolue
    newsList.forEach(news => { // Pour chaque news
        const tem = document.querySelector('#news'); // Récupérer le template
        const cloneNews = document.importNode(tem.content, true); // Cloner le template pour chaque news
        const titleNews = cloneNews.querySelector('h2'); // Récupérer le titre de la news
        const contentNews = cloneNews.querySelector('p'); // Récupérer le contenu de la news
        const authorNews = cloneNews.querySelector('.author'); // Récupérer l'auteur de la news
        const dateNews = cloneNews.querySelector('.date'); // Récupérer la date de la news
        const newsContainer = cloneNews.querySelector('.newsContainer'); // Récupérer le conteneur de la news
        newsContainer.style.backgroundImage = `url(${news.image})`; // Mettre à jour l'image de fond
        authorNews.textContent = `Auteur : ${news.author}`; // Mettre à jour l'auteur
        dateNews.textContent = `Date : ${news.date}`; // Mettre à jour la date
        titleNews.textContent = news.title; // Mettre à jour le titre
        contentNews.textContent = news.content; // Mettre à jour le contenu
        sectionNews.appendChild(cloneNews);
    });
}).catch((error) => { // Gestion des erreurs
    const temError = document.querySelector('#error'); // Récupérer le template d'erreur
    const cloneError = document.importNode(temError.content, true); // Cloner le template d'erreur
    const message = cloneError.querySelector('span'); // Récupérer le span pour afficher le message d'erreur
    message.textContent = error; // Le message du reject()
    sectionNews.appendChild(cloneError); // Ajouter le message d'erreur à la section des news
});



