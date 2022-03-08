import './style.css'
import Logo from '../../components/Logo/index.jsx';
import Button from '../../components/Button/index.jsx';
import Footer from '../../components/Footer/Home/index.jsx';

export default function Home(){
  return(
    <div className="main-page">
      <div className="container">
        <div className="container-content">
          <div className="logo">
              <Logo/>
          </div>
          <div className="buttons-area">
            <Button label={'Jogar'} page={'play'} width={'14vw'}/>
            <Button label={'Ver ranking'} page={'ranking'} width={'14vw'}/>
            <Button label={'Ajuda'} page={'help'} width={'14vw'}/>
          </div>
        </div>
        <Footer/>
      </div>
    </div>
  )
}