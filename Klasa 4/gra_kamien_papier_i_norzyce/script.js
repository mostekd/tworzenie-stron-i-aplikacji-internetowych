// Tworzenie efektu matrixa w tle
function createMatrixEffect() {
    const chars = "01アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲン";
    const terminal = document.querySelector('.terminal');
    
    for (let i = 0; i < 20; i++) {
        const matrixChar = document.createElement('div');
        matrixChar.className = 'matrix-fall';
        matrixChar.textContent = chars.charAt(Math.floor(Math.random() * chars.length));
        matrixChar.style.left = Math.random() * 100 + '%';
        matrixChar.style.animationDuration = (Math.random() * 5 + 3) + 's';
        matrixChar.style.animationDelay = (Math.random() * 3) + 's';
        matrixChar.style.fontSize = (Math.random() * 10 + 10) + 'px';
        terminal.appendChild(matrixChar);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    createMatrixEffect();
    
    // Symulacja ładowania terminala
    setTimeout(() => {
        document.getElementById('game-container').style.display = 'flex';
        
        const terminalBody = document.getElementById('terminal-body');
        const newOutput = document.createElement('div');
        newOutput.className = 'output';
        newOutput.innerHTML = '<div>> Game interface initialized</div><div>> Type [1-3] to select attack or [0] to terminate</div>';
        terminalBody.appendChild(newOutput);
        terminalBody.scrollTop = terminalBody.scrollHeight;
    }, 3500);
    
    // Elementy DOM
    const buttons = document.querySelectorAll('.choice-btn');
    const playerScoreEl = document.getElementById('player-score');
    const computerScoreEl = document.getElementById('computer-score');
    const drawsEl = document.getElementById('draws');
    const resultContainer = document.getElementById('result-container');
    const terminalBody = document.getElementById('terminal-body');
    const resetBtn = document.getElementById('reset-btn');
    
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
        terminalBody.appendChild(output);
        terminalBody.scrollTop = terminalBody.scrollHeight;
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
    
    // Obsługa przycisków
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const playerSelection = this.id;
            const computerSelection = computerPlay();
            playRound(playerSelection, computerSelection);
        });
    });
    
    // Reset gry
    resetBtn.addEventListener('click', function() {
        playerScore = 0;
        computerScore = 0;
        draws = 0;
        updateScoreboard();
        resultContainer.innerHTML = '<div>> Select your attack vector:</div>';
        addTerminalOutput('> Session terminated. New session initialized.');
        addTerminalOutput('> Ready for cyber duel');
    });
});