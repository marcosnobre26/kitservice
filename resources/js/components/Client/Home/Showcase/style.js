import styled from "styled-components";

export const ShowcaseStyle = styled.div`
    padding: 0 80px;
    :first-child {
        margin-top: 145px;
    }
`;

export const ShowcaseCategory = styled.div`
    margin-bottom: 30px;
    overflow-x: scroll;
    overflow-x: scroll;
    white-space: nowrap;
    -ms-overflow-style: none;
    scrollbar-width: none;
    ::-webkit-scrollbar {
        display: none;
    }
    scroll-behavior: smooth;
    /* cursor: grab; */
`;

export const Section = styled.div`
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    justify-content: center;
    align-items: center;
`;

export const Prev = styled.p`
    position: absolute;
    font-size: 40px;
    top: 40%;
    left: 30px;
    font-weight: bold;
    color: #f2c94c;
    cursor: pointer;
`;
export const Next = styled.p`
    position: absolute;
    font-size: 40px;
    top: 40%;
    right: 40px;
    font-weight: bold;
    color: #f2c94c;
    cursor: pointer;
`;
