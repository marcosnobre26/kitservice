import React, { useState, useContext, useEffect } from "react";
import { useHistory, Link, useParams, useRouteMatch } from "react-router-dom";
import CondominiumsService from "../services/CondominiumsService";
import Sidebar from "./sidebar";

const Home = (route) => {
    let history = useHistory();
    let { path, url } = useRouteMatch();
    const [condominiums, setCondominiums] = useState([
        {
            id: null,
            name: "",
            image: "",
            address: "",
        },
    ]);

    useEffect(() => {
        retrieveCondominiums();
    }, []);

    const retrieveCondominiums = () => {
        CondominiumsService.get()
            .then((response) => {
                setCondominiums(response.data);
            })
            .catch((e) => {
                console.log(e);
            });
    };

    const viewCondominium = (id) => {
        history.push("/adm/condominium/" + id);
    };

    const editCondominium = (id) => {
        history.push("/adm/edit-condominium/" + id);
    };

    const deleteCondominium = (id) => {
        CondominiumsService.remove(id)
            .then((response) => {
                window.location.reload();
            })
            .catch((e) => {
                console.log(e);
            });
    };

    return <div>teste</div>;
};

export default Home;
