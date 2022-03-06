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
            <Button label={'JOGAR'} page={'play'} width={'12.12vw'}/>
            <Button label={'AJUDA'} page={'help'} width={'12.12vw'}/>
            <Button label={'RANKING'} page={'ranking'} width={'12.12vw'}/>
          </div>
        </div>
        <Footer/>
      </div>
    </div>
  )
}