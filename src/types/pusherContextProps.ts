import Pusher, { Channel } from "pusher-js";
import { ReactNode, SetStateAction } from "react"

export interface PusherContextProps{
  
  pusher: Pusher | null;
  setPusher: React.Dispatch<SetStateAction<Pusher | null>>;
  channel: Channel | null;
  setChannel: React.Dispatch<SetStateAction<Pusher | null>>;
  userName: string;
  setUserName: React.Dispatch<SetStateAction<string>>;
  userEmail: string;
  setUserEmail: React.Dispatch<SetStateAction<string>>;
  
}

export interface PusherProviderProps{
  children: ReactNode
}