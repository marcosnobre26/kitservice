import RentAddress from "./RentAddress";
import RentHeader from "./RentHeader";
import RentInfo from "./RentInfo";
import RentTitle from "./RentTitle";
import { RentInfoContainer, RentStyle } from "./style";
import { useHistory } from "react-router-dom";

const Rent = ({ title, index, address, id, description, images }) => {
    const history = useHistory();
    const condoRedirect = () => {
        history.push(`/condo/${id}`);
    };
    return (
        <RentStyle id={index ? index : ""}>
            <RentHeader images={images} />
            <RentInfoContainer>
                <RentTitle title={title} onClick={condoRedirect} />
                <RentAddress address={address} />
                <RentInfo description={description} />
            </RentInfoContainer>
        </RentStyle>
    );
};

export default Rent;
