import { useContext, useEffect, useState } from 'react';
import { GameContext } from '../../contexts/gameContext';
import Question from '../questions';
import { questions } from '../questions/questions';
import Results from '../results';
import "./styles.css"
import { PointsContext } from '../../contexts/pointsContext';
import { COLORS } from '../../colors';
import Scoreboard from '../scoreboard';
import { PusherContext } from '../../contexts/pusherContext';
import axios from 'axios';

const Game = () => {
  const { handleGame, currentQuestionIndex, handleResults } = useContext(GameContext);
  const { setRedPoints, setBluePoints, setYellowPoints, setGreenPoints, setTotalPoints, setIsAnswered, setSelectedColor, handleScoreboard} = useContext(PointsContext);
  const {channel, userEmail, userName} = useContext(PusherContext);
  const [rightAnswer, setRightAnswer] = useState<number>(0);

  useEffect(() => {
    channel?.bind("client-answer", (data: {answer: string, color: string}) => {
      switch(data.color) {
        case COLORS.$red:
          setRedPoints((redPoints) => redPoints + 1);
          setTotalPoints((totalPoints) => totalPoints + 1);
          
          break;
        case COLORS.$blue:
          setBluePoints((bluePoints) => bluePoints + 1);
          setTotalPoints((totalPoints) => totalPoints + 1);
          break;
        case COLORS.$yellow:
          setYellowPoints((yellowPoints) => yellowPoints + 1);
          setTotalPoints((totalPoints) => totalPoints + 1);
          break;
        case COLORS.$green:
          setGreenPoints((greenPoints) => greenPoints + 1);
          setTotalPoints((totalPoints) => totalPoints + 1);
          break;
        default:
          break;
      }
    })
  }, [channel])

  useEffect(() => {
    if(rightAnswer > 0){
      axios.post("http://localhost:8000/painel/proc/Controllers/registerAnswer.php", {
        points:  rightAnswer,
        name: userName,
        email: userEmail,
      })
    }
  },[rightAnswer, userName, userEmail])
  

  const handleAnswer = (answer: string, color: string) => {
    channel?.trigger("client-answer", {answer: answer, color: color})
    
    if(answer === questions[currentQuestionIndex].answer){
      setRightAnswer((prevRightAnswer) => prevRightAnswer + 1)
    }
    
    switch(color) {
      case COLORS.$red:
        setRedPoints((redPoints) => redPoints + 1);
        setTotalPoints((totalPoints) => totalPoints + 1);
        setSelectedColor(color)
        setIsAnswered(true)
        break;
      case COLORS.$blue:
        setBluePoints((bluePoints) => bluePoints + 1);
        setTotalPoints((totalPoints) => totalPoints + 1);
        setSelectedColor(color)
        setIsAnswered(true)
        break;
      case COLORS.$yellow:
        setYellowPoints((yellowPoints) => yellowPoints + 1);
        setTotalPoints((totalPoints) => totalPoints + 1);
        setSelectedColor(color)
        setIsAnswered(true)
        break;
      case COLORS.$green:
        setGreenPoints((greenPoints) => greenPoints + 1);
        setTotalPoints((totalPoints) => totalPoints + 1);
        setSelectedColor(color)
        setIsAnswered(true)
        break;
      default:
        break;
    }
    
  };

  

  return(
    <>
      {handleGame &&
        <Question
          question={questions[currentQuestionIndex].question}
          options={questions[currentQuestionIndex].options}
          image={questions[currentQuestionIndex].image}
          onAnswer={handleAnswer}
          timer={questions[currentQuestionIndex].timer}
        /> 
      }      
      {handleResults &&
        <Results />
      }
      {handleScoreboard &&
        <Scoreboard/>
      }
    </>
  );
}

export default Game;
