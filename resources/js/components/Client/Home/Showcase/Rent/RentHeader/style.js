import styled from "styled-components";

export const HeaderStyle = styled.div`
    height: 200px;
    background: gray;
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
`;

export const HeaderImg = styled.img`
    width: 100%;
    height: auto;
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
