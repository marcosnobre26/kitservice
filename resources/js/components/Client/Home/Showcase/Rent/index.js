import RentAddress from "./RentAddress";
import RentHeader from "./RentHeader";
import RentInfo from "./RentInfo";
import RentTitle from "./RentTitle";
import { RentInfoContainer, RentStyle } from "./style";
import { useHistory } from "react-router-dom";

const Rent = ({ title, index, address, id }) => {
    const history = useHistory();
    const condoRedirect = () => {
        history.push(`/condo/${id}`);
    };
    return (
        <RentStyle id={index ? index : ""} onClick={condoRedirect}>
            <RentHeader />
            <RentInfoContainer>
                <RentTitle title={title} />
                <RentAddress address={address} />
                <RentInfo />
            </RentInfoContainer>
        </RentStyle>
    );
};

export default Rent;
