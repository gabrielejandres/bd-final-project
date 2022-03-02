import './style.css'
import Logo from '../../assets/img/Logo.svg';
import Button from '../../components/Button/index.jsx';


export default function Home(){

  return(
  <div className="main-page">
    <div className="container">
      <div className="container-content">
        <div className="logo">
              <img src={Logo} />
        </div>
        <div className="buttons-area">
          <Button label={'Jogar'} page={'jogar'} width={'175px'}/>
          <Button label={'Ajuda'} page={'ajuda'} width={'175px'}/>
          <Button label={'Ranking'} page={'ranking'} width={'175px'}/>
        </div>
      </div>
    </div>
  </div>
  )
}