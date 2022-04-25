import React from "react";
import AppBar from "@mui/material/AppBar";
import { Toolbar } from "@mui/material";
import CameraIcon from "@mui/icons-material/Camera";
import { makeStyles } from "@mui/styles";
import Button from "@mui/material/Button";
import LockOpenIcon from "@mui/icons-material/LockOpen";
import HomeIcon from "@mui/icons-material/Home";
import CreateIcon from "@mui/icons-material/Create";

const useStyles = makeStyles({
    title: {
        "font-size": "1.2rem",
        paddingLeft: "4px",
        paddingRight: "24px",
        fontSize: "20px",
        color: "#EDE7E3",
    },
    root: {
        flexGrow: 1,
    },
    icons: {
        color: "#EDE7E3",
        fontSize: "45px",
    },
    toolbar: {
        backgroundColor: "#2978A0",
    },
    btn: {
        backgroundColor: "inherit",
        color: "white",
        fontSize: "18px",
    },
});

function NavBar() {
    const classes = useStyles();

    return (
        <>
            <div className={classes.root}>
                <AppBar position="static">
                    <Toolbar  style={{display:'flex', flexDirection:'row', justifyContent:'space-between'}} className={classes.toolbar}>
                        <div style={{display:'flex', flexDirection:'row', alignItems:'center'}}>
                        <CameraIcon className={classes.icons} />
                        <h1 className={classes.title}>Form Creator </h1>
                        </div>
                        <div>
                        <Button href="/" variant="contained" className={classes.btn}>
                            <HomeIcon /> NAMAI
                        </Button>
                        <Button href="/newform" variant="contained" className={classes.btn}>
                            <CreateIcon /> SUKURTI NAUJĄ FORMĄ
                        </Button>
                        <Button href="/services" variant="contained" className={classes.btn}>
                            <CreateIcon /> VALDYTI PASLAUGAS
                        </Button>
                        <Button href="/serviceworkers" variant="contained" className={classes.btn}>
                            <CreateIcon /> VALDYTI PASLAUGŲ TEIKĖJUS
                        </Button>
                        <Button href="/login" variant="contained" className={classes.btn}>
                            <LockOpenIcon /> PRISIJUNGTI
                        </Button>
                        </div>
                    </Toolbar>
                </AppBar>
                <Toolbar />
            </div>
        </>
    );
}

export default NavBar;
