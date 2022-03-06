import { useEffect, useState } from 'react'
import './style.css'

export default function Play(){

  const [score, setScore] = useState(0)
  const [question, setQuestion] = useState('Carregando...')
  const [options, setOptions] = useState(['alo', 'teste', 'sim', 'não'])
  const [answer, setAnswer] = useState('a')

  useEffect(()=>{

  }, [score])

  return (
    <div className="main-page">
      <div className="score"> 
        <div className="score-text">Pontos: {score}</div>
      </div>
      <div className="game-container">
        <div className="game-header">
          <div className="game-question">
            {question}
          </div>
          <div className="game-timer">
            Tempo: 1
          </div>
        </div>
        <div className="game-content">
          {options.map((option) => {
              <div className="game-options">
                {option}
              </div>
            })}
        </div>
      </div>
    </div>
  )
}