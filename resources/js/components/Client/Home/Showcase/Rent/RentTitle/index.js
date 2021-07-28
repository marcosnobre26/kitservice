import { Line, TitleStyled } from "./style";

const RentTitle = ({ title, onClick }) => (
    <>
        <TitleStyled onClick={onClick}>
            {title ? title.toUpperCase() : "ALUGUE"}
        </TitleStyled>
        <Line />
    </>
);

export default RentTitle;
