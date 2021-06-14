import React, { useState } from "react";
import { useHistory } from 'react-router-dom';
import KitnetService from "../../services/KitnetService";

const Create = () => {
    const history=useHistory();
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
        setKitnet({ ...kitnet, [name]: value });
    };

    const saveKitnet = () => {
        var data = {
            number: kitnet.number,
            qtd_bedrooms: kitnet.qtd_bedrooms,
            qtd_bathrooms: kitnet.qtd_bathrooms,
            value: kitnet.value,
            condominium_id: kitnet.condominium_id,
            image: kitnet.image,
        };

        KitnetService.create(data)
            .then((response) => {
                setKitnet({
                    number: response.data.number,
                    image: response.data.image,
                    qtd_bedrooms: response.data.qtd_bedrooms,
                    qtd_bathrooms: response.data.qtd_bathrooms,
                    condominium_id: response.data.condominium_id,
                    value: response.data.value,
                });
                history.push("/adm/kitnets");
                setSubmitted(true);
                console.log(response.data);
                
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
                    <h4>Você adicionou uma nova KiNet!</h4>
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
                            value={kitnet.number}
                            onChange={handleInputChange}
                            name="number"
                        />
                    </div>

                    <div className="form-group">
                        <label htmlFor="name">Numero de Quartos</label>
                        <input
                            type="text"
                            className="form-control"
                            id="qtd_bedrooms"
                            required
                            value={kitnet.qtd_bedrooms}
                            onChange={handleInputChange}
                            name="qtd_bedrooms"
                        />
                    </div>

                    <div className="form-group">
                        <label htmlFor="name">Numero de Banheiros</label>
                        <input
                            type="text"
                            className="form-control"
                            id="qtd_bathrooms"
                            required
                            value={kitnet.qtd_bathrooms}
                            onChange={handleInputChange}
                            name="qtd_bathrooms"
                        />
                    </div>

                    <div className="form-group">
                        <label htmlFor="name">Valor R$</label>
                        <input
                            type="text"
                            className="form-control"
                            id="value"
                            required
                            value={kitnet.value}
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
                            value={kitnet.address}
                            onChange={handleInputChange}
                            name="address"
                        />
                    </div>

                    <div className="form-group">
                        <label htmlFor="address">Condominio</label>
                        <input
                            type="text"
                            className="form-control"
                            id="condominium_id"
                            required
                            value={kitnet.condominium_id}
                            onChange={handleInputChange}
                            name="condominium_id"
                        />
                    </div>

                    <div className="form-group">
                        <label htmlFor="image">Imagem</label>
                        <input
                            type="text"
                            className="form-control"
                            id="image"
                            required
                            value={kitnet.image}
                            onChange={handleInputChange}
                            name="image"
                        />
                    </div>

                    <button
                        onClick={saveKitnet}
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
