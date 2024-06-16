import { createContext, useEffect, useState } from 'react';
import { PusherContextProps, PusherProviderProps } from '../types/pusherContextProps';
import Pusher, { Channel } from 'pusher-js';


export const PusherContext = createContext<PusherContextProps>({
  pusher: null,
  setPusher: () => {},
  channel: null,
  setChannel: () => {},
  userName: '',
  setUserName: () => {},
  userEmail: '',
  setUserEmail: () => {}

});



const PusherProvider = ({ children }: PusherProviderProps) => {

  const [pusher, setPusher] = useState<Pusher | any>(null);
  const [channel, setChannel] = useState<Channel | any>();
  const [userName, setUserName] = useState('');
  const [userEmail, setUserEmail] = useState('');
  
  useEffect(() => {
    if (userName && userEmail) {
      const pusherInstance = new Pusher(`${import.meta.env.VITE_PUSHER_KEY}`, {
        cluster: `${import.meta.env.VITE_PUSHER_CLUSTER}`,
        authEndpoint: `${import.meta.env.VITE_API_URL}/painel/server.php`,
        auth: {
          headers: {
            'Content-Type': 'application/json',
          },
          params: {
            name: userName,
            email: userEmail,
          },
        },
      });
      pusherInstance.connection.bind('connected', () => {
        const channelInstance = pusherInstance.subscribe('presence-client-channel');                
        setChannel(channelInstance);
      })     
      
      setPusher(pusherInstance);
            
      return () => {
        pusherInstance.disconnect();
      };
    }
  }, [userName, userEmail]);
  
  return (
    <PusherContext.Provider value={{pusher, setPusher, channel, setChannel, userName, setUserName, userEmail, setUserEmail}}>
      {children}
    </PusherContext.Provider>
  );
};

export default PusherProvider;
