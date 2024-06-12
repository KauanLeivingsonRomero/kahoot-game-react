import { useContext } from 'react';
import 'animate.css';
import { GameContext } from '../../../../contexts/gameContext';
import { Button } from 'react-bootstrap';
import "./style.css";


const RegisterDesktop = () => {
  
  const { handleLobby, setHandleLobby, setHandleQrcode } = useContext(GameContext);
  const nextStep = () => {setHandleLobby(false);setHandleQrcode(true)}

  return(
    <>
      {handleLobby && 
        <div className='register'>
          <h2 className='mb-5 fw-bold'>Liberar Lobby</h2>
          <Button className="registerButton" type="button" onClick={nextStep}><h4>Lobby</h4></Button>
        </div>
      }      
    </>
  );
}

export default RegisterDesktop;