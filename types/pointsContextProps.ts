import { Dispatch, ReactNode, SetStateAction } from "react"

export interface PointsContextProps{
  redPoints: number
  setRedPoints: Dispatch<SetStateAction<number>>
  bluePoints: number
  setBluePoints: Dispatch<SetStateAction<number>>
  yellowPoints: number
  setYellowPoints: Dispatch<SetStateAction<number>>
  greenPoints: number
  setGreenPoints: Dispatch<SetStateAction<number>>
  totalPoints: number
  setTotalPoints: Dispatch<SetStateAction<number>>
  reset: Object
}

export interface PointsProviderProps{
  children: ReactNode
}