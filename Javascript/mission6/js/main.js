const imgs = document.getElementsByTagName('img');

const spans = document.querySelectorAll('article p span');

// afficher les images dans la console

for (let i = 0; i < imgs.length; i++) {
    console.log(imgs[i]);
}

console.log('************************');

// afficher les spans dans la console

spans.forEach(function(span) {
    console.log(span);
});