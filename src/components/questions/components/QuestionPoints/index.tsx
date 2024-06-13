import React, { useContext } from 'react';
import './style.css'
import { PointsContext } from '../../../../../contexts/points';

// import { Container } from './styles';

const QuestionPoints: React.FC = () => {

  const {totalPoints} = useContext(PointsContext)

  return(
    <div className='circle'>
      <h1>{totalPoints}</h1>
    </div>
  );
}

export default QuestionPoints;