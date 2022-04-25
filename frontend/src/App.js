import logo from "./logo.svg";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import "./App.css";
import { Login } from "./pages/auth/Login";
import { Register } from "./pages/auth/Register";
import NavBar from "./components/NavBar";
import { ThemeProvider } from "@mui/styles";
import theme from "./theme";
import ServicesListView from "./pages/services/ServicesListView";
import { ServiceAddView } from "./pages/services/ServiceAddView";
import { ServiceEditView } from "./pages/services/ServiceEditView";
import { ServiceWorkersListView } from "./pages/service_workers/ServiceWorkersListView";
import { ServiceWorkerAddView } from "./pages/service_workers/ServiceWorkerAddView";
import NewFormPage from "./pages/forms/NewFormPage";
import { HomePage } from "./pages/home/HomePage";

function App() {
    return (
        <div className="App">
            <ThemeProvider theme={theme}>
                <NavBar />
                <BrowserRouter>
                    <Routes>
                        <Route exact path="/" element={<HomePage/>}/>
                        <Route exact path={"/login"} element={<Login />} />
                        <Route
                            exact
                            path={"/register"}
                            element={<Register />}
                        />
                        <Route
                            exact
                            path={"/services"}
                            element={<ServicesListView />}
                        />
                        <Route
                            exact
                            path={"/services/add"}
                            element={<ServiceAddView />}
                        />
                        <Route
                            exact
                            path={"/services/edit/:id"}
                            element={<ServiceEditView />}
                        />
                        <Route
                            exact
                            path={"/serviceworkers"}
                            element={<ServiceWorkersListView />}
                        />
                        <Route
                            exact
                            path={"/serviceworkers/add"}
                            element={<ServiceWorkerAddView />}
                        />
                        <Route exact path="/newform" element={<NewFormPage/>}/>
                    </Routes>
                </BrowserRouter>
            </ThemeProvider>
        </div>
    );
}

export default App;
