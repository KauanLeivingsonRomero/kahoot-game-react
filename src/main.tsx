import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import App from './App.tsx'
import { UserAgentProvider } from '@quentin-sommer/react-useragent'
import { BrowserRouter } from 'react-router-dom'
import PusherProvider from './contexts/pusherContext.tsx'
import GameProvider from './contexts/gameContext.tsx'
import PointsProvider from './contexts/pointsContext.tsx'

ReactDOM.createRoot(document.getElementById('root')!).render(
  <BrowserRouter>
    <React.StrictMode>
      <PusherProvider>
        <UserAgentProvider ua={window.navigator.userAgent}>
          <GameProvider>
            <PointsProvider>
              <App />
            </PointsProvider>
          </GameProvider>
        </UserAgentProvider>
      </PusherProvider>
    </React.StrictMode>
  </BrowserRouter>
)
