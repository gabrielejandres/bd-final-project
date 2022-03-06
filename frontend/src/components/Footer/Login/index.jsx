import './style.css'
import fbLogo from '../../../assets/img/facebook.png';
import igLogo from '../../../assets/img/instagram.png';
import ttLogo from '../../../assets/img/twitter.png';

export default function Footer(props){
    return (
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
    )
}