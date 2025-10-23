const articles = [{
    name: "Rougealevres",
    title: "Le rouge à lèvres",
    article: "Le rouge à lèvres est un produit de cosmétique permettant de souligner les lèvres en les colorant ou non. Il en existe beaucoup de variantes, quant à la tenue, la couleur, la texture et le fini. Un rouge à lèvres n'est pas forcément rouge, même si le plus souvent sa couleur est proche du rouge (rouges vifs, sombres, vermillons, roses, orangés, etc.). Des couleurs comme le bleu ou le vert ne se rencontrent qu'exceptionnellement.",
    image: "img/rougealevres.jpeg"
}, {
    name: "Mascara",
    title: "Le Mascara",
    article: "Le mascara se compose d'un tube contenant le produit colorant sous forme liquide ou crémeuse et d'une brosse droite, courbée voire sphérique. La brosse est plongée dans le tube puis appliquée sur les cils. Le mascara contient de l 'eau, des épaississants, des agents filmogènes, des colorants et des conservateurs. Il existe en différents couleurs mais principalement en  noir. Il existe des mascaras résistants à l 'eau, ce qui leur évite de couler sous les yeux en cas de pluie, de larmes ou de sueur excessive.",
    image: "img/mascara.png"
}, {
    name: "Fard",
    title: "Le Fard à paupières",
    article: "Le fard à paupières ou ombre à paupières, il se présente généralement sous forme de poudre compactée qui s'applique avec une brosse ou à la main. Il s'applique par nuance de la plus claire à la plus foncée en commençant près de l'œil sur la paupière mobile et en terminant par la nuance la plus foncée au ras des cils.",
    image: "img/fard.jpeg"
}]

//body

let body  = document.querySelector("body");

//header

let header = document.createElement("header");

// main

let main = document.createElement("main");

//footer

let footer = document.createElement("footer");


//création du menu
function createNav(){
    //creation de la nav
    let nav = document.createElement('nav');
    //creation d'une UL
    let ul = document.createElement('ul');
    
    //création DU LI du logo
    let liLogo = document.createElement('li');

    //creation du lien du logo
    let aLogo = document.createElement('a');

    //Donne une valeur au HREF du lien du logo
    aLogo.href = "#top";

    //Création d'une image pour le logo
    let logo = document.createElement('img');

    //Assignation de l'attribut SRC au logo avec sa valeur
    logo.setAttribute('src', 'img/logo.png');
    
    //IMBRICATION du logo dans le lien
    aLogo.appendChild(logo);
    //IMBRICATION DU LIEN dans le liLogo
    liLogo.appendChild(aLogo);
    //IMBRICATION du liLogo dans la UL
    ul.appendChild(liLogo);
    
    //Boucle sur le tableau articles
    //article ? Création d'une variable temporaire qui viendra rappeller chaque article du tableau
    articles.forEach((article) =>{
        //Création d'une variable LI qui va créer UN LI PAR TOUR DE BOUCLE
        let li = document.createElement('li');
        //Création d'une variable a qui va créer UN A PAR TOUR DE BOUCLE
        let a = document.createElement('a');
        //On assigne un href au a qui aura comme valeur un identifiant avec le nom de l'article en cours
        a.href = "#"+article.name;
        //On assigne un texte au A à chaque tour de boucle, qui sera le titre de l'article en cours
        a.innerText = article.title;
        //IMBRICATION du a dans le LI
        li.appendChild(a);
        //IMBRICATION du LI à la UL
        ul.appendChild(li);
    })

    //IMBRICATION de la UL à la nav
    nav.appendChild(ul);
    //IMBRICATION de la NAV au HEADER
    header.appendChild(nav);
}

//Création d'une fonction qui va créer les articles du site (avec un article et un index en parametres)
function createSection(article, index){
    //Déclare une variable section
    let section = document.createElement('section');
    //Donne un id à la section créée (nom des articles pour les liens)
    section.id = article.name;

    //Déclare une variable pour la div de l'img
    let divImg = document.createElement('div')
    //Donne la classe pour l'arrondir en CSS
    divImg.classList.add('rounded');

    //Déclare une variable IMG
    let img = document.createElement('img');
    //Source de l'image est la propriété image de l'article passé en parametre
    img.src = article.image;
    //IMBRICATION DE L'IMG dans la DIV
    divImg.appendChild(img);

    //Declare variable monArticle, h2 et p
    let monArticle = document.createElement('article');
    let h2 = document.createElement('h2');
    let p = document.createElement('p');

    //Le texte du h2 sera la propriété title de l'article passé en parametre
    h2.innerText = article.title;
    //Le texte du p sera la propriété article de l'article passé en parametre
    p.innerText = article.article;

    //IMBRICATION du H2 et du P dans monArticle
    monArticle.appendChild(h2);
    monArticle.appendChild(p);

    // SI index en parametres % 2 = 0 (si c'est pair) Texte puis img
    if(index%2  === 0){
        section.appendChild(monArticle);
        section.appendChild(divImg);
    }
    //SINON l'inverse
    else{
        section.appendChild(divImg);
        section.appendChild(monArticle);
    }
    //retourne la section
    return section;
}

//Création d'un footer
function createFooter(){
    //création d'un a
    let a = document.createElement('a');
    //Donne un href au a, ici #top
    a.href = '#top';

    //creation d'une variable img
    let img = document.createElement('img');
    //ajout d'une source à l'image
    img.src = 'img/logo.png';

    //IMBRICATION DE l'img dans a
    a.appendChild(img);
    //IMBRICATION DU A dans le FOOTER
    footer.appendChild(a);
}

//execution

createNav();
articles.forEach((article, index) =>{
   main.appendChild(createSection(article, index));
})
createFooter();

body.appendChild(header);
body.appendChild(main);
body.appendChild(footer);

let input = document.querySelector('input');
let select = document.querySelector('select');
let checkbox = document.querySelector('a[href=#top]');
