import styled from "styled-components";
import Slider from "react-slick";
import back from "../../../../../media/back.jpg";

export const HeaderStyle = styled.div`
    height: 80vh;
    min-height: 400px;

    background-position: bottom center;
    background-size: cover;
    overflow: hidden;
    position: relative;
`;

export const Section = styled.div`
    height: 80vh;
    min-height: 400px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: url(${(props) => props.img});
    background-size: cover;
`;

export const NextBtn = styled.button`
    position: absolute;
    right: 10px;
    top: 50%;
    width: 50px;
    height: 50px;
    background-color: rgba(0, 0, 0, 0.5);
    color: orange;
    border: none;
`;

export const PrevBtn = styled.button`
    position: absolute;
    left: 10px;
    top: 50%;
    width: 50px;
    height: 50px;
    background-color: rgba(0, 0, 0, 0.5);
    color: orange;
    border: none;
    z-index: 1;
`;
