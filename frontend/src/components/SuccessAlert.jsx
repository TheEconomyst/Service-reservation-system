import React from "react";
import { AlertTitle } from "@mui/material";
import { Alert } from "@mui/material";

export const SuccessAlert = () => {
    return (
        <div>
            <Alert
                variant="filled"
                severity="success"
                style={{ textAlign: "left", marginBlock: "20px" }}
            >
                <AlertTitle>{"Operacija pavyko!"}</AlertTitle>
            </Alert>
        </div>
    );
};
