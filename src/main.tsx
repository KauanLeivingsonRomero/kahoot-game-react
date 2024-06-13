import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import App from './App.tsx'
import { UserAgentProvider } from '@quentin-sommer/react-useragent'
import PointsProvider from '../contexts/points.tsx'
import GameProvider from '../contexts/gameContext.tsx'

ReactDOM.createRoot(document.getElementById('root')!).render(
  <React.StrictMode>
    <UserAgentProvider ua={window.navigator.userAgent}>
      <GameProvider>
        <PointsProvider>
          <App />
        </PointsProvider>
      </GameProvider>
    </UserAgentProvider>
  </React.StrictMode>,
)
