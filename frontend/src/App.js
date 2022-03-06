import './App.css';
import Login from './pages/Login/index.jsx'
import Home from './pages/Home/index.jsx'
import {BrowserRouter, Route, Routes} from 'react-router-dom';


function App() {
  return (
    <div>
      <BrowserRouter>
          <Routes>
            <Route path="/" element={<Login/>}/>
            <Route path="/home" element={<Home/>}/>
          </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
