import RentHeader from "./RentHeader";
import RentInfo from "./RentInfo";
import RentTitle from "./RentTitle";
import { RentInfoContainer, RentStyle } from "./style";

const Rent = () => (
    <RentStyle>
        <RentHeader />
        <RentInfoContainer>
            <RentTitle />
            <RentInfo />
        </RentInfoContainer>
    </RentStyle>
);

export default Rent;
