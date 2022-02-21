import {FaQuestionCircle} from 'react-icons/fa'
import './style.css'
import {CgProfile} from 'react-icons/cg'
import pfIcon from '../../assets/img/woman.png';
import fbLogo from '../../assets/img/facebook.png';
import igLogo from '../../assets/img/instagram.png';
import ttLogo from '../../assets/img/twitter.png';
import Logo from '../../assets/img/Logo.svg';

export default function Login(){
  return(
    <div className="main-page">
        <div className="container">
            <div className="logo">
              <img src={Logo} />
            </div>
            <div className="access-area">
              <div className="profile">
                  <img src={pfIcon} />
              </div>
            <div className="user-interaction">
              <div className="username-input">
                <form>
                    <input placeholder='username' className="input"></input>
                </form>
              </div>
              <div className="continue-button">
                <div className="button">
                  Continuar
                </div>
              </div>
            </div>
            </div>
            <div className="container-footer">
              <div className="alternative-login">
                  <div className="text-login">
                    <hr/>
                    ou entre com
                    <hr/>
                  </div>
                 <div className="login-icons">
                  <img src={fbLogo}/>
                  <img src={ttLogo}/>
                  <img src={igLogo}/>
                 </div>
              </div>
            </div>
        </div>
      </div>
  )
}