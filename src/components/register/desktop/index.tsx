import { useContext, useEffect } from 'react';
import 'animate.css';
import { Button } from 'react-bootstrap';
import "./style.css";
import { GameContext } from '../../../contexts/gameContext';
import { PusherContext } from './../../../contexts/pusherContext';

const RegisterDesktop = () => {
  const { handleLobby, setHandleLobby, setHandleQrcode, setHandlePresentation } = useContext(GameContext);
  const { pusher, channel, setUserName, setUserEmail } = useContext(PusherContext);
  
  

  useEffect(() => {
    if(channel && pusher){
      channel.bind('my-event', () => {
        setHandlePresentation(true)
        setHandleQrcode(false)
      })
    }

    
  }, [channel, pusher]);

  const nextStep = () => {
    setUserName("admin");
    setUserEmail("admin@admin.com");
    setHandleLobby(false);
    setHandleQrcode(true);
  };

  return (
    <>
      {handleLobby && 
        <div className='register'>
          <h2 className='mb-5 fw-bold'>Liberar Lobby</h2>
          <Button className="registerButton" type="button" onClick={nextStep}><h4>Lobby</h4></Button>
        </div>
      }      
    </>
  );
};

export default RegisterDesktop;
