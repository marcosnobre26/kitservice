import {
    Address,
    Container,
    Title,
    DescriptionText,
    AddressInfo,
} from "./style";

const Description = ({ title, address }) => (
    <Container>
        <Title>{title.toUpperCase()}</Title>
        <Address>
            Address: <AddressInfo>{address}</AddressInfo>
        </Address>
        <DescriptionText>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
            semper nisl non velit condimentum, quis mollis quam gravida. Aliquam
            pretium, leo sit amet iaculis euismod
        </DescriptionText>
    </Container>
);

export default Description;
