import styled from "styled-components";

export const SearchStyle = styled.div`
    width: calc(100% - 140px);
    height: 250px;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    position: absolute;
    border-radius: 10px;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    padding: 15px 26px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
`;

export const Categories = styled.div`
    display: flex;
    gap: 30px;
    width: 100%;
`;
