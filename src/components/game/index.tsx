import { useContext } from 'react';
import { GameContext } from '../../../contexts/gameContext';
import Question from '../questions';
import { questions } from '../questions/questions';
import Results from '../results';
import "./styles.css"
import { PointsContext } from '../../../contexts/points';
import { COLORS } from '../../colors';

const Game = () => {
  const { handleGame, currentQuestionIndex, handleResults } = useContext(GameContext);
  const { setRedPoints, redPoints, setBluePoints, bluePoints, setYellowPoints, yellowPoints, setGreenPoints, greenPoints, totalPoints, setTotalPoints, setIsAnswered, setSelectedColor} = useContext(PointsContext);

  const handleAnswer = (answer: string, color: string) => {

    switch(color) {
      case COLORS.$red:
        setRedPoints(redPoints + 1);
        setTotalPoints(totalPoints + 1);
        setSelectedColor(color)
        setIsAnswered(true)
        break;
      case COLORS.$blue:
        setBluePoints(bluePoints + 1);
        setTotalPoints(totalPoints + 1);
        setSelectedColor(color)
        setIsAnswered(true)
        break;
      case COLORS.$yellow:
        setYellowPoints(yellowPoints + 1);
        setTotalPoints(totalPoints + 1);
        setSelectedColor(color)
        setIsAnswered(true)
        break;
      case COLORS.$green:
        setGreenPoints(greenPoints + 1);
        setTotalPoints(totalPoints + 1);
        setSelectedColor(color)
        setIsAnswered(true)
        break;
      default:
        break;
    }

    console.log(answer)

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
    </>
  );
}

export default Game;
