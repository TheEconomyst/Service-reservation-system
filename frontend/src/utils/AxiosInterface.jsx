import axios from "axios";
import Cookies from "universal-cookie/es6";

const cookies = new Cookies();

export const AxiosInterface = axios.create({
  baseURL: "http://127.0.0.1:8000/api",
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
    Authorization:
      cookies.get("Authorization") !== undefined
        ? "Bearer " + cookies.get("Authorization")
        : "",
  },
});