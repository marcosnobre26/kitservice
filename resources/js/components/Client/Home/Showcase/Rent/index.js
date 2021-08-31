import RentAddress from "./RentAddress";
import RentHeader from "./RentHeader";
import RentInfo from "./RentInfo";
import RentTitle from "./RentTitle";
import { RentInfoContainer, RentStyle } from "./style";
import { useHistory } from "react-router-dom";

const Rent = ({ title, index, address, id, description, images, type }) => {
    const history = useHistory();
    const commercialRedirect = () => {
        history.push({
            pathname: `/commercial/${id}`,
            state: { id: id },
        });
    };
    const condoRedirect = () => {
        history.push({
            pathname: `/condo/${id}`,
            state: { id: id },
        });
    };
    return (
        <RentStyle id={index ? index : ""}>
            <RentHeader images={images} />
            <RentInfoContainer>
                <RentTitle
                    title={title ? title : "SALA COMERCIAL"}
                    onClick={
                        type === "commercial"
                            ? commercialRedirect
                            : condoRedirect
                    }
                />
                <RentAddress address={address} />
                <RentInfo description={description} />
            </RentInfoContainer>
        </RentStyle>
    );
};

export default Rent;
