import './style.css'
import fbLogo from '../../../assets/img/Facebook.png';
import igLogo from '../../../assets/img/Instagram.png';
import ttLogo from '../../../assets/img/Twitter.png';
import ddLogo from '../../../assets/img/Discord.png';

export default function Footer(){
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
                  <img src={ddLogo}/>
                 </div>
              </div>
        </div>  
    )
}