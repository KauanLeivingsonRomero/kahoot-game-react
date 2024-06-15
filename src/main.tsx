import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import App from './App.tsx'
import { UserAgentProvider } from '@quentin-sommer/react-useragent'
import { BrowserRouter, Route, Routes   } from 'react-router-dom'
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
              <Routes>
                <Route path="/" Component={App} />
              </Routes>
            </PointsProvider>
          </GameProvider>
        </UserAgentProvider>
      </PusherProvider>
    </React.StrictMode>
  </BrowserRouter>
)
