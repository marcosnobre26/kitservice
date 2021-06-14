import React, { useState } from "react";
import { useHistory } from 'react-router-dom';
import CondominiumService from "../../services/CondominiumsService";

const Create = () => {
    const history=useHistory();
    const initialCondominiumState = {
        name: "",
        image: "",
        address: "",
    };
    const [condominium, setCondominium] = useState(initialCondominiumState);
    const [submitted, setSubmitted] = useState(false);

    const handleInputChange = (event) => {
        const { name, value } = event.target;
        setCondominium({ ...condominium, [name]: value });
    };

    const saveCondominium = () => {
        var data = {
            name: condominium.name,
            address: condominium.address,
            image: condominium.image,
        };

        CondominiumService.create(data)
            .then((response) => {
                setCondominium({
                    name: response.data.name,
                    image: response.data.image,
                    address: response.data.address,
                });
                history.push("/adm/condominiums");
                setSubmitted(true);
                console.log(response.data);
                
            })
            .catch((e) => {
                console.log(e);
            });
    };

    const newCondominium = () => {
        setCondominium(initialCondominiumState);
        setSubmitted(false);
    };

    return (
        <div className="submit-form">
            {submitted ? (
                <div>
                    <h4>You submitted successfully!</h4>
                    <button
                        className="btn btn-success"
                        onClick={newCondominium}
                    >
                        Add
                    </button>
                </div>
            ) : (
                <div>
                    <div className="form-group">
                        <label htmlFor="name">Nome</label>
                        <input
                            type="text"
                            className="form-control"
                            id="name"
                            required
                            value={condominium.name}
                            onChange={handleInputChange}
                            name="name"
                        />
                    </div>

                    <div className="form-group">
                        <label htmlFor="address">Endereço</label>
                        <input
                            type="text"
                            className="form-control"
                            id="address"
                            required
                            value={condominium.address}
                            onChange={handleInputChange}
                            name="address"
                        />
                    </div>

                    <div className="form-group">
                        <label htmlFor="image">Imagem</label>
                        <input
                            type="text"
                            className="form-control"
                            id="image"
                            required
                            value={condominium.image}
                            onChange={handleInputChange}
                            name="image"
                        />
                    </div>

                    <button
                        onClick={saveCondominium}
                        className="btn btn-success"
                    >
                        Submit
                    </button>
                </div>
            )}
        </div>
    );
};

export default Create;
