import { useContext } from 'react';
import { GameContext } from '../../../contexts/gameContext';
import "./style.css"
import { questions } from '../questions/questions';
import { PointsContext } from '../../../contexts/points';
// import { COLORS } from '../../colors';

const Results = () => {

  const {handleResults, currentQuestionIndex} = useContext(GameContext);
  const {redPoints, bluePoints, yellowPoints, greenPoints} = useContext(PointsContext)
  const getPointsForOption = (color: string) => {
    switch(color) {
      case '#e21b3b': return redPoints;
      case '#44a2e4': return bluePoints;
      case '#f1d14a': return yellowPoints;
      case '#68c334': return greenPoints;
      default: return 0;
    }
  };

  return(
    <>
      {handleResults && 
        <div className='container-fluid p-0 results'>
          <h1 className='title'>{questions[currentQuestionIndex].question}</h1>
          <div className='container-pillars'>
            <div className='pillars-center'>
              {questions[currentQuestionIndex].options.map((option, index) => {
                
                  const isCorrect = option.value === questions[currentQuestionIndex].answer;
                  const points = getPointsForOption(option.color);

                  return (
                    <div className='pillar-map' key={index}>
                      {isCorrect && <span className="correct-mark icon">✔</span>}
                      <h1 className='pillar-text'>{points}</h1>
                      <div className='pillar' style={{backgroundColor: option.color}}></div>
                    </div>
                  );
                })}
            </div>
          </div>
        </div>
      }
    </>
  );
}

export default Results;