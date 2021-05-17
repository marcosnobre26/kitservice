import React, { useState } from "react";
import CondominiumService from "../../services/KitnetService";

const Create = () => {
    const initialKitnetState = {
        number: "",
        image: "",
        qtd_bedrooms: "",
        qtd_bathrooms: "",
        value: "",
        condominium_id: "",
    };
    const [kitnet, setKitnet] = useState(initialKitnetState);
    const [submitted, setSubmitted] = useState(false);

    const handleInputChange = (event) => {
        const { name, value } = event.target;
        setCondominium({ ...kitnet, [name]: value });
    };

    const saveCondominium = () => {
        var data = {
            number: kitnet.number,
            qtd_bedrooms: kitnet.qtd_bedrooms,
            qtd_bathrooms: kitnet.qtd_bathrooms,
            value: kitnet.value,
            condominium_id: kitnet.condominium_id,
            image: kitnet.image,
        };

        CondominiumService.create(data)
            .then((response) => {
                setCondominium({
                    number: response.data.number,
                    image: response.data.image,
                    qtd_bedrooms: response.data.qtd_bedrooms,
                    qtd_bathrooms: response.data.qtd_bathrooms,
                    condominium_id: response.data.condominium_id,
                    value: response.data.value,
                });
                setSubmitted(true);
                console.log(response.data);
                history.push("/adm/kitnets");
            })
            .catch((e) => {
                console.log(e);
            });
    };

    const newKitnet = () => {
        setKitnet(initialKitnetState);
        setSubmitted(false);
    };

    return (
        <div className="submit-form">
            {submitted ? (
                <div>
                    <h4>You submitted successfully!</h4>
                    <button className="btn btn-success" onClick={newKitnet}>
                        Add
                    </button>
                </div>
            ) : (
                <div>
                    <div className="form-group">
                        <label htmlFor="name">Numero da Casa</label>
                        <input
                            type="text"
                            className="form-control"
                            id="number"
                            required
                            value={condominium.number}
                            onChange={handleInputChange}
                            name="number"
                        />
                    </div>

                    <div className="form-group">
                        <label htmlFor="name">Valor R$</label>
                        <input
                            type="text"
                            className="form-control"
                            id="value"
                            required
                            value={condominium.value}
                            onChange={handleInputChange}
                            name="value"
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
