
// import { Container } from './styles';

import { useContext } from "react";
import { PointsContext } from "../../../contexts/points";
import { COLORS } from "../../colors";
import './styles.css'

const Scoreboard = () => {
  const {handleScoreboard} = useContext(PointsContext)
  return(
    <>
    {handleScoreboard && 
      <div className='container-fluid p-0 results'>
      <h1 className='title'>Vencedores</h1>
      <div className='container-pillars'>
        <div className='pillars-center'>
          <div className='pillar-map'>
          <h3 className='pillar-text'>Player 2</h3>
            <h5 className='pillar-text'>2</h5>
            <div className='pillar' style={{backgroundColor: COLORS.$silver, height:75}}></div>
          </div>
          <div className='pillar-map'>
          <h3 className='pillar-text'>Player 1</h3>
            <h5 className='pillar-text'>1</h5>
            <div className='pillar' style={{backgroundColor: COLORS.$gold, height: 100}}></div>
          </div>
          <div className='pillar-map'>
          <h3 className='pillar-text'>Player 3</h3>
            <h5 className='pillar-text'>3</h5>
            <div className='pillar' style={{backgroundColor: COLORS.$bronze, height: 50}}></div>
          </div>
        </div>
      </div>
    </div>
    }
  </>
  );
}

export default Scoreboard;