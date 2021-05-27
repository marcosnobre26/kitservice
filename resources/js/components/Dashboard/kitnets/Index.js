import React, { useState, useContext, useEffect } from "react";
import { createBrowserHistory } from "history";
import { useHistory, Link, useParams } from "react-router-dom";
import KitnetService from "../../services/KitnetService";

const Index = ({id}) => {
    let history = useHistory();
    const [kitnets, setKitnets] = useState([
        {
            id: null,
            number: "",
            image: "",
            qtd_bedrooms: "",
            qtd_bathrooms: "",
            value: "",
            condominium_id: "",
        },
    ]);

    useEffect(() => {
        retrieveKitnets();
    }, []);

    const retrieveKitnets = () => {
        KitnetService.get()
            .then((response) => {
                console.log(response.data);
                setKitnets(response.data);
                console.log(response.data);
            })
            .catch((e) => {
                console.log(e);
            });
    };

    const viewKitnet = (id) => {
        history.push("/kitnet/" + id);
    };

    const editKitnet = (id) => {
        history.push("/edit-kitnet/" + id);
    };

    const deleteKitnet = (id) => {
        KitnetService.remove(id)
            .then((response) => {
                console.log(response.data);
                window.location.reload();
            })
            .catch((e) => {
                console.log(e);
            });
    };

    return (
        <div className="list row">
            <div className="card-body">
                <div className="col-12">
                    <Link
                        className="btn btn-primary btn-sm mb-3"
                        to="/adm/create-kitnet"
                    >
                        Cadastrar Nova Kitnet
                    </Link>

                    <table className="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Numero</th>
                                <th scope="col">Qtd de Quartos</th>
                                <th scope="col">Qtd de Banheiros</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            {kitnets.map((kitnet) => (
                                <tr key={kitnet.id}>
                                    <th scope="row">1</th>
                                    <td>{kitnet.number}</td>
                                    <td>{kitnet.qtd_bedrooms}</td>
                                    <td>{kitnet.qtd_bathrooms}</td>
                                    <td>{kitnet.value}</td>
                                    <td>
                                        <button
                                            className="badge badge-primary mr-2"
                                            onClick={() =>
                                                viewKitnet(kitnet.id)
                                            }
                                        >
                                            Visualizar
                                        </button>
                                    </td>
                                    <td>
                                        <button
                                            className="badge badge-success"
                                            onClick={() =>
                                                editKitnet(kitnet.id)
                                            }
                                        >
                                            Editar
                                        </button>
                                    </td>
                                    <td>
                                        <button
                                            className="badge badge-danger mr-2"
                                            onClick={() =>
                                                deleteKitnet(kitnet.id)
                                            }
                                        >
                                            Deletar
                                        </button>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    );
};

export default Index;
