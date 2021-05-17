import React, { useState, useContext, useEffect } from "react";
import { useHistory, Link, useParams, useRouteMatch } from "react-router-dom";
import CondominiumsService from "../../services/CondominiumsService";

const Index = (route) => {
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
                console.log(response.data);
                setCondominiums(response.data);
                console.log(response.data);
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
                        to="/adm/create-condominium"
                    >
                        Cadastrar Novo Condominio
                    </Link>

                    <table className="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Endereço</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            {condominiums.map((condominium) => (
                                <tr key={condominium.id}>
                                    <th scope="row">1</th>
                                    <td>{condominium.name}</td>
                                    <td>{condominium.address}</td>
                                    <td>
                                        <button
                                            className="badge badge-primary mr-2"
                                            onClick={() =>
                                                viewCondominium(condominium.id)
                                            }
                                        >
                                            Visualizar
                                        </button>
                                    </td>
                                    <td>
                                        <button
                                            className="badge badge-success"
                                            onClick={() =>
                                                editCondominium(condominium.id)
                                            }
                                        >
                                            Editar
                                        </button>
                                    </td>
                                    <td>
                                        <button
                                            className="badge badge-danger mr-2"
                                            onClick={() =>
                                                deleteCondominium(
                                                    condominium.id
                                                )
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
