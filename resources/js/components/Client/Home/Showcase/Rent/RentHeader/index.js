import { HeaderImg, HeaderStyle } from "./style";
import ap from "../../../../../../../media/ap.jpg";

const RentHeader = ({ images }) => (
    <HeaderStyle>
        <HeaderImg src={"/storage/" + images[0].image} />
    </HeaderStyle>
);

export default RentHeader;
