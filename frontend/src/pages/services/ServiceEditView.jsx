import React, { useState, useEffect } from "react";
import {
    Checkbox,
    Container,
    FormControl,
    FormControlLabel,
    FormGroup,
    InputLabel,
    MenuItem,
    Select,
    TextField,
} from "@mui/material";
import { Paper } from "@mui/material";
import { Typography } from "@mui/material";
import { Grid } from "@mui/material";
import { Button } from "@mui/material";
import { makeStyles } from "@mui/styles";
import theme from "../../theme";
import { Requests } from "../../utils/Requests";
import { ErrorBox } from "../../utils/ErrorBox";
import { SuccessAlert } from "../../components/SuccessAlert";
import { useParams } from "react-router-dom";

const useStyles = makeStyles({
    paper: {
        margin: "20px",
        padding: "20px",
        backgroundColor: theme.palette.secondary.light,
    },
    form: {
        margin: "20px",
        padding: "20px",
        width: "50%",
        height: "50%",
    },
    cont: {
        marginBottom: "15px",
        display: "flex",
        alignItems: "center",
        justifyContent: "center",
    },
});

export const ServiceEditView = () => {
    let { id } = useParams();

    const [companies, setCompanies] = useState([]);
    const [company, setCompany] = useState(0);
    const [name, setName] = useState("");
    const [desc, setDesc] = useState("");
    const [active, setActive] = useState(false);
    const [errs, setErrs] = useState([]);
    const [success, setSuccess] = useState(false);
    const requests = new Requests();
    useEffect(async () => {
        let comp = await requests.getCompanies();
        console.log(comp);
        setCompanies(comp);
        let res = await requests.getService(id);
            console.log(res);
            setName(res.service.name);
            setDesc(res.service.description);
            setActive(res.service.is_active == 1 ? true : false);
            setCompany(res.service.company_id);
    }, []);

    const handleSave = () => {
        setSuccess(false);
        setErrs([]);
        if (validate()) {
            let res = requests
                .updateService(name, desc, company, active, id)
                .then((res) =>
                    res
                        ? setSuccess(true)
                        : setErrs(["Nepavyko įrašyti duomenų į duomenų bazę"])
                )
                .catch((err) => setErrs(["Vidinė serverio klaida"]));
        }
    };

    const validate = () => {
        let valid = true;
        if (company === 0) {
            setErrs((errors) => [...errors, "Nepasirinkta įmonė"]);
            valid = false;
        }
        if (name === "") {
            setErrs((errors) => [...errors, "Neįvestas paslaugos pavadinimas"]);
            valid = false;
        }
        if (desc === "") {
            setErrs((errors) => [...errors, "Neįvestas paslaugos aprašymas"]);
            valid = false;
        }
        return valid;
    };

    const classes = useStyles();
    return (
        <Container>
            {success ? <SuccessAlert /> : <></>}
            {errs.length === 0 ? (
                <></>
            ) : (
                <ErrorBox title={"Klaida"} errors={errs} />
            )}
            <Paper elevation={2} className={classes.paper}>
                <Typography variant="h5">Paslaugos redagavimas</Typography>
                <Typography variant="h6">Naudingos nuorodos:</Typography>
                <Grid container style={{ display: "flex" }}>
                    <Button
                        variant="contained"
                        color="primary"
                        href="/services"
                        style={{ marginRight: "15px" }}
                    >
                        ATGAL
                    </Button>
                </Grid>
            </Paper>
            <Paper elevation={1} className={classes.paper}>
                <Grid container spacing={3}>
                    <Grid item xs={12}>
                        <TextField
                            label="Paslaugos pavadinimas"
                            fullWidth
                            value={name}
                            onChange={(e) => setName(e.target.value)}
                        />
                    </Grid>
                    <Grid item xs={12}>
                        <TextField
                            label="Paslaugos aprašymas"
                            fullWidth
                            multiline
                            rows={3}
                            value={desc}
                            onChange={(e) => setDesc(e.target.value)}
                        />
                    </Grid>
                    <Grid item xs={12}>
                        <FormControl fullWidth>
                            <InputLabel id="company-select">Įmonė</InputLabel>
                            <Select
                                labelId="company-select"
                                value={company}
                                onChange={(e) => setCompany(e.target.value)}
                            >
                                {companies.map((entry) => (
                                    <MenuItem value={entry.id}>
                                        {entry.name}
                                    </MenuItem>
                                ))}
                            </Select>
                        </FormControl>
                    </Grid>
                    <Grid item xs={12}>
                        <FormGroup>
                            <FormControlLabel
                                control={
                                    <Checkbox
                                        checked={active}
                                        onChange={() => setActive(!active)}
                                    />
                                }
                                label={"Ar aktyvi"}
                            />
                        </FormGroup>
                    </Grid>
                </Grid>
                <div
                    style={{
                        paddingBlock: "20px",
                        display: "flex",
                        justifyContent: "flex-end",
                    }}
                >
                    <Button variant={"contained"} onClick={handleSave}>
                        Išsaugoti
                    </Button>
                </div>
            </Paper>
        </Container>
    );
};
