import {BrowserRouter, Route, Routes} from 'react-router-dom';
import Login from './pages/Login/index.jsx'
import Home from './pages/Home/index.jsx'
import Play from './pages/Play/index.jsx';
import Ranking from './pages/Ranking/index.jsx'
import './App.css';

function App() {
  return (
    <div>
      <BrowserRouter>
          <Routes>
            <Route path="/home/play" element={<Play/>}/>
            <Route path="/" element={<Login/>}/>
            <Route path="/home" element={<Home/>}/>
            <Route path="/home/ranking" element={<Ranking/>}/>
          </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
