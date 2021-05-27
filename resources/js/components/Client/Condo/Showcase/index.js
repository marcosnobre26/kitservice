import { useEffect, useState } from "react";
import CondominiumsService from "../../../services/CondominiumsService";
import Rent from "./Rent";
import { ShowcaseStyle } from "./style";

const Showcase = () => {
    const [condominiums, setCondominiums] = useState();
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
    console.log(condominiums);
    return (
        <ShowcaseStyle>
            <Rent />
            <Rent />
            <Rent />
            <Rent />
            <Rent />
            <Rent />
        </ShowcaseStyle>
    );
};

export default Showcase;
