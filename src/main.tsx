import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import App from './App.tsx'
import { UserAgentProvider } from '@quentin-sommer/react-useragent'
import GameProvider from "../contexts/gameContext.tsx"

ReactDOM.createRoot(document.getElementById('root')!).render(
  <React.StrictMode>
    <UserAgentProvider ua={window.navigator.userAgent}>
      <GameProvider>
        <App />
      </GameProvider>
    </UserAgentProvider>
  </React.StrictMode>,
)
