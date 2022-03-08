import { useEffect, useState } from 'react'
import './style.css'
import { CountdownCircleTimer } from 'react-countdown-circle-timer'
import { useNavigate } from 'react-router-dom';

export default function Play(){

  const navigate = useNavigate();
  const [score, setScore] = useState(0)
  const [question, setQuestion] = useState('Você concorda que 1+1 é igual a 2?')
  const [options, setOptions] = useState(['alo', 'teste', 'sim', 'não'])
  const [answer, setAnswer] = useState('sim')
  const [time, setTime] = useState(30)
  const [clickedOnAnswer, setclickedOnAnswer] = useState(undefined)
  const [isClockRunning, setClockRunning] = useState(true)

  const checkAnswer = (option) =>{
    if(option === answer && clickedOnAnswer == undefined){
      setClockRunning(false);
      setScore(time*10);
      setclickedOnAnswer(true);

    } else if(options != answer && clickedOnAnswer == undefined){
      setClockRunning(false);
      setclickedOnAnswer(false);
      alert('Você perdeu!');
      navigate('/home/ranking')
    }
  }

  const renderTime = ({ remainingTime }) => {
    setTime(remainingTime)
    if(remainingTime === 0){
      setClockRunning(false);
      navigate('/home/ranking')
    }

    return (
        <div id='time'>{remainingTime}</div>
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
              isPlaying={isClockRunning}
              duration={30}
              colors={['#F17E50','#C95C31', '#A13B11', '#7A1800', '#570000']}
              colorsTime={[30, 22, 15, 7, 0]}
              size={100}
            >
              {renderTime}
            </CountdownCircleTimer>
          </div>
        </div>
        <div className="game-content">
          {options.map((option) => {
            return(
              <div className="game-options" onClick={()=>{time != 0 && checkAnswer(option)}} style={{'backgroundColor': (clickedOnAnswer && option === answer) ? 'green' : '#F2F2F2'}}>
                {option}
              </div>
            )
            })}
        </div>
      </div>
    </div>
  )
}