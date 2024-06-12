import express from 'express';
import 'dotenv/config';
import { createServer } from 'http';
import { Server } from 'socket.io';

const app = express();
const server = createServer(app);
const io = new Server(server);

// eslint-disable-next-line no-undef
const PORT = process.env.PORT || 4000;

let questions = [
  { 
    question: 'Qual é a capital da França?', 
    options: [
      {value: 'Paris', color: '#e21b3b'}, 
      {value: 'Londres', color: '#44a2e4'}, 
      {value: 'Roma', color: '#f1d14a'}, 
      {value: 'Berlim', color: '#68c334'}
    ], 
    answer: 'Paris', 
    image: "https://res.cloudinary.com/projetos/image/upload/v1716425007/kahoot-control-e/assets/jogadores.png",
    timer: 5
  },
  { 
    question: 'Qual é 2 + 2?', 
    options: [
      {value: '3', color: '#e21b3b'}, 
      {value: '4', color: '#44a2e4'}, 
      {value: '5', color: '#f1d14a'}, 
      {value: '6', color: '#68c334'}
    ], 
    answer: '4',
    image: "https://res.cloudinary.com/projetos/image/upload/v1716424727/kahoot-control-e/assets/filosofos.png",
    timer: 5
  },
]

let currentQuestionIndex = 0;

io.on('connection', (socket) => {
  console.log('New client connected');

  socket.emit('currentQuestion', {
    question: questions[currentQuestionIndex].question,
    options: questions[currentQuestionIndex].options,
    answer: questions[currentQuestionIndex].answer,
    image: questions[currentQuestionIndex].image,
    time: questions[currentQuestionIndex].timer
  });

  socket.on('nextQuestion', () => {
    currentQuestionIndex += 1;
    if (currentQuestionIndex < questions.length) {
      io.emit('currentQuestion', {
        question: questions[currentQuestionIndex].question,
        options: questions[currentQuestionIndex].options,
        answer: questions[currentQuestionIndex].answer,
        image: questions[currentQuestionIndex].image,
        time: questions[currentQuestionIndex].timer
      });
    } else {
      io.emit('gameOver');
    }
  });

  socket.on('disconnect', () => {
    console.log('Client disconnected');
  });
});

app.get('/', (_req, res) => {
  res.send('<h1>Rodando o server</h1>')
})

server.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});
