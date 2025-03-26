document.addEventListener('DOMContentLoaded', function() {
    const textInput = document.getElementById('text-input');
    const checkBtn = document.getElementById('check-btn');
    const resultDiv = document.getElementById('result');
    const resultText = document.getElementById('result-text');
    const resultIcon = document.getElementById('result-icon');

    checkBtn.addEventListener('click', checkPalindrome);
    textInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            checkPalindrome();
        }
    });

    function checkPalindrome() {
        const inputText = textInput.value.trim();
        
        if (!inputText) {
            showResult('Proszę wprowadzić tekst do sprawdzenia', 'error');
            animateInputError();
            return;
        }
        
        const cleanedText = cleanText(inputText);
        
        if (cleanedText.length < 2) {
            showResult('Wprowadź więcej niż 1 znak', 'error');
            animateInputError();
            return;
        }
        
        const isPal = isPalindrome(cleanedText);
        
        if (isPal) {
            showResult(`"${inputText}" to palindrom!`, 'palindrome');
            animateSuccess();
        } else {
            showResult(`"${inputText}" nie jest palindromem`, 'not-palindrome');
        }
    }
    
    function cleanText(text) {
        const cleaned = text.replace(/[^a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ0-9]/g, '');
        return cleaned.toLowerCase();
    }
    
    function isPalindrome(text) {
        return text === text.split('').reverse().join('');
    }
    
    function showResult(message, className) {
        resultText.textContent = message;
        resultDiv.className = `result-container visible ${className}`;
    }
    
    function animateInputError() {
        textInput.style.animation = 'shake 0.5s';
        setTimeout(() => {
            textInput.style.animation = '';
        }, 500);
    }
    
    function animateSuccess() {
        checkBtn.style.animation = 'pulse 0.5s';
        setTimeout(() => {
            checkBtn.style.animation = '';
        }, 500);
    }
});

// Dodanie animacji do CSS
const style = document.createElement('style');
style.textContent = `
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        20%, 60% { transform: translateX(-5px); }
        40%, 80% { transform: translateX(5px); }
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
`;
document.head.appendChild(style);