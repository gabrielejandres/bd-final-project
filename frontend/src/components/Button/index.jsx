import './style.css'
import { useNavigate } from 'react-router-dom';

export default function Button(props){
    const navigate = useNavigate();


    return(
        <button className="button" type="submit" style={{'width': props.width}} onClick={() => navigate(props.page)}>
            {props.label}
        </button>
    )
  }