import axios from "axios";

const get = () => {
    return axios.get('/api/kitnets');
};

const create = data => {
    return axios.post("/api/kitnet", data);
};

const getid = id => {
    return axios.get(`/api/kitnet/${id}`);
};

const update = (id, data) => {
    return axios.put(`/api/kitnet/${id}`, data);
};

const remove = id => {
    return axios.delete(`/api/kitnet/${id}`);
};

export default {
    remove,
    create,
    get,
    getid,
    update
  };