// Configuração inicial
const canvas = document.getElementById("gameCanvas");
const ctx = canvas.getContext("2d");
canvas.width = 800;
canvas.height = 400;

// Elementos do carro
const car = {
    x: 50, // Posição inicial no eixo X
    y: 300, // Posição inicial no eixo Y
    width: 100, // Largura do carro
    height: 50, // Altura do carro
    speed: 0, // Velocidade do carro
};

// Texto animado
let animatedText = ""; // Texto que será exibido
let textAlpha = 0; // Opacidade do texto
let textX = 0; // Posição X do texto
let textY = 0; // Posição Y do texto

// Controle do carro
document.addEventListener("keydown", (event) => {
    if (event.key === "ArrowRight") {
        car.speed = 5;
        triggerTextAnimation("Indo para a direita! 🚗");
    }
    if (event.key === "ArrowLeft") {
        car.speed = -5;
        triggerTextAnimation("Indo para a esquerda! 🚗");
    }
});
document.addEventListener("keyup", () => {
    car.speed = 0; // Para o carro ao soltar a tecla
});

// Função para desenhar o carro
function drawCar() {
    // Corpo do carro
    ctx.fillStyle = "#FF0000"; // Vermelho
    ctx.fillRect(car.x, car.y, car.width, car.height);

    // Rodas do carro
    ctx.fillStyle = "#000000"; // Preto
    ctx.beginPath();
    ctx.arc(car.x + 20, car.y + 50, 15, 0, Math.PI * 2); // Roda dianteira
    ctx.arc(car.x + 80, car.y + 50, 15, 0, Math.PI * 2); // Roda traseira
    ctx.fill();

    // Janelas do carro
    ctx.fillStyle = "#87CEEB"; // Azul claro
    ctx.fillRect(car.x + 20, car.y + 10, 30, 20); // Janela frontal
    ctx.fillRect(car.x + 60, car.y + 10, 20, 20); // Janela traseira
}

// Atualiza o carro
function updateCar() {
    car.x += car.speed;

    // Impede que o carro saia do canvas
    if (car.x < 0) car.x = 0;
    if (car.x + car.width > canvas.width) car.x = canvas.width - car.width;
}

// Função para disparar a animação do texto
function triggerTextAnimation(message) {
    animatedText = message;
    textAlpha = 1; // Começa opaco
    textX = car.x + car.width / 2; // Centraliza o texto no carro
    textY = car.y - 20; // Coloca o texto acima do carro
}

// Desenha o texto animado
function drawAnimatedText() {
    if (textAlpha > 0) {
        ctx.font = "20px Arial";
        ctx.fillStyle = `rgba(0, 0, 0, ${textAlpha})`; // Define a opacidade
        ctx.textAlign = "center";
        ctx.fillText(animatedText, textX, textY);
        textAlpha -= 0.02; // Diminui a opacidade ao longo do tempo
    }
}

// Loop do jogo
function gameLoop() {
    ctx.clearRect(0, 0, canvas.width, canvas.height); // Limpa a tela
    updateCar(); // Atualiza a posição do carro
    drawCar(); // Desenha o carro
    drawAnimatedText(); // Desenha o texto animado
    requestAnimationFrame(gameLoop); // Continua o loop
}

gameLoop();
