import { AxiosInterface } from "./AxiosInterface";
import Cookies from "universal-cookie/es6";
import { Axios } from "axios";
import { identity } from "lodash";

const cookies = new Cookies();

export class Requests {
    constructor() {}
    static async register(email, password) {
        AxiosInterface.post("/register", {
            email: email,
            password: password,
        })
            .then((results) => {
                console.log(results);
                cookies.set("Authorization", results.data.token, { path: "/" });
                return true;
            })
            .catch((error) => {
                console.log(error.response);
                return false;
            });
    }
    static async login(email, password) {
        AxiosInterface.post("/login", {
            email: email,
            password: password,
        })
            .then((results) => {
                console.log(results);
                cookies.set("Authorization", results.data.token, { path: "/" });
                return true;
            })
            .catch((error) => {
                console.log(error.response);
                return false;
            });
    }
    async getServices() {
        let res = await AxiosInterface.get("/services");
        return res.data;
    }
    async getService(id) {
        let res = await AxiosInterface.get(`/services/${id}`);
        console.log(res);
        return res.data;
    }
    async getCompanies() {
        let res = await AxiosInterface.get("/companies");
        return res.data;
    }
    async updateService(name, desc, company_id, active, id) {
        let res = await AxiosInterface.put("/services", {
            id: id,
            name: name,
            company_id: company_id,
            description: desc,
            is_active: active ? 1 : 0,
        });
        if (res.data.status === "ok") {
            return true;
        }
        return false;
    }
    async postService(name, desc, company_id, active) {
        let res = await AxiosInterface.post("/services", {
            name: name,
            company_id: company_id,
            description: desc,
            is_active: active ? 1 : 0,
        });
        if (res.data.status === "ok") {
            return true;
        }
        return false;
    }
    async deleteService(id) {
        let res = await AxiosInterface.delete(`/services/${id}`);
        return true;
    }
    async getServiceWorkers() {
        let res = await AxiosInterface.get("/service_providers");
        return res.data;
    }
    async getServiceWorker(id) {
        let res = await AxiosInterface.get(`/service_providers/${id}`);
        return res.data;
    }
    async getUsers() {
        let res = await AxiosInterface.get("/users");
        return res.data;
    }
    async postServiceWorker(desc, user_id, is_company_admin) {
        let res = await AxiosInterface.post("/service_providers", {
            user_id: user_id,
            description: desc,
            is_company_admin: is_company_admin ? 1 : 0,
        });
        console.log(res);
        if (res.data !== "") {
            return true;
        }
        return false;
    }
    async deleteServiceWorker(id) {
        let res = await AxiosInterface.delete(`/service_providers/${id}`);
        return true;
    }
}
