document.addEventListener('DOMContentLoaded', function() {
    // Elementy DOM
    const buttons = document.querySelectorAll('.choice-btn');
    const playerScoreEl = document.getElementById('player-score');
    const computerScoreEl = document.getElementById('computer-score');
    const drawsEl = document.getElementById('draws');
    const roundResultEl = document.getElementById('round-result');
    const playerChoiceDisplay = document.querySelectorAll('.choice-display i')[0];
    const computerChoiceDisplay = document.querySelectorAll('.choice-display i')[1];
    const resetBtn = document.getElementById('reset-btn');
    
    // Efekty dźwiękowe
    const audioContext = new (window.AudioContext || window.webkitAudioContext)();
    
    const playSound = (type) => {
        const oscillator = audioContext.createOscillator();
        const gainNode = audioContext.createGain();
        
        oscillator.connect(gainNode);
        gainNode.connect(audioContext.destination);
        
        switch(type) {
            case 'win':
                oscillator.type = 'sine';
                oscillator.frequency.setValueAtTime(880, audioContext.currentTime);
                oscillator.frequency.exponentialRampToValueAtTime(1760, audioContext.currentTime + 0.2);
                gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.3);
                break;
            case 'lose':
                oscillator.type = 'square';
                oscillator.frequency.setValueAtTime(220, audioContext.currentTime);
                oscillator.frequency.exponentialRampToValueAtTime(55, audioContext.currentTime + 0.5);
                gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.6);
                break;
            case 'draw':
                oscillator.type = 'triangle';
                oscillator.frequency.setValueAtTime(440, audioContext.currentTime);
                oscillator.frequency.setValueAtTime(330, audioContext.currentTime + 0.1);
                oscillator.frequency.setValueAtTime(440, audioContext.currentTime + 0.2);
                gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.3);
                break;
        }
        
        oscillator.start();
        oscillator.stop(audioContext.currentTime + 0.5);
    };
    
    // Mapowanie wyborów na ikony
    const choiceIcons = {
        rock: 'fa-hand-fist',
        paper: 'fa-hand-paper',
        scissors: 'fa-hand-scissors'
    };
    
    // Mapowanie wyborów na tekst
    const choiceNames = {
        rock: 'ROCK',
        paper: 'PAPER',
        scissors: 'SCISSORS'
    };
    
    // Inicjalizacja gry
    function init() {
        playerScore = 0;
        computerScore = 0;
        draws = 0;
        updateScoreboard();
        roundResultEl.textContent = 'Initiate sequence...';
        roundResultEl.className = '';
        playerChoiceDisplay.className = 'fas fa-question';
        computerChoiceDisplay.className = 'fas fa-question';
    }
    
    // Aktualizacja tablicy wyników
    function updateScoreboard() {
        playerScoreEl.textContent = playerScore;
        computerScoreEl.textContent = computerScore;
        drawsEl.textContent = draws;
        
        // Animacja wyników
        [playerScoreEl, computerScoreEl, drawsEl].forEach(el => {
            el.style.transform = 'scale(1.2)';
            setTimeout(() => {
                el.style.transform = 'scale(1)';
            }, 200);
        });
    }
    
    // Komputer losuje swój wybór
    function computerPlay() {
        const choices = ['rock', 'paper', 'scissors'];
        const randomIndex = Math.floor(Math.random() * choices.length);
        return choices[randomIndex];
    }
    
    // Porównanie wyborów i określenie wyniku
    function playRound(playerSelection, computerSelection) {
        // Animacja wyboru
        playerChoiceDisplay.className = `fas ${choiceIcons[playerSelection]} animated`;
        computerChoiceDisplay.className = `fas ${choiceIcons[computerSelection]} animated`;
        
        // Sprawdzenie wyniku
        if (playerSelection === computerSelection) {
            draws++;
            roundResultEl.textContent = `SYSTEM DRAW: ${choiceNames[playerSelection]}`;
            roundResultEl.className = 'draw-text';
            playSound('draw');
            return 'draw';
        }
        
        // Logika gry
        if (
            (playerSelection === 'rock' && computerSelection === 'scissors') ||
            (playerSelection === 'paper' && computerSelection === 'rock') ||
            (playerSelection === 'scissors' && computerSelection === 'paper')
        ) {
            playerScore++;
            roundResultEl.textContent = `PLAYER VICTORY: ${choiceNames[playerSelection]} > ${choiceNames[computerSelection]}`;
            roundResultEl.className = 'win-text';
            playSound('win');
            return 'win';
        } else {
            computerScore++;
            roundResultEl.textContent = `AI DOMINANCE: ${choiceNames[computerSelection]} > ${choiceNames[playerSelection]}`;
            roundResultEl.className = 'lose-text';
            playSound('lose');
            return 'lose';
        }
    }
    
    // Zmienne stanu gry
    let playerScore = 0;
    let computerScore = 0;
    let draws = 0;
    
    // Obsługa kliknięcia przycisku wyboru
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const playerSelection = this.id;
            const computerSelection = computerPlay();
            
            // Reset animacji przed nową rundą
            roundResultEl.className = '';
            
            setTimeout(() => {
                playRound(playerSelection, computerSelection);
                updateScoreboard();
            }, 100);
        });
    });
    
    // Resetowanie gry
    resetBtn.addEventListener('click', () => {
        resetBtn.disabled = true;
        resetBtn.textContent = 'REBOOTING...';
        
        setTimeout(() => {
            init();
            resetBtn.textContent = 'System Reset';
            resetBtn.disabled = false;
        }, 1000);
    });
    
    // Inicjalizacja gry przy ładowaniu strony
    init();
});
