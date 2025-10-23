export function resetLoto(inputs, joker) {
    //Réinitialiser les inputs
    inputs.forEach(input => {
        input.value = '';
    });
    joker.value = '';

    document.querySelectorAll('.toRemove').forEach(element => element.remove());//Supprimer les anciens messages d'erreur et résultats
}