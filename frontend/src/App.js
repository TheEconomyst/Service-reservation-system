import logo from "./logo.svg";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import "./App.css";
import { Login } from "./pages/auth/Login";
import { Register } from "./pages/auth/Register";

function App() {
    return (
        <div className="App">
            <BrowserRouter>
                <Routes>
                    <Route exact path={"/login"} element={<Login />} />
                    <Route exact path={"/register"} element={<Register/>}/>
                </Routes>
            </BrowserRouter>
        </div>
    );
}

export default App;
