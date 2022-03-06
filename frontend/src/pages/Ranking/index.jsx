import './style.css'
import Footer from '../../components/Footer/Home/index.jsx';

export default function Ranking(){
  return(
    <div className="main-page">
      <div className="container">
        <div className="ranking">
            <ul>
                <li><span>1.</span> Fulano </li>
                <li><span>2.</span> Ciclano </li>
            </ul>
        </div>
        <Footer/>
      </div>
    </div>
  )
}