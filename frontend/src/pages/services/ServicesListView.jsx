import "../../App.css";
import { Dialog, DialogActions, DialogTitle, Grid } from "@mui/material";
import { Container } from "@mui/material";
import React, { useState, useEffect } from "react";
import DeleteIcon from "@mui/icons-material/Delete";
import EditIcon from "@mui/icons-material/Edit";
import { Typography } from "@mui/material";
import { makeStyles } from "@mui/styles";
import { Paper } from "@mui/material";
import { Button } from "@mui/material";
import { TableContainer } from "@mui/material";
import { Table } from "@mui/material";
import { TableHead } from "@mui/material";
import { TableRow } from "@mui/material";
import { TableCell } from "@mui/material";
import { TableBody } from "@mui/material";
import theme from "../../theme";
import { Requests } from "../../utils/Requests";
import { SuccessAlert } from "../../components/SuccessAlert";

const useStyles = makeStyles({
    paper: {
        margin: "20px",
        padding: "20px",
        backgroundColor: theme.palette.secondary.light,
    },
});

function ServicesListView() {
    const classes = useStyles();
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [textDialog, settextDialog] = useState("");
    const [services, setServices] = useState([]);
    const [success, setSuccess] = useState(false);
    const [deletable, setDeletable] = useState(0);
    let requests = new Requests();
    useEffect(async () => {
        requests.getServices().then((res) => setServices(res));
    }, []);
    const handleOpen = () => {
        setSuccess(false);
        setIsModalOpen(true);
    };
    const handleClose = () => {
        setIsModalOpen(false);
    };
    const handleConfirmation = (id) => {
        requests.deleteService(id).then((res) => {
            setSuccess(res);
            let mappedservices = services.filter(
                (service) => service.id !== id
            );
            setServices(mappedservices);
            handleClose();
        });
    };
    return (
        <>
            <Dialog open={isModalOpen} onClose={() => handleClose()}>
                <DialogTitle>{"Ar tikrai norite trinti?"}</DialogTitle>
                <DialogActions>
                    <Button onClick={() => handleClose()}>Ne</Button>
                    <Button
                        variant="contained"
                        autoFocus
                        onClick={() => handleConfirmation(deletable)}
                    >
                        Taip
                    </Button>
                </DialogActions>
            </Dialog>
            <Container>
                {success ? <SuccessAlert /> : <></>}
                <Paper elevation={2} className={classes.paper}>
                    <Typography variant="h5">Paslaugų peržiūra</Typography>
                    <Typography variant="h6">Naudingos nuorodos:</Typography>
                    <Grid container style={{ display: "flex" }}>
                        <Button
                            variant="contained"
                            color="primary"
                            href="/"
                            style={{ marginRight: "15px" }}
                        >
                            ATGAL
                        </Button>
                        <Button
                            variant="contained"
                            color="secondary"
                            href="/services/add"
                        >
                            PRIDĖTI PASLAUGĄ
                        </Button>
                    </Grid>
                </Paper>
                <TableContainer component={Paper}>
                    <Table>
                        <TableHead>
                            <TableRow>
                                <TableCell>Paslaugos pavadinimas</TableCell>
                                <TableCell>Paslaugos aprašymas</TableCell>
                                <TableCell>Ar aktyvi</TableCell>
                                <TableCell>Veiksmai</TableCell>
                            </TableRow>
                        </TableHead>
                        <TableBody>
                            {services.map((row) => (
                                <>
                                    <TableRow>
                                        <TableCell>{row.name}</TableCell>
                                        <TableCell>{row.description}</TableCell>
                                        <TableCell>
                                            {row.is_active === 1
                                                ? "Taip"
                                                : "Ne"}
                                        </TableCell>
                                        <TableCell>
                                            <Button
                                                href={`/services/edit/${row.id}`}
                                                variant="outlined"
                                                color="primary"
                                                style={{ marginRight: "10px" }}
                                            >
                                                <EditIcon />
                                                REDAGUOTI
                                            </Button>
                                            <Button
                                                variant="contained"
                                                color="primary"
                                                onClick={() => {
                                                    setDeletable(row.id);
                                                    handleOpen();
                                                }}
                                            >
                                                <DeleteIcon /> TRINTI
                                            </Button>
                                        </TableCell>
                                    </TableRow>
                                </>
                            ))}
                        </TableBody>
                    </Table>
                </TableContainer>
            </Container>
        </>
    );
}

export default ServicesListView;
