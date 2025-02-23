document.getElementById('askButton').addEventListener('click', function() {
    const question = document.getElementById('question').value;
    const answerElement = document.getElementById('answer');

    if (!question) {
        alert('Proszę wpisać pytanie.');
        return;
    }

    const answers = [
        'Tak', 'Nie', 'Może', 'Zdecydowanie tak', 'Zdecydowanie nie',
        'Nie jestem pewien', 'Zapytaj później', 'To możliwe', 'Nie liczyłbym na to'
    ];

    const randomIndex = Math.floor(Math.random() * answers.length);
    const answer = answers[randomIndex];

    answerElement.style.opacity = 0;
    setTimeout(() => {
        answerElement.textContent = answer;
        answerElement.style.opacity = 1;
    }, 300);
});
