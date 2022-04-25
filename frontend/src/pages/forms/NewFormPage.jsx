import "../../App.css";
import { Grid } from "@mui/material";
import { Select } from "@mui/material";
import { Container } from "@mui/material";
import { Button } from "@mui/material";
import React, { useState, useEffect } from "react";
import MenuItem from "@mui/material/MenuItem";
import AddCircleOutlineIcon from "@mui/icons-material/AddCircleOutline";
import InputLabel from "@mui/material/InputLabel";
import { TextField } from "@mui/material";
import FormItem from "../../components/FormItem";
import SendIcon from "@mui/icons-material/Send";
import SaveAltIcon from "@mui/icons-material/SaveAlt";
import { Typography } from "@mui/material";
import { makeStyles } from "@mui/styles";
import { Paper } from "@mui/material";
import theme from "../../theme";
import {ErrorBox} from "../../utils/ErrorBox";

const useStyles = makeStyles({
  toolbar: {
    toolbar: theme.mixins.toolbar,
  },
});

function NewFormPage() {
  const classes = useStyles();
  const [formElement, setformElement] = useState(1);
  const [latestIdUsed, setLatestIdUsed] = useState(0);
  const [inputList, setinputList] = useState([]);
  const onAddButtonClick = (event) => {
    setinputList([...inputList, { value: latestIdUsed }]);
    setLatestIdUsed(latestIdUsed + 1);
  };
  const handleChange = (event) => {
    setformElement(event.target.value);
  };
  const onRemoveButtonClick = (val) => {
    console.log(val);
    setinputList(inputList.filter((e) => e.value !== val));
  };
  return (
    <>
      <div className={classes.toolbar} />
      <div style={{ minHeight: "100vh" }}>
        <Container style={{ paddingLeft: "100px" }}>
            <ErrorBox title={"Klaida"} errors={["Testinis klaidos papunktis", "Testinis klaidos papunktis 2"]} />
          <Grid container>
            <Grid item xs={12} style={{ display: "flex" }}>
              <Typography variant="h4" align="left" gutterBottom>
                Sukurti naują formą
              </Typography>
            </Grid>
            <Paper
              elevation={2}
              style={{ width: "100%", padding: "10px", marginBottom: "20px" }}
            >
              <Grid item xs={12} style={{ display: "flex" }}>
                <TextField
                  style={{ width: "30vw" }}
                  label="Formos pavadinimas"
                ></TextField>
              </Grid>
              <Grid item xs={12} style={{ display: "flex", marginTop: "20px" }}>
                <TextField
                  style={{ width: "100%" }}
                  variant="outlined"
                  label="Formos aprašymas"
                  multiline
                  rows={5}
                ></TextField>
              </Grid>
            </Paper>
          </Grid>
          <Grid
            container
            spacing={3}
            style={{ marginTop: "0px", marginBottom: "20px" }}
          >
            {inputList.map((value) => (
              <FormItem
                deleteWhich={value.value}
                onDelete={onRemoveButtonClick}
              />
            ))}
            {console.log(inputList)}
          </Grid>
          <Button
            variant="contained"
            color="secondary"
            onClick={onAddButtonClick}
          >
            <AddCircleOutlineIcon style={{ marginRight: "5px" }} /> Pridėti
            naują elementą
          </Button>
          <Grid
            container
            display="flex"
            justify="flex-end"
            style={{ marginTop: "20px" }}
          >
            <Button variant="contained" style={{ marginRight: "10px" }}>
              <SaveAltIcon /> Išsaugoti
            </Button>
            <Button variant="contained" color="primary">
              <SendIcon /> Siųsti
            </Button>
          </Grid>
        </Container>
      </div>
    </>
  );
}

export default NewFormPage;
