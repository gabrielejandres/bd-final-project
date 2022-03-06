import './style.css'
import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import Footer from '../../components/Footer/Home/index.jsx';
import { MdSportsScore, MdOutlineArrowBackIosNew } from 'react-icons/md';
import { FaMedal } from 'react-icons/fa'; 

export default function Ranking() {

  const [users, setUsers] = useState([{'name': 'User 1', 'score': '300'}, {'name': 'User 2', 'score': '200'},
  {'name': 'User 3', 'score': '200'}, {'name': 'User 4', 'score': '200'}, {'name': 'User 5', 'score': '200'} ]);

  const navigate = useNavigate();

  return(
    <div className="ranking-page">
      <div className="container">
        <div className="header">
          <MdOutlineArrowBackIosNew className="goBack" onClick={() => navigate("/home")}/>
          <h1> Ranking </h1>
        </div>
          <ul>
            {users.map((user, index) => {
              return (
                <li key={index}>
                  <div className="user">
                    <div className="position">
                      { index + 1 }
                    </div>
                    { user.name } 
                    { index === 0 && <FaMedal className="icon gold" /> }
                    { index === 1 && <FaMedal className="icon silver" /> }
                    { index === 2 && <FaMedal className="icon copper" /> }
                  </div>
                  <span className="score"> 
                    <MdSportsScore className="icon"/>
                    { user.score } 
                  </span>
                </li>
              )
            })}
          </ul>
        <Footer/>
      </div>
    </div>
  )
}