import { useEffect, useState } from 'react'
import './style.css'
import { CountdownCircleTimer } from 'react-countdown-circle-timer'
import { useNavigate } from 'react-router-dom';
import UserService from '../../services/User/index.js';
import GameService from '../../services/Game/index.js';
import Loading from '../../components/Loading/index.jsx';
import Modal from 'react-modal';
import Button from '../../components/Button/index.jsx';

export default function Play(){

  const customStyles = {
    content: {
      top: '50%',
      left: '50%',
      right: 'auto',
      bottom: 'auto',
      marginRight: '-50%',
      transform: 'translate(-50%, -50%)',
      width: '30vw',
      height: '20vh',
      borderRadius: '10px',
      display: 'flex',
      flexDirection: 'column',
      justifyContent: 'space-around',
      textAlign: 'center',
      alignItems: 'center'
    },
  };

  const navigate = useNavigate();
  const [score, setScore] = useState(0)
  const [question, setQuestion] = useState()
  const [options, setOptions] = useState()
  const [answer, setAnswer] = useState('sim')
  const [time, setTime] = useState(30)
  const [clickedOnAnswer, setclickedOnAnswer] = useState(undefined)
  const [isClockRunning, setClockRunning] = useState(true)
  const [questionChoosed, setChoosedQuestion] = useState(Math.floor(Math.random()*4)+1)
  const [key, setKey] = useState(0)
  const [modalIsOpen, setIsOpen] = useState(false);

  const checkAnswer = async (option) =>{
    if(option === answer && clickedOnAnswer == undefined){
      setClockRunning(false);
      setclickedOnAnswer(true);
      setScore(score + time*10);
      setTimeout(function() {
        setclickedOnAnswer(undefined)
        setClockRunning(true);
      }, 1000);

    } else if(options != answer && clickedOnAnswer == undefined){
      setClockRunning(false);
      setclickedOnAnswer(false);
      console.log(score)
      let form = {
        "score": score
      }
      console.log(form)
      const response = await UserService.updateScore(localStorage.getItem('id'), form);
      console.log(response)
      setIsOpen(true);
    }
  }

  function openModal() {
    setIsOpen(true);
  }

  function closeModal() {
    setIsOpen(false);
    navigate('/home/ranking')
  }

  const createQuestion = async (question)=>{
    let response;
    switch (question) {
      case 1:
        response = await GameService.releaseYearQuestion();
        setQuestion(response.data.question)
        setOptions(response.data.options)
        setAnswer(response.data.answer)
        break;

      case 2:
        response = await GameService.twoPlataformsQuestion();
        setQuestion(response.data.question)
        setOptions(response.data.options)
        setAnswer(response.data.answer)
        break;
      case 3:
        response = await GameService.numberOfSeasonsQuestion();
        setQuestion(response.data.question)
        setOptions(response.data.options)
        setAnswer(response.data.answer)
        break;

      case 4:
        response = await GameService.notAMovieQuestion();
        setQuestion(response.data.question)
        setOptions(response.data.options)
        setAnswer(response.data.answer)
        break;

      case 5:
      
        break;

      case 6:
      
        break;

      case 7:
      
        break;

      case 8:
      
        break;

      case 9:
      
        break;

      case 10:
      
        break;

      case 11:
      
        break;

      case 12:
      
        break;
    }
  }

  const renderTime = ({ remainingTime }) => {
    setTime(remainingTime)
    return (
        <div id='time'>{remainingTime}</div>
    );
  };


  useEffect(async()=>{

    setTimeout(function(){
      setKey(prevKey => prevKey + 1);
      setChoosedQuestion(Math.floor(Math.random()*4)+1)
      createQuestion(questionChoosed)
    }, 1000)


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
              key={key}
              colors={['#F17E50','#C95C31', '#A13B11', '#7A1800', '#570000']}
              colorsTime={[30, 22, 15, 7, 0]}
              size={100}
              onComplete={async() => {
                  setClockRunning(false);
                  let form = {
                    "score": score
                  }
                  const response = await UserService.updateScore(localStorage.getItem('id'), form);
                  setIsOpen(true);
              }}
            >
              {renderTime}
            </CountdownCircleTimer>

            <Modal
              isOpen={modalIsOpen}
              onRequestClose={closeModal}
              style={customStyles}
              contentLabel="Example Modal"
            >
              <div>Você perdeu! Pontuação final: {score}</div>
              <button className="button" onClick={closeModal} style={{'width': '12vw'}}>Ver Ranking</button>
            </Modal>
          </div>
        </div>
        <div className="game-content">
          {options ? 
          options.map((option) => {
            return(
              <div className="game-options" onClick={()=>{time != 0 && checkAnswer(option)}} style={{'backgroundColor': (clickedOnAnswer && option === answer) ? 'green' : '#F2F2F2'}}>
                {option}
              </div>
            )
            }) :
            <Loading />
          }
        </div>
      </div>
    </div>
  )
}