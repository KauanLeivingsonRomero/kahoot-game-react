import { useContext, useEffect, useState } from 'react';
import 'animate.css';
import { GameContext } from '../../../contexts/gameContext';
import { Button, FloatingLabel, Form } from 'react-bootstrap';
import "./style.css";
import { PusherContext } from '../../../contexts/pusherContext';
import axios from 'axios';

const RegisterMobile = () => {
  const { handleRegister, setHandleRegister, setHandleQrcode, setHandlePresentation } = useContext(GameContext);
  const { pusher, channel, setUserName, setUserEmail } = useContext(PusherContext);
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
 

  useEffect(() => {
    if(channel && pusher){
      channel.bind('my-event', () => {
        setHandleQrcode(false)
        setHandlePresentation(true)
      })
    }
  }, [channel, pusher]);

  const nextStep = () => {
    setUserName(name);
    setUserEmail(email);
    setHandleRegister(false);
    setHandleQrcode(true);
    axios.post(`${import.meta.env.VITE_API_URL}/painel/proc/Controllers/registerUser.php`, {
      name: name,
      email: email
    } )
  }

  return (
    <>
      {handleRegister && 
        <div className="register-container animate__animated animate__backInDown">
          <h2 className='mb-5 fw-bold'>Kahoot Control-e</h2>
          <h4 className="text-black fw-bold">Participar do jogo</h4>
          <Form className='form' onSubmit={() => nextStep()}>
            <FloatingLabel controlId="floatingName" label="Seu primeiro nome" className="mb-3">
              <Form.Control type="text" placeholder="Seu primeiro nome" name="name" value={name} onChange={(e) => setName(e.target.value)}/>
            </FloatingLabel>
            <FloatingLabel controlId="floatingEmail" label="Seu email" className="mb-3">
              <Form.Control type="email" placeholder="Seu email" name="email" value={email} onChange={(e) => setEmail(e.target.value)}/>
            </FloatingLabel>
            <Button className="registerButton" type="submit"><h4>Ok, vamos lá!</h4></Button>
          </Form>
        </div>
      }      
    </>
  );
}

export default RegisterMobile;

