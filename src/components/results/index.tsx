import { useContext } from 'react';
import "./style.css"
import { questions } from '../questions/questions';
import { GameContext } from '../../contexts/gameContext';
import { PointsContext } from '../../contexts/pointsContext';
import { COLORS } from '../../colors';
// import { COLORS } from '../../colors';

const Results = () => {

  const {handleResults, currentQuestionIndex} = useContext(GameContext);
  const { redPoints, bluePoints, yellowPoints, greenPoints} = useContext(PointsContext);



  const getPointsForOption = (color: string) => {
    switch(color) {
      case COLORS.$red: return redPoints;
      case  COLORS.$blue: return bluePoints;
      case  COLORS.$yellow: return yellowPoints;
      case  COLORS.$green: return greenPoints;
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
                      <div className='pillar transition' style={{backgroundColor: option.color, height: points * 10}}></div>
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