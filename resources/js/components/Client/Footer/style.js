import styled from "styled-components";
import map from "../../../../media/map.png";

export const FooterStyle = styled.div`
    margin-top: 50px;
    background-color: orange;
    height: 200px;
    display: flex;
    padding: 0 80px;
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
