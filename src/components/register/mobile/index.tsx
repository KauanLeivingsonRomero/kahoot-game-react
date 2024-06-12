import { useContext } from 'react';
import 'animate.css';
import { GameContext } from '../../../../contexts/gameContext';
import { Button, FloatingLabel, Form } from 'react-bootstrap';
import "./style.css";


const RegisterMobile = () => {
  
  const { handleRegister, setHandleRegister, setHandleQrcode } = useContext(GameContext);
  const nextStep = () => {setHandleRegister(false);setHandleQrcode(true)}

  return(
    <>
      {handleRegister && 
        <div style={{display: handleRegister ? "flex" : "none"}} className="register-container animate__animated animate__backInDown">
          <h2 className='mb-5 fw-bold'>Kahoot Control-e</h2>
          <h4 className="text-black fw-bold">Participar do jogo</h4>
          <Form className='form'>
            <FloatingLabel controlId="floatingName" label="Seu primeiro nome" className="mb-3">
              <Form.Control type="text" placeholder="Seu primeiro nome" name="name" />
            </FloatingLabel>
            <FloatingLabel controlId="floatingEmail" label="Seu email" className="mb-3">
              <Form.Control type="Email" placeholder="Seu email" name="email" />
            </FloatingLabel>
            <Button className="registerButton" type="button" onClick={nextStep}><h4>Ok, vamos lá!</h4></Button>
          </Form>
        </div>
      }      
    </>
  );
}

export default RegisterMobile;