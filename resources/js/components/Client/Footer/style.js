import styled from "styled-components";
import map from "../../../../media/map.png";

export const FooterStyle = styled.div`
    margin-top: 50px;
    background-color: orange;
    display: flex;
    padding: 0 80px;
    justify-content: center;
`;

export const FooterMap = styled.div`
    background-image: url(${map});
    background-size: cover;
    flex: 1;
`;
export const FooterInfo = styled.div`
    height: 100%;
    flex: 1;
`;

export const Text = styled.p`
    font-weight: 600;
    margin: 0;
    text-align: center;
`;
