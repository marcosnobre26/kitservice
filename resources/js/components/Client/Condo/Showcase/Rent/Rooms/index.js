import { Title, Number } from "./style";

const Rooms = ({ rooms }) => (
    <Title>
        Quartos: <Number>{rooms}</Number>
    </Title>
);

export default Rooms;
