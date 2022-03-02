import './style.css'
import Logo from '../../components/Logo/index.jsx';
import Button from '../../components/Button/index.jsx';


export default function Home(){

  return(
  <div className="main-page">
    <div className="container">
      <div className="container-content">
        <div className="logo">
              <Logo/>
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