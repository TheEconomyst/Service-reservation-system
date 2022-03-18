import React, { useState } from "react";
import { Button, Paper, TextField, Typography } from "@mui/material";
import LoginIcon from "@mui/icons-material/Login";
import VpnKeyIcon from "@mui/icons-material/VpnKey";
import {Requests} from '../../utils/Requests';
import { ErrorBox } from "../../utils/ErrorBox";
import Cookies from "universal-cookie/es6";

export const Register = () => {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [repeatPwd, setRepeatPwd] = useState("");
    const [errors, setErrors] = useState([]);
    let cookies = new Cookies();

    const handleRegistration = () => {
        if(validate()) {
            Requests.register(email,password);
        }
    }

    const validate = ()=>
    {
        setErrors([]);
        let errstatus = true;
        if(email==="")
        {
            setErrors((old)=>[...old, "Neįvestas el paštas"]);
            errstatus=false;
        }
        if(password==="")
        {
            setErrors(old=>[...old, "Neįvestas slaptažodis"]);
            errstatus=false;
        }
        if(password!==repeatPwd)
        {
            setErrors(old=>[...old, "Slaptažodžiai nesutampa"]);
            errstatus=false;
        }
        console.log(errors);
        return errstatus;
    }
    if(cookies.get("Authorization")!==undefined)
    return(
        <div
            style={{
                height: "100vh",
                width: "100vw",
                display: "flex",
                flexDirection: "column",
                justifyContent: "center",
                alignItems: "center",
                backgroundColor: "#aaaaaa",
            }}
        >
            <Typography>
                JAU ESATE PRISIREGISTRAVĘS
            </Typography>
        </div>
    )
    else return (
        <div
            style={{
                height: "100vh",
                width: "100vw",
                display: "flex",
                flexDirection: "column",
                justifyContent: "center",
                alignItems: "center",
                backgroundColor: "#aaaaaa",
            }}
        >
            {errors===[]?<></>:<ErrorBox title={"Klaida registruojantis"} errors={errors}/>}
            <Paper elevation={2} style={{ padding: "20px", minWidth: "50vw" }}>
                <Typography variant={"h4"}>REGISTRUOTIS</Typography>
                <div style={{ marginTop: "20px", display:'flex', flexDirection:'column' }}>
                    <TextField value={email} onChange={(event)=>setEmail(event.target.value)} style={{marginTop:'20px'}} fullWidth label="El. paštas" />
                    <TextField value={password} onChange={(event)=>setPassword(event.target.value)} style={{marginTop:'20px'}} fullWidth label="Slaptažodis" />
                    <TextField value={repeatPwd} onChange={(event)=>setRepeatPwd(event.target.value)} style={{marginTop:'20px'}} fullWidth label="Pakartoti slaptažodį" />
                </div>
                <div
                    style={{
                        display: "flex",
                        flexDirection: "row",
                        justifyContent: "flex-end",
                        marginTop: "20px",
                    }}
                >
                    <Button startIcon={<LoginIcon />} onClick={handleRegistration} variant={"contained"}>
                        REGISTRUOTIS
                    </Button>
                    <Button
                        startIcon={<VpnKeyIcon />}
                        variant={"outlined"}
                        color={"secondary"}
                        href="/login"
                        style={{ marginLeft: "20px" }}
                    >
                        PRISIJUNGTI
                    </Button>
                </div>
            </Paper>
        </div>
    );
};
