import { AxiosInterface } from "./AxiosInterface";
import Cookies from "universal-cookie/es6";

const cookies = new Cookies();

export class Requests {
    constructor(){};
    static async register(email, password) {
        AxiosInterface.post('/register',{
            email: email,
            password: password
        }).then(results=>{
            console.log(results);
            cookies.set("Authorization", results.data.token, {path:'/'});
            return true;
        }).catch(error=>{
            console.log(error.response)
            return false;
        });
    }
    static async login(email, password) {
        AxiosInterface.post('/login',{
            email: email,
            password: password
        }).then(results=>{
            console.log(results);
            cookies.set("Authorization", results.data.token, {path:'/'});
            return true;
        }).catch(error=>{
            console.log(error.response)
            return false;
        });
    }
}