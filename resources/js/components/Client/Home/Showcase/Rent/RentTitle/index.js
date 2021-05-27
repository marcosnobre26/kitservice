import { Line, TitleStyled } from "./style";

const RentTitle = ({ title }) => (
    <>
        <TitleStyled>{title ? title.toUpperCase() : "ALUGUE"}</TitleStyled>
        <Line />
    </>
);

export default RentTitle;
