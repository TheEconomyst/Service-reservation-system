import React from "react";
import { Button, Paper, TextField, Typography } from "@mui/material";
import LoginIcon from "@mui/icons-material/Login";
import VpnKeyIcon from "@mui/icons-material/VpnKey";

export const Login = () => {
    return (
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
            <Paper elevation={2} style={{ padding: "20px", minWidth: "50vw" }}>
                <Typography variant={"h4"}>PRISIJUNGTI</Typography>
                <div style={{ marginTop: "20px" }}>
                    <TextField fullWidth label="El. paštas" />
                    <TextField fullWidth label="Slaptažodis" />
                </div>
                <div
                    style={{
                        display: "flex",
                        flexDirection: "row",
                        justifyContent: "flex-end",
                        marginTop: "20px",
                    }}
                >
                    <Button startIcon={<LoginIcon />} variant={"contained"}>
                        PRISIJUNGTI
                    </Button>
                    <Button
                        startIcon={<VpnKeyIcon />}
                        variant={"outlined"}
                        color={"secondary"}
                        style={{ marginLeft: "20px" }}
                    >
                        UŽSIREGISTRUOTI
                    </Button>
                </div>
            </Paper>
        </div>
    );
};
