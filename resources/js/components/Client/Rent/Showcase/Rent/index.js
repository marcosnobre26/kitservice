import RentHeader from "./RentHeader";
import RentInfo from "./RentInfo";
import RentTitle from "./RentTitle";
import { RentInfoContainer, RentStyle } from "./style";

const Rent = ({ price }) => (
    <RentStyle>
        <RentHeader />
        <RentInfoContainer>
            <RentTitle title={price} />
            <RentInfo />
        </RentInfoContainer>
    </RentStyle>
);

export default Rent;
