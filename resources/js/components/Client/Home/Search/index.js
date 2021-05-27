import { useEffect, useState } from "react";
import SearchBtn from "./SearchBtn";
import Select from "./Select";
import { Categories, SearchStyle } from "./style";
import Title from "./Title";
import CondominiumsService from "../../../services/CondominiumsService";

const options = [
    { name: "Condominios", id: 1 },
    { name: "Salas comerciais", id: 2 },
];
const Search = () => {
    const [category, setCategory] = useState();
    const [places, setPlaces] = useState();
    const [condo, setCondo] = useState();

    const getCondos = (value) => {
        setPlaces(null);
        if (value === "1") {
            CondominiumsService.get().then((data) => setPlaces(data.data));
        }
        setCategory(value);
    };
    return (
        <SearchStyle>
            <Title />
            <Categories>
                <Select options={options} onSelect={getCondos} />
                <Select options={places} onSelect={setCondo} />
            </Categories>
            <SearchBtn />
        </SearchStyle>
    );
};

export default Search;
