import styled from "styled-components";

export const RentStyle = styled.div`
    border-radius: 10px;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: calc(100% / 3 - 20px);
    margin-right: 30px;
    display: inline-block;
    :last-child {
        margin-right: 0;
    }
`;

export const RentInfoContainer = styled.div`
    padding: 20px 15px;
    white-space: normal;
`;
