// Poprawione tworzenie efektu Matrix
function createMatrixEffect() {
    const chars = "01アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲン";
    const container = document.querySelector('body');
    const width = window.innerWidth;
    const columns = Math.floor(width / 20); // Kolumna co 20px
    
    // Usuń stare znaki Matrix
    document.querySelectorAll('.matrix-fall').forEach(el => el.remove());
    
    // Utwórz nowe znaki Matrix
    for (let i = 0; i < columns; i++) {
        const matrixChar = document.createElement('div');
        matrixChar.className = 'matrix-fall';
        matrixChar.textContent = chars.charAt(Math.floor(Math.random() * chars.length));
        matrixChar.style.setProperty('--x-pos', Math.random() * width);
        matrixChar.style.left = `${(i * 20) + 10}px`;
        matrixChar.style.animationDuration = `${Math.random() * 3 + 2}s`;
        matrixChar.style.animationDelay = `${Math.random() * 5}s`;
        matrixChar.style.fontSize = `${Math.random() * 10 + 10}px`;
        container.appendChild(matrixChar);
    }
}

// Obsługa zdarzenia resize
window.addEventListener('resize', () => {
    createMatrixEffect();
});

document.addEventListener('DOMContentLoaded', function() {
    createMatrixEffect();
    
    // Symulacja ładowania terminala
    setTimeout(() => {
        document.getElementById('game-container').style.display = 'flex';
        
        const outputContainer = document.getElementById('output-container');
        const newOutput = document.createElement('div');
        newOutput.className = 'output';
        newOutput.innerHTML = '<div>> Game interface initialized</div><div>> Type [1-3] to select attack or [0] to terminate</div>';
        outputContainer.appendChild(newOutput);
        outputContainer.scrollTop = outputContainer.scrollHeight;
    }, 3500);
    
    // Elementy DOM
    const buttons = {
        '1': document.getElementById('rock'),
        '2': document.getElementById('paper'),
        '3': document.getElementById('scissors'),
        '0': document.getElementById('reset-btn')
    };
    
    const playerScoreEl = document.getElementById('player-score');
    const computerScoreEl = document.getElementById('computer-score');
    const drawsEl = document.getElementById('draws');
    const resultContainer = document.getElementById('result-container');
    const outputContainer = document.getElementById('output-container');
    
    // Wiadomości w stylu hakerskim
    const hackerMessages = {
        rock: [
            "> Executing ROCK_EXPLOIT...",
            "> Deploying stone-based payload...",
            "> Initializing geological attack vector..."
        ],
        paper: [
            "> Activating PAPER_VIRUS...",
            "> Deploying document-based malware...",
            "> Initializing cryptographic paper storm..."
        ],
        scissors: [
            "> Injecting SCISSORS_WORM...",
            "> Deploying cutting-edge attack...",
            "> Initializing binary shear protocol..."
        ],
        win: [
            "> Exploit successful! TARGET_AI compromised!",
            "> Vulnerability found! Attack effective!",
            "> TARGET_AI defenses breached!"
        ],
        lose: [
            "> Attack blocked! Countermeasures detected!",
            "> Exploit failed! TARGET_AI resists!",
            "> Defense protocols activated! Attack ineffective!"
        ],
        draw: [
            "> Standoff detected! Both attacks neutralized!",
            "> Mutual defense protocols engaged!",
            "> Attack vectors canceled each other!"
        ]
    };
    
    // Zmienne stanu gry
    let playerScore = 0;
    let computerScore = 0;
    let draws = 0;
    
    // Funkcje pomocnicze
    function addTerminalOutput(message) {
        const output = document.createElement('div');
        output.className = 'output';
        output.innerHTML = `<div>${message}</div>`;
        outputContainer.appendChild(output);
        outputContainer.scrollTop = outputContainer.scrollHeight;
    }
    
    function getRandomHackerMessage(type) {
        const messages = hackerMessages[type];
        return messages[Math.floor(Math.random() * messages.length)];
    }
    
    function updateScoreboard() {
        playerScoreEl.textContent = playerScore;
        computerScoreEl.textContent = computerScore;
        drawsEl.textContent = draws;
    }
    
    function computerPlay() {
        const choices = ['rock', 'paper', 'scissors'];
        const randomIndex = Math.floor(Math.random() * choices.length);
        return choices[randomIndex];
    }
    
    function playRound(playerSelection, computerSelection) {
        // Wyświetl wybór gracza
        addTerminalOutput(getRandomHackerMessage(playerSelection));
        
        // Symulacja opóźnienia odpowiedzi AI
        setTimeout(() => {
            addTerminalOutput(`> TARGET_AI responds with ${computerSelection.toUpperCase()}_ALGORITHM`);
            
            if (playerSelection === computerSelection) {
                draws++;
                addTerminalOutput(getRandomHackerMessage('draw'));
                resultContainer.innerHTML = '<div class="glitch" data-text=">> SYSTEM DRAW <<">>> SYSTEM DRAW <<</div>';
            } else if (
                (playerSelection === 'rock' && computerSelection === 'scissors') ||
                (playerSelection === 'paper' && computerSelection === 'rock') ||
                (playerSelection === 'scissors' && computerSelection === 'paper')
            ) {
                playerScore++;
                addTerminalOutput(getRandomHackerMessage('win'));
                resultContainer.innerHTML = '<div style="color: var(--hacker-green)">>> HACK SUCCESSFUL <<</div>';
            } else {
                computerScore++;
                addTerminalOutput(getRandomHackerMessage('lose'));
                resultContainer.innerHTML = '<div style="color: var(--hacker-red)">>> HACK FAILED <<</div>';
            }
            
            updateScoreboard();
        }, 1000);
    }
    
    // Obsługa przycisków i klawiatury
    function handleUserInput(choice) {
        if (choice === '0') {
            // Reset gry
            playerScore = 0;
            computerScore = 0;
            draws = 0;
            updateScoreboard();
            resultContainer.innerHTML = '<div>> Select your attack vector:</div>';
            addTerminalOutput('> Session terminated. New session initialized.');
            addTerminalOutput('> Ready for cyber duel');
            return;
        }
        
        const choices = {
            '1': 'rock',
            '2': 'paper',
            '3': 'scissors'
        };
        
        if (choices[choice]) {
            const playerSelection = choices[choice];
            const computerSelection = computerPlay();
            playRound(playerSelection, computerSelection);
            
            // Wizualne podświetlenie przycisku
            const btn = buttons[choice];
            btn.classList.add('active');
            setTimeout(() => btn.classList.remove('active'), 200);
        }
    }
    
    // Nasłuchiwanie kliknięć
    Object.entries(buttons).forEach(([key, button]) => {
        button.addEventListener('click', () => handleUserInput(key));
    });
    
    // Nasłuchiwanie klawiatury
    document.addEventListener('keydown', (e) => {
        if (['1', '2', '3', '0'].includes(e.key)) {
            handleUserInput(e.key);
        }
    });
});