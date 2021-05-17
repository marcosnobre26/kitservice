import axios from "axios";
//import React, { Component } from 'react'
import React, { useState, useEffect } from "react";
import CondominiumsService from "../../services/CondominiumsService";

const Show = (props) => {
    const initialCondominiumState = {
        id: null,
        name: "",
        image: "",
        address: "",
    };
    const [currentCondominium, setCurrentCondominium] = useState(
        initialCondominiumState
    );
    const [message, setMessage] = useState("");

    const getCondominium = (id) => {
        CondominiumsService.getid(id)
            .then((response) => {
                setCurrentCondominium(response.data);
                console.log(response.data);
            })
            .catch((e) => {
                console.log(e);
            });
    };

    useEffect(() => {
        getCondominium(props.match.params.id);
    }, [props.match.params.id]);

    const handleInputChange = (event) => {
        const { name, value } = event.target;
        setCurrentCondominium({ ...currentCondominium, [name]: value });
    };

    const updatePublished = (status) => {
        var data = {
            id: currentCondominium.id,
            name: currentCondominium.name,
            image: currentCondominium.image,
            address: currentCondominium.address,
        };

        CondominiumsService.update(currentCondominium.id, data)
            .then((response) => {
                setCurrentCondominium({ ...currentCondominium });
                console.log(response.data);
            })
            .catch((e) => {
                console.log(e);
            });
    };

    const updateCondominium = () => {
        CondominiumsService.update(currentCondominium.id, currentCondominium)
            .then((response) => {
                console.log(response.data);
                setMessage("The Condominium was updated successfully!");
            })
            .catch((e) => {
                console.log(e);
            });
    };

    const deleteCondominium = () => {
        CondominiumsService.remove(currentCondominium.id)
            .then((response) => {
                console.log(response.data);
                props.history.push("/adm/condominiums");
            })
            .catch((e) => {
                console.log(e);
            });
    };

    return (
        <div>
            <div className="col-12">
                <div class="row">
                    <p>Nome do Condominio: </p>
                    <p>{currentCondominium.name}</p>
                </div>
                <div class="row">
                    <p>Foto: </p>
                    <p>{currentCondominium.image}</p>
                </div>
                <div class="row">
                    <p>Endereço: </p>
                    <p>{currentCondominium.address}</p>
                </div>
            </div>
        </div>
    );
};

export default Show;
