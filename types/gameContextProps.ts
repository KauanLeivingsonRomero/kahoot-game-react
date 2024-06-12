import { Dispatch, ReactNode, SetStateAction } from "react"

export interface GameContextProps{
  handleRegister: boolean
  setHandleRegister: Dispatch<SetStateAction<boolean>>
  handleQrcode: boolean
  setHandleQrcode: Dispatch<SetStateAction<boolean>>
  handleLobby: boolean
  setHandleLobby: Dispatch<SetStateAction<boolean>>
  handlePresentation: boolean
  setHandlePresentation: Dispatch<SetStateAction<boolean>>
  handleGame: boolean
  setHandleGame: Dispatch<SetStateAction<boolean>>
  handleResults: boolean
  setHandleResults: Dispatch<SetStateAction<boolean>>
  startCountDown: boolean
  setStartCountDown: Dispatch<SetStateAction<boolean>>
  currentQuestionIndex: number
  setCurrentQuestionIndex: Dispatch<SetStateAction<number>>
  time: number
  setTime: Dispatch<SetStateAction<number>>
}

export interface GameProviderProps{
  children: ReactNode
}