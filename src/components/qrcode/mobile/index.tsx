import { useContext } from "react";
import { GameContext } from "../../../contexts/gameContext";
import './style.css'
import UserList from "../../userList";


const QrcodeMobile = () => {
  const {handleQrcode} = useContext(GameContext)
  
  return(
    <>
      {handleQrcode &&
      <div className="animate__animated animate__backInDown mb-5 mt-5 container text-center">
        <div className="qrcode mb-3">
          <img className="qrcode-image" src="https://res.cloudinary.com/projetos/image/upload/v1718729147/kahoot-control-e/assets/qrcode.png" alt="kahoot qr-code" />
        </div>
        <h1 className="fw-bold mb-3">Aguardando os outros jogadores!</h1>
        <UserList />
      </div>
      }
    </>
  );
}

export default QrcodeMobile;