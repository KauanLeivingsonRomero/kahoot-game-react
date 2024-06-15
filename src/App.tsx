import { UserAgent } from '@quentin-sommer/react-useragent';
import RegisterMobile from './components/register/mobile/index';
import QrcodeMobile from './components/qrcode/mobile';
import QrcodeDesktop from './components/qrcode/desktop';
import GamePresentation from './components/animations/gamePresentation';
import RegisterDesktop from './components/register/desktop';
import Game from './components/game';


function App() {
  return (
    <>
      <UserAgent mobile tablet>
        <RegisterMobile/>
        <QrcodeMobile />
        <GamePresentation />
        <Game />
      </UserAgent>
      <UserAgent computer>
        <RegisterDesktop />
        <QrcodeDesktop />
        <GamePresentation />
        <Game />    
      </UserAgent>
    </>
  )
}

export default App
