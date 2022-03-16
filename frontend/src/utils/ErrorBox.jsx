import { Alert, AlertTitle } from "@mui/material";
import React from "react";

export const ErrorBox = ({title, errors = []}) => {
    return (
        <div>
            <Alert variant='outlined' severity="error" style={{textAlign:'left', marginBlock:'20px'}}>
                <AlertTitle>{title}</AlertTitle>
                <ul>
                    {errors.map(error=>{
                        <li>{error}</li>
                    })}
                </ul>
            </Alert>
        </div>
    );
}