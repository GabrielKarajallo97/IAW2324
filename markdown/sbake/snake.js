const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

const gridSize = 20;
const gridWidth = canvas.width / gridSize;
const gridHeight = canvas.height / gridSize;

const snake = [{ x: gridWidth / 2, y: gridHeight / 2 }];
const food = { x: Math.floor(Math.random() * gridWidth), y: Math.floor(Math.random() * gridHeight) };

let direction = 'right';
let score = 0;

function draw() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  for (let i = 0; i < snake.length; i++) {
    const cell = snake[i];
    ctx.fillStyle = i === 0 ? 'green' : 'white';
    ctx.fillRect(cell.x * gridSize, cell.y * gridSize, gridSize, gridSize);
    ctx.strokeStyle = 'black';
    ctx.strokeRect(cell.x * gridSize, cell.y * gridSize, gridSize, gridSize);
  }

  ctx.fillStyle = 'white';
  ctx.fillRect(food.x * gridSize, food.y * gridSize, gridSize, gridSize);

  const head = snake[0];
  const nextHead = { x: head.x, y: head.y };

  switch (direction) {
    case 'up':
      nextHead.y--;
      break;
    case 'down':
      nextHead.y++;
      break;
    case 'left':
      nextHead.x--;
      break;
    case 'right':
      nextHead.x++;
      break;
  }

  snake.unshift(nextHead);

  if (head.x === food.x && head.y === food.y) {
    score++;
    food.x = Math.floor(Math.random() * gridWidth);
    food.y = Math.floor(Math.random() * gridHeight);
  } else {
    snake.pop();
  }

  if (
    nextHead.x < 0 ||
    nextHead.y < 0 ||
    nextHead.x >= gridWidth ||
    nextHead.y >= gridHeight ||
    snake.some(cell => cell.x === nextHead.x && cell.y === nextHead.y)
  ) {
    clearInterval(gameLoop);
    alert(`Game Over! Your score: ${score}`);
  }
}

function keyDown(e) {
  switch (e.key) {
    case 'ArrowUp':
      if (direction !== 'down') direction = 'up';
      break;
    case 'ArrowDown':
      if (direction !== 'up') direction = 'down';
      break;
    case 'ArrowLeft':
      if (direction !== 'right') direction = 'left';
      break;
    case 'ArrowRight':
      if (direction !== 'left') direction = 'right';
      break;
  }
}

const gameLoop = setInterval(draw, 100);
document.addEventListener('keydown', keyDown);