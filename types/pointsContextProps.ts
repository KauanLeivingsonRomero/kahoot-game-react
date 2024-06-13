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
  isAnswered: boolean
  setIsAnswered: Dispatch<SetStateAction<boolean>>
  selectedColor: string
  setSelectedColor: Dispatch<SetStateAction<string>>
  reset: () => void
}

export interface PointsProviderProps{
  children: ReactNode
}