import { useEffect, useState } from 'react'
import './style.css'

export default function Play(){

  const [score, setScore] = useState(0)

  useEffect(()=>{

  }, [score])

  return (
    <div className="main-page">
      <div className="score"> Pontos: {score}</div>
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