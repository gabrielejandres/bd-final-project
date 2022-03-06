import { useEffect, useState } from 'react'
import './style.css'

export default function Play(){

  const [score, setScore] = useState(0)
  const [question, setQuestion] = useState('Carregando...')
  const [options, setOptions] = useState(['alo', 'teste', 'sim', 'não'])
  const [answer, setAnswer] = useState('sim')
  const [time, setTime] = useState(30)
  const [correct, setCorrect] = useState(false)

  const checkAnswer = (option) =>{
    if(option === answer){
      setTime(0)
      setScore(time*10);
      setCorrect(true);
    } else{
      setTime(0)
      setScore(0);
      setCorrect(false);
    }
  }


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
            Tempo: {time}
          </div>
        </div>
        <div className="game-content" style={{'background-color': correct ? 'green' : 'red'}}>
          {options.map((option) => {
            return(
              <div className="game-options" onClick={()=>{checkAnswer(option)}}>
                {option}
              </div>
            )
            })}
        </div>
      </div>
    </div>
  )
}