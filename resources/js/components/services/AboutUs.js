import axios from "axios";

const get = () => {
    return axios.get("/api/about-us");
};
export default {
    get,
};
