import styled from "styled-components";
import back from "../../../../../media/back.jpg";

export const HeaderStyle = styled.div`
    height: 500px;
    background-image: url(${(props) =>
        props.banner ? "/storage/" + props.banner : back});
    background-position: center center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 50px;
`;

export const HeaderTitle = styled.h1`
    font-family: Roboto;
    font-style: normal;
    font-weight: bold;
    font-size: 50px;

    color: #ffffff;
`;
