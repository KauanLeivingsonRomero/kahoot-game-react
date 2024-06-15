import { createContext, useState } from 'react';
import { questions } from '../components/questions/questions';
import { GameContextProps, GameProviderProps } from '../types/gameContextProps';

export const GameContext = createContext<GameContextProps>({
  startCountDown: false,
  setStartCountDown: Object,
  handleRegister: true,
  setHandleRegister: Object,
  handleLobby: true,
  setHandleLobby: Object,
  handleQrcode: false,
  setHandleQrcode: Object,
  handlePresentation: false,
  setHandlePresentation: Object,
  handleGame: false,
  setHandleGame: Object,
  handleResults: false,
  setHandleResults: Object,
  currentQuestionIndex: 0,
  setCurrentQuestionIndex: Object,
  time: 0,
  setTime: Object
});

const GameProvider = ({ children }: GameProviderProps) => {

  const [handleRegister, setHandleRegister] = useState(true);
  const [handleLobby, setHandleLobby] = useState(true);
  const [handleQrcode, setHandleQrcode] = useState(false);
  const [handlePresentation, setHandlePresentation] = useState(false);
  const [handleGame, setHandleGame] = useState(false);
  const [handleResults, setHandleResults] = useState(false);
  const [startCountDown, setStartCountDown] = useState(false);
  const [currentQuestionIndex, setCurrentQuestionIndex] = useState(0);
  const [time, setTime] = useState(questions[0].timer);

  return (
    <GameContext.Provider value={{ handleRegister, setHandleRegister, handleQrcode, setHandleQrcode, handleLobby, setHandleLobby, handlePresentation, setHandlePresentation, handleGame, setHandleGame, startCountDown, setStartCountDown, currentQuestionIndex, setCurrentQuestionIndex,time, setTime, handleResults, setHandleResults  }}>
      {children}
    </GameContext.Provider>
  );
};

export default GameProvider;