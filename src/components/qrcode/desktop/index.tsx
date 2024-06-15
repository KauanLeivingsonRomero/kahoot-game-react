import { useContext } from "react";
import './style.css'
import { GameContext } from "../../../contexts/gameContext";


const QrcodeDesktop = () => {
  
  const {handleQrcode} = useContext(GameContext)
  
  return(
    <>
      {handleQrcode &&
      <div className="animate__animated animate__backInDown mb-5 mt-5 container text-center">
        <div className="qrcode mb-3">
          <img className="qrcode-image" src="https://res.cloudinary.com/projetos/image/upload/f_auto/v1716829704/kahoot-control-e/assets/qrcode.png" alt="kahoot qr-code" />
        </div>
        <h1 className="fw-bold mb-3">Aguardando os outros jogadores!</h1>
        <h1></h1>
      </div>
      }
    </>
  );
}

export default QrcodeDesktop;