import { useEffect, useState } from "react";
import CondominiumsService from "../../../services/CondominiumsService";
import Rent from "./Rent";
import { ShowcaseStyle } from "./style";

const Showcase = ({ data }) => {
    return (
        <ShowcaseStyle>
            {data &&
                data.map((item) => {
                    <Rent price={item.value} />;
                })}
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
