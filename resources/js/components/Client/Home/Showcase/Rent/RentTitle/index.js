import { Line, TitleStyled } from "./style";

const RentTitle = ({ title, onClick }) => (
    <>
        <TitleStyled onClick={onClick}>{title.toUpperCase()}</TitleStyled>
        <Line />
    </>
);

export default RentTitle;
