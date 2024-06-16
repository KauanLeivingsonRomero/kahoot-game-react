import { ReactNode, SetStateAction } from "react"
import * as PusherTypes from 'pusher-js';

export interface PusherContextProps{
  
  pusher: PusherTypes.default | null;
  setPusher: React.Dispatch<SetStateAction<PusherTypes.default>> | null;
  channel: PusherTypes.Channel | null;
  setChannel: React.Dispatch<SetStateAction<PusherTypes.Channel>> | null;
  userName: string;
  setUserName: React.Dispatch<SetStateAction<string>>;
  userEmail: string;
  setUserEmail: React.Dispatch<SetStateAction<string>>;
  
}

export interface PusherProviderProps{
  children: ReactNode
}