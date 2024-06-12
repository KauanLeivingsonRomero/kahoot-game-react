import { createContext, useState } from 'react';
import { PointsContextProps, PointsProviderProps } from '../types/pointsContextProps';

export const PointsContext = createContext<PointsContextProps>({
  greenPoints: 0,
  setGreenPoints: Object,
  redPoints: 0,
  setRedPoints: Object,
  bluePoints: 0,
  setBluePoints: Object,
  yellowPoints: 0,
  setYellowPoints: Object,
  totalPoints: 0,
  setTotalPoints: Object,
  reset: Object,
});



const GameProvider = ({ children }: PointsProviderProps) => {

  const [redPoints, setRedPoints] = useState(0);
  const [bluePoints, setBluePoints] = useState(0);
  const [yellowPoints, setYellowPoints] = useState(0);
  const [greenPoints, setGreenPoints] = useState(0);
  const [totalPoints, setTotalPoints] = useState(0);

  const reset = () => {

  }

  return (
    <PointsContext.Provider value={{ redPoints, setRedPoints, bluePoints, setBluePoints, yellowPoints, setYellowPoints,greenPoints, setGreenPoints, reset, totalPoints, setTotalPoints }}>
      {children}
    </PointsContext.Provider>
  );
};

export default GameProvider;