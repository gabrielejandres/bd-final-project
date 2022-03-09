import './style.css'
import { useNavigate } from 'react-router-dom';

export default function Button(props){
    const navigate = useNavigate();

    return(
        <button className="button" type="submit" style={{'width': props.width}} 
            onClick={() => {
                    if(props.page === '/' ){
                        navigate(props.page); 
                        localStorage.removeItem('id');
                    } else{
                        navigate(props.page);   
                    }
                }
            }>
            {props.label}
        </button>
    )
  }