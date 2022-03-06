import { useEffect, useState } from 'react'
import './style.css'
import { CountdownCircleTimer } from 'react-countdown-circle-timer'

export default function Play(){

  const [score, setScore] = useState(0)
  const [question, setQuestion] = useState('Você concorda que 1+1 é igual a 2?')
  const [options, setOptions] = useState(['alo', 'teste', 'sim', 'não'])
  const [answer, setAnswer] = useState('sim')
  const [time, setTime] = useState(30)
  const [clickedOnAnswer, setclickedOnAnswer] = useState(undefined)

  const checkAnswer = (option) =>{
    if(option === answer && clickedOnAnswer == undefined){
      setTime(0)
      setScore(time*10);
      setclickedOnAnswer(true);
    } else if(options != answer && clickedOnAnswer == undefined){
      setTime(0)
      setScore(0);
      setclickedOnAnswer(false);
    }
  }

  const renderTime = ({ remainingTime }) => {
  
    return (
        <div>{remainingTime}</div>
    );
  };


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
            <CountdownCircleTimer
              isPlaying
              duration={30}
              colors={'orange'}
              size={100}
            >
              {renderTime}
            </CountdownCircleTimer>
          </div>
        </div>
        <div className="game-content">
          {options.map((option) => {
            return(
              <div className="game-options" onClick={()=>{checkAnswer(option)}} style={{'backgroundColor': (clickedOnAnswer && option === answer) ? 'green' : '#F2F2F2'}}>
                {option}
              </div>
            )
            })}
        </div>
      </div>
    </div>
  )
}