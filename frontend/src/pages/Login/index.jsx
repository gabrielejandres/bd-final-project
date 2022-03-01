import './style.css'
import pfIcon from '../../assets/img/woman.png';
import fbLogo from '../../assets/img/facebook.png';
import igLogo from '../../assets/img/instagram.png';
import ttLogo from '../../assets/img/twitter.png';
import Logo from '../../assets/img/Logo.svg';
import { useForm } from 'react-hook-form';
import { useNavigate } from 'react-router-dom';




export default function Login(){

  const {handleSubmit, register} = useForm();
  const navigate = useNavigate();
  const onSubmit = (data) => {
    console.log(data);
    try {
      data.username != "" ? navigate('/') : console.log('nao')
    } catch (error) {
      
    }
  };

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
              <form onSubmit={handleSubmit(onSubmit)}>
                <div className="username-input">
                      <input placeholder='username' className="input" name='username'{...register('username')}/>
                </div>
                <div className="continue-button">
                  <button className="button" type="submit">
                    Continuar
                  </button>
                </div>
              </form>
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