import { useContext, useEffect } from 'react';
import './style.css'
import { GameContext } from '../../../../../contexts/gameContext';
import { questions } from '../../questions';
import { PointsContext } from '../../../../../contexts/points';

const QuestionTimer = () => {  

  const {time, setTime, currentQuestionIndex, setHandleResults, handleResults, setHandleGame, setCurrentQuestionIndex} = useContext(GameContext)
  const {reset, setIsAnswered, setHandleScoreboard} = useContext(PointsContext)

  useEffect(() => {
    if (time === 0 && currentQuestionIndex + 1 < questions.length) {
      setHandleGame(false)
      setHandleResults(true)

      setTimeout(() => {
        const nextTimerIndex = (currentQuestionIndex + 1) % questions.length;
        setCurrentQuestionIndex(nextTimerIndex);
        setTime(questions[nextTimerIndex].timer); 
        setHandleGame(true)
        setHandleResults(false)
        setIsAnswered(false)
        reset()
      }, 2000)
    }
    if(time === 0 && currentQuestionIndex == questions.length - 1){
      setHandleGame(false)
      setHandleResults(true)
      setTimeout(() => {
        setHandleResults(false)
        setHandleScoreboard(true)
      }, 3000)
    }
  }, [currentQuestionIndex, handleResults, setCurrentQuestionIndex, setHandleGame, setHandleResults, setTime, time, reset, setIsAnswered]);

  useEffect(() => {
    const timerId = setInterval(() => {
      setTime((prevTime) => (prevTime > 0 ? prevTime - 1 : prevTime));
    }, 1000);
    return () => clearInterval(timerId);
  }, [currentQuestionIndex, setTime]);

  return(
    <div className='circle'>
      <h1>{time}</h1>
    </div>
  );
}

export default QuestionTimer;
