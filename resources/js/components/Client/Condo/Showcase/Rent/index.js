import RentHeader from "./RentHeader";
import RentInfo from "./RentInfo";
import RentTitle from "./RentTitle";
import { RentInfoContainer, RentStyle } from "./style";

const Rent = ({ value, title, description, images }) => (
    <RentStyle>
        <RentHeader images={images} />
        <RentInfoContainer>
            <RentTitle title={title} />
            <RentInfo description={description} />
        </RentInfoContainer>
    </RentStyle>
);

export default Rent;
