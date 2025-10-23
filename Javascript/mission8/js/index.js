const poneys = [
	{
		name: 'Pinky Pie',
		strength: '50',
		speed: '65',
		charisma: '80',
		texte: `Tout au long de la journée Pinkie Pie fait rire et sourire ses amis ! Elle saute sur n'importe quel prétexte pour faire la fête et rendre ses amis heureux !`,
        image: 'img/pony.png'
	},
	{
		name: 'Rainbow Dash',
		strength: '80',
		speed: '75',
		charisma: '90',
		texte: `Ce qui passionne Rainbow Dash plus que tout au monde, c'est voler et voler vite ! Sportive et pleine de ressources, elle vit pour l'aventure !`,
        image: 'img/pony3.png'
	},
	{
		name: 'Twilight Sparkle',
		strength: '90',
		speed: '45',
		charisma: '70',
		texte: `Twilight Sparkle est devnue une princesse ! Les poneys de Ponyville la respecte beaucoup pour son intelligence. C'est aussi une meneuse qui sait utiliser les capacités et les talents de ses amis pour accomplir leurs missions.`,
        image: 'img/pony2.png'
	},
	{
		name: 'Rarity',
		strength: '30',
		speed: '50',
		charisma: '85',
		texte: `La belle et artitse Rarity est une artiste talentueuse ! Elle trouve toujours le tempas d'aider ses amies en leur donnant des conseils concernant la mode !`,
        image: 'img/pony4.png'
	},
	{
		name: 'Fluttershy',
		strength: '67',
		speed: '64',
		charisma: '30',
		texte: `Fluttershy adore toutes les créatures d'Equestria qu'lle ssoitent grandes ou petite. Même si elle est timde, elle a toujours une place dans sa petite maison à l'écart pour tous ses amis animaux !`,
        image: 'img/pony5.png'
	},
];


const body = document.querySelector('body');

//creation du container
const container = document.createElement('div')
container.classList.add('container');

//création de la frame
const frame = document.createElement('div');
frame.classList.add('frame');

container.appendChild(frame);
//création du panneau des poneys
const panneau = document.createElement('div');
panneau.classList.add('poneys');

frame.appendChild(panneau);

//Creation des lignes de statistics
function createStatLine(poney, stat){
	const containerStat = document.createElement('div');
	containerStat.classList.add('flex');

	//texte de la stat
	const spanStat = document.createElement('span');

	//boite de la stat a 100%
	const statFull = document.createElement('div');
	//boite de la stat évaluée
	const statEvaluated = document.createElement('div');

	statFull.classList.add('fullStat');
	statEvaluated.classList.add('statLine');

	statFull.appendChild(statEvaluated);

	containerStat.appendChild(spanStat);
	containerStat.appendChild(statFull);

	//gestion des différentes stats
	switch(stat){
		case 'Strength':{
			spanStat.innerHTML = 'Strength : ';
			statEvaluated.style.width = poney.strength + '%';
		}
		break;
		case 'Speed':{
			spanStat.innerHTML = 'Speed : ';
			statEvaluated.style.width = poney.speed + '%' ;
		}
		break;
		case 'Charisma':{
			spanStat.innerHTML = 'Charisma : ';
			statEvaluated.style.width = poney.charisma + '%';
		}
		break;
	}
	return containerStat;
}

//Creation des poneys
function createPoney(poney){
	//boite du poney
	const myPoney = document.createElement('div');
	myPoney.classList.add('poney');

	//image du poney
	const imgPoney = document.createElement('img');
	imgPoney.setAttribute('src', poney.image);

	//article du poney
	const articlePoney = document.createElement('article');
	articlePoney.classList.add('translate');
	const h2 = document.createElement('h2');
	h2.innerHTML = poney.name;
	articlePoney.appendChild(h2);
	const p = document.createElement('p');
	p.innerHTML = poney.texte;
	articlePoney.appendChild(p);

	//Wrapper des stats
	const stats = document.createElement('div');

	articlePoney.appendChild(stats);

	let strength = createStatLine(poney, 'Strength');
	let speed = createStatLine(poney, 'Speed');
	let charisma = createStatLine(poney, 'Charisma');

	stats.appendChild(strength);
	stats.appendChild(speed);
	stats.appendChild(charisma);

	myPoney.appendChild(imgPoney);
	myPoney.appendChild(articlePoney);

	return myPoney;
}

//Creation de la zone de navigation et gestion des clics
function createNav(){
	const navContainer = document.createElement('div');
	navContainer.classList.add('flexNav');

	const leftArrow = document.createElement('img');
	const rightArrow = document.createElement('img');

	navContainer.appendChild(leftArrow);
	navContainer.appendChild(rightArrow);
	leftArrow.setAttribute('src', 'img/arrowDis.png');
	leftArrow.setAttribute('id', 'leftArrow');
	rightArrow.setAttribute('src', 'img/right.png');
	rightArrow.setAttribute('id', 'rightArrow');

	let clicked = 0;

	rightArrow.addEventListener('click', ()=>{
		if (clicked > -poneys.length + 1) {
			clicked--;
			leftArrow.setAttribute('src', 'img/arrow.png');
		}
		if(clicked == -poneys.length + 1){
			rightArrow.setAttribute('src', 'img/leftDis.png');
		}
		panneau.style.transform = 'translateX(' + (clicked * 500) + 'px)';
	})

	leftArrow.addEventListener('click', ()=>{
		if (clicked < 0) {
			clicked++;
			rightArrow.setAttribute('src', 'img/right.png');
		}
		if(clicked == 0){
			leftArrow.setAttribute('src', 'img/arrowDis.png');
		}
		panneau.style.transform = 'translateX(' + (clicked * 500) + 'px)';
	})
	return navContainer;
}


//creation de la zone de navigation
const navArrows = createNav();

container.appendChild(navArrows);


//gestion de l'affichage du texte sur chaque Poney
poneys.forEach((poney)=> {
	//Creation 
	let littleponey = createPoney(poney);
	panneau.appendChild(littleponey);

	littleponey.addEventListener('mouseenter', ()=>{
		let articlePoney = littleponey.querySelector('article');
		articlePoney.classList.add('active');
	})

	littleponey.addEventListener('mouseleave', ()=>{
		let articlePoney = littleponey.querySelector('article');
		articlePoney.classList.remove('active');
	})
})

body.appendChild(container);

