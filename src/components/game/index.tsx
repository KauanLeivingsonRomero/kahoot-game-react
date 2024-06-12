import { useContext } from 'react';
import { GameContext } from '../../../contexts/gameContext';
import Question from '../questions';
import { questions } from '../questions/questions';
import Results from '../results';
import "./styles.css"
import { PointsContext } from './../../../contexts/points';


const Game = () => {
  const {handleGame, currentQuestionIndex, handleResults} = useContext(GameContext)
  const {redPoints, setRedPoints, setTotalPoints, totalPoints} = useContext(PointsContext)

  const handleAnswer = (answer: string) => {
    setRedPoints(redPoints + 1)
    {answer == questions[currentQuestionIndex].answer ? setTotalPoints(totalPoints + 1) : totalPoints}
    console.log(answer == questions[currentQuestionIndex].answer)
    console.log(totalPoints)
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