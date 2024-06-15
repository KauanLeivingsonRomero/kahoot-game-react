import { useContext, useEffect, useState } from 'react';
import './styles.css'
import { GameContext } from '../../contexts/gameContext';
import Countdown from '../countdown';

const GamePresentation = () => {
  const {handlePresentation, setHandlePresentation, setHandleGame} = useContext(GameContext)
  // countdown
  // const [time, setTime] = useState<number>(6);

  // steps across the countdown
  const [title, setTitle] = useState(true)
  const [presentation, setPresentation] = useState(false)

  // countdown
  // useEffect(() => {
  //   const timer = setTimeout(() => {
  //     setTime((prevCount) => prevCount - 1);
  //   }, 1000);
  //   return () => clearTimeout(timer);
  // }, [time, setTime]);

  const time = Countdown(6, handlePresentation, () => {})

  useEffect(() => {
    if(time === 3){
      setTitle(false)
      setPresentation(true)
    }
    if(time === 0){
      setHandlePresentation(false)
      setHandleGame(true)
    }
  }, [setHandleGame, setHandlePresentation, time])

  return(
    <>
      {handlePresentation &&
        <div className='presentation'>
          <h1 className='fw-bold animate__animated animate__backInDown fs-xl' style={{display: title ? "block" : "none"}}>Kahoot Control-e</h1>
          <h1 className='fw-bold animate__animated animate__bounce' style={{display: presentation ? "block" : "none"}}>{time}</h1>
        </div>
      }      
    </>
  );
}

export default GamePresentation;