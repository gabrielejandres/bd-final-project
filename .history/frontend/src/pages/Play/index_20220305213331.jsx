import { useEffect, useState } from 'react'
import './style.css'

export default function Play(){

  const [score, setScore] = useState(0)

  useEffect(()=>{

  }, [score])

  return (
    <div className="main-page">
      <div className="score"> 
        <div className="score-text">Pontos: {score}</div>
      </div>
      <div className="game-container">
        <div>
          <div>
            
          </div>
          <div>

          </div>
        </div>
      </div>
    </div>
  )
}