import Bathrooms from "./Bathrooms";
import Price from "./Price";
import RentHeader from "./RentHeader";
import RentInfo from "./RentInfo";
import RentTitle from "./RentTitle";
import Rooms from "./Rooms";
import { RentInfoContainer, RentStyle } from "./style";

const Rent = ({
    value,
    title,
    description,
    images,
    rooms,
    bathrooms,
    tax,
    available,
}) => (
    <RentStyle>
        <RentHeader images={images} />
        <RentInfoContainer>
            <RentTitle title={title} />
            <RentInfo description={description} />
            <Rooms rooms={rooms} />
            <Bathrooms bathrooms={bathrooms} />
            <Price price={value} />
            <p>
                <span style={{ fontWeight: 600 }}>Taxa:</span> R${tax}
            </p>
            <h3
                style={{
                    textAlign: "center",
                    color: available > 0 ? "red" : "green",
                }}
            >
                {available > 0 ? "Indisponivel" : "Disponivel"}
            </h3>
        </RentInfoContainer>
    </RentStyle>
);

export default Rent;
