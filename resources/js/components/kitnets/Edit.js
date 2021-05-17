import axios from 'axios'
//import React, { Component } from 'react'
import React, { useState, useEffect } from "react";
import { useParams } from 'react-router';
import CondominiumsService from "../services/CondominiumsService";

const Edit = (props) => {

  let {id}=useParams();
  console.log(id);
  const initialCondominiumState = {
    id: null,
    name: "",
    image: "",
    address: "",
  };
  const [currentCondominium, setCurrentCondominium] = useState(initialCondominiumState);
  const [message, setMessage] = useState("");

  const getCondominium = id => {
    
    CondominiumsService.getid(id)
      .then(response => {
        setCurrentCondominium(response.data);
        console.log(response.data);
      })
      .catch(e => {
        console.log(e);
      });
  };

  useEffect(() => {
    getCondominium(props.match.params.id);
  }, [props.match.params.id]);

  const handleInputChange = event => {
    const { name, value } = event.target;
    setCurrentCondominium({ ...currentCondominium, [name]: value });
  };

  const updatePublished = status => {
    var data = {
      id: currentCondominium.id,
      name: currentCondominium.name,
      image: currentCondominium.image,
      address: currentCondominium.address
    };

    CondominiumsService.update(currentCondominium.id, data)
      .then(response => {
        setCurrentCondominium({ ...currentCondominium });
        console.log(response.data);
        history.push("/condominiums");
      })
      .catch(e => {
        console.log(e);
      });
  };

  const updateCondominium = () => {
    CondominiumsService.update(currentCondominium.id, currentCondominium)
      .then(response => {
        console.log(response.data);
        props.history.push("/condominiums");
        setMessage("The Condominium was updated successfully!");
      })
      .catch(e => {
        console.log(e);
      });
  };

  const deleteCondominium = () => {
    CondominiumsService.remove(currentCondominium.id)
      .then(response => {
        console.log(response.data);
        props.history.push("/condominiums");
      })
      .catch(e => {
        console.log(e);
      });
  };

  return (
    <div>
      {currentCondominium ? (
        <div className="edit-form">
          <h4>Condominio</h4>
          <form>
            <div className="form-group">
              <label htmlFor="name">Nome</label>
              <input
                type="text"
                className="form-control"
                id="name"
                name="name"
                value={currentCondominium.name}
                onChange={handleInputChange}
              />
            </div>
            <div className="form-group">
              <label htmlFor="image">Image</label>
              <input
                type="text"
                className="form-control"
                id="image"
                name="image"
                value={currentCondominium.image}
                onChange={handleInputChange}
              />
            </div>

            <div className="form-group">
              <label htmlFor="address">Endereço</label>
              <input
                type="text"
                className="form-control"
                id="address"
                name="address"
                value={currentCondominium.address}
                onChange={handleInputChange}
              />
            </div>
          </form>

          {currentCondominium.published ? (
            <button
              className="badge badge-primary mr-2"
              onClick={() => updatePublished(false)}
            >
              UnPublish
            </button>
          ) : (
            <button
              className="badge badge-primary mr-2"
              onClick={() => updatePublished(true)}
            >
              Publish
            </button>
          )}

          <button className="badge badge-danger mr-2" onClick={deleteCondominium}>
            Delete
          </button>

          <button
            type="submit"
            className="badge badge-success"
            onClick={updateCondominium}
          >
            Update
          </button>
          <p>{message}</p>
        </div>
      ) : (
        <div>
          <br />
          <p>Please click on a Condominium...</p>
        </div>
      )}
    </div>
  );
};

export default Edit;