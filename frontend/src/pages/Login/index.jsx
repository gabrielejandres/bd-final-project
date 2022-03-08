import './style.css';
import pfIcon from '../../assets/img/icon.png';
import { useForm } from 'react-hook-form';
import { useNavigate } from 'react-router-dom';
import Button from '../../components/Button/index.jsx';
import Logo from '../../components/Logo/index.jsx';
import Footer from '../../components/Footer/Login/index.jsx';

export default function Login(){

  const {handleSubmit, register} = useForm();
  const navigate = useNavigate();

  const onSubmit = (data) => {
    console.log(data);
    try {
      data.username != "" ? navigate('/home') : console.log('nao')
    } catch (error) {
      console.error(error)
    }
  };

  return(
    <div className="main-page">
        <div className="container-login">
            <div className="logo">
              <Logo/>
            </div>
            <div className="access-area">
              <div className="profile">
                  <img src={pfIcon} />
              </div>
            <div className="user-interaction">
              <form onSubmit={handleSubmit(onSubmit)}>
                <div className="username-input">
                      <input placeholder='Username' className="input" name='username'{...register('username')}/>
                </div>
                <div className="continue-button">
                  <Button 
                    label={'Continuar'}
                    width={'165px'}
                  />
                </div>
              </form>
            </div>
            </div>
            <Footer/>
        </div>
      </div>
  )
}