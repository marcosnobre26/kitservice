import styled from "styled-components";
import { Link } from "react-router-dom";

export const MenuStyle = styled.div`
    display: flex;
    gap: 20px;
`;

export const MenuLink = styled(Link)`
    text-decoration: none;
    font-weight: bold;
    font-size: 15px;
    color: white;
    :hover {
        color: white;
        text-decoration: none;
        opacity: 0.5;
    }
`;
