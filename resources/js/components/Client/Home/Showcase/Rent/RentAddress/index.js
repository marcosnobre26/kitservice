import { Info, AddressStyled } from "./style";

const RentAddress = ({ address }) => (
    <>
        <AddressStyled>
            Endereco:{" "}
            <Info>{address ? address.toUpperCase() : "Sem endereco"}</Info>
        </AddressStyled>
    </>
);

export default RentAddress;
