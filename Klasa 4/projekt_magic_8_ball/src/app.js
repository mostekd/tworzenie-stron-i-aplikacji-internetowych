const answers = [
    "Yes.",
    "No.",
    "Ask again later.",
    "Definitely.",
    "Absolutely not.",
    "It is certain.",
    "Don't count on it.",
    "Yes, in due time.",
    "My sources say no.",
    "Yes, definitely."
];

document.addEventListener("DOMContentLoaded", () => {
    const questionInput = document.getElementById("question");
    const answerDisplay = document.getElementById("answer");
    const generateButton = document.getElementById("generate");

    generateButton.addEventListener("click", () => {
        const question = questionInput.value.trim();
        
        if (question === "") {
            alert("Please enter a question.");
            return;
        }

        const randomIndex = Math.floor(Math.random() * answers.length);
        answerDisplay.textContent = answers[randomIndex];
    });

    document.getElementById('askButton').addEventListener('click', function() {
        const question = document.getElementById('question').value;
        const responseElement = document.getElementById('response');

        if (question.trim() === '') {
            alert('Please enter a question.');
            return;
        }

        const responses = [
            'It is certain.',
            'It is decidedly so.',
            'Without a doubt.',
            'Yes – definitely.',
            'You may rely on it.',
            'As I see it, yes.',
            'Most likely.',
            'Outlook good.',
            'Yes.',
            'Signs point to yes.',
            'Reply hazy, try again.',
            'Ask again later.',
            'Better not tell you now.',
            'Cannot predict now.',
            'Concentrate and ask again.',
            'Don’t count on it.',
            'My reply is no.',
            'My sources say no.',
            'Outlook not so good.',
            'Very doubtful.'
        ];

        const randomIndex = Math.floor(Math.random() * responses.length);
        const randomResponse = responses[randomIndex];

        responseElement.textContent = randomResponse;
    });
});