document.addEventListener('DOMContentLoaded', function() {
    const surveyForm = document.getElementById('survey-form');

    surveyForm.addEventListener('submit', function(event) {
        event.preventDefault();  
        const selectedGame = document.querySelector('input[name="bestGame"]:checked').value;
        alert(`¡Gracias por participar! Has votado por: ${selectedGame}`);
       
    });
});
