import { Title, Value } from "./style";

const Price = ({ price }) => (
    <Title>
        Valor: <Value>R${price}</Value>
    </Title>
);

export default Price;
