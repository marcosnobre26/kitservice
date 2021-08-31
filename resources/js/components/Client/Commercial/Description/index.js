import {
    Address,
    Container,
    Title,
    DescriptionText,
    AddressInfo,
    Tax,
    Available,
} from "./style";

const Description = ({ title, address, description }) => (
    <Container>
        <Title>{title.toUpperCase()}</Title>
        <Address>
            Endereço: <AddressInfo>{address}</AddressInfo>
        </Address>
        <DescriptionText>{description}</DescriptionText>
    </Container>
);

export default Description;
