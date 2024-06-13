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
  isAnswered: false,
  setIsAnswered: Object,
  selectedColor: "",
  setSelectedColor: Object,
  handleScoreboard: false,
  setHandleScoreboard: Object,
  reset: Function,
});



const PointsProvider = ({ children }: PointsProviderProps) => {
  
  const [redPoints, setRedPoints] = useState(0);
  const [bluePoints, setBluePoints] = useState(0);
  const [yellowPoints, setYellowPoints] = useState(0);
  const [greenPoints, setGreenPoints] = useState(0);
  const [totalPoints, setTotalPoints] = useState(0);
  const [isAnswered, setIsAnswered] = useState(false);
  const [selectedColor, setSelectedColor] = useState("");
  const [handleScoreboard, setHandleScoreboard] = useState(false);

  const reset = () => {
    setRedPoints(0)
    setBluePoints(0)
    setGreenPoints(0)
    setYellowPoints(0)
    setTotalPoints(0)
  }

  return (
    <PointsContext.Provider value={{ redPoints, setRedPoints, bluePoints, setBluePoints, yellowPoints, setYellowPoints,greenPoints, setGreenPoints, reset, totalPoints, setTotalPoints, isAnswered, setIsAnswered, selectedColor, setSelectedColor, handleScoreboard, setHandleScoreboard}}>
      {children}
    </PointsContext.Provider>
  );
};

export default PointsProvider;