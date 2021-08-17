import Bathrooms from "./Bathrooms";
import Price from "./Price";
import RentHeader from "./RentHeader";
import RentInfo from "./RentInfo";
import RentTitle from "./RentTitle";
import Rooms from "./Rooms";
import { RentInfoContainer, RentStyle } from "./style";

const Rent = ({ value, title, description, images, rooms, bathrooms }) => (
    <RentStyle>
        <RentHeader images={images} />
        <RentInfoContainer>
            <RentTitle title={title} />
            <RentInfo description={description} />
            <Rooms rooms={rooms} />
            <Bathrooms bathrooms={bathrooms} />
            <Price price={value} />
        </RentInfoContainer>
    </RentStyle>
);

export default Rent;
