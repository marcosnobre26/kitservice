import axios from "axios";

const get = () => {
    return axios.get("/api/condominiums");
};

const kitnetList = (id) => {
    return axios.get(`/api/condominium/${id}/kitnets`);
};

const create = (data) => {
    return axios.post("/api/condominium", data);
};

const getid = (id) => {
    return axios.get(`/api/condominium/${id}`);
};

const update = (id, data) => {
    return axios.put(`/api/condominium/${id}`, data);
};

const remove = (id) => {
    return axios.delete(`/api/condominium/${id}`);
};

export default {
    remove,
    create,
    get,
    getid,
    update,
    kitnetList,
};
