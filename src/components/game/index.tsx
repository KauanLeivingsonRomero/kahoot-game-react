import { useContext, useEffect } from 'react';
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
  const {channel} = useContext(PusherContext);

  useEffect(() => {
    channel?.bind("client-answer", (data: {answer: string, color: string}, me: string) => {
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
  

  const handleAnswer = (answer: string, color: string) => {
    channel?.trigger("client-answer", {answer: answer, color: color})
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
    axios.post("http://localhost:5173/painel/")
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
