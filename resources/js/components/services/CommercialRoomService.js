import axios from "axios";

const get = () => {
    return axios.get('/api/coomercial-rooms');
};

const create = data => {
    return axios.post("/api/coomercial-room", data);
};

const getid = id => {
    return axios.get(`/api/coomercial-room/${id}`);
};

const update = (id, data) => {
    return axios.put(`/api/coomercial-room/${id}`, data);
};

const remove = id => {
    return axios.delete(`/api/coomercial-room/${id}`);
};

export default {
    remove,
    create,
    get,
    getid,
    update
  };