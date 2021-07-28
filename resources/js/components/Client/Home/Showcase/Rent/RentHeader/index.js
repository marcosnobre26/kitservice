import { HeaderImg, HeaderStyle, PrevBtn, NextBtn } from "./style";
import Carousel, { arrowsPlugin } from "@brainhubeu/react-carousel";
import Header from "../../../Header";
const RentHeader = ({ images }) => (
    <HeaderStyle>
        <Carousel
            plugins={[
                {
                    resolve: arrowsPlugin,
                    options: {
                        arrowLeft: <PrevBtn>{"<"}</PrevBtn>,
                        arrowLeftDisabled: <></>,
                        arrowRight: <NextBtn>{">"}</NextBtn>,
                        arrowRightDisabled: <></>,
                        addArrowClickHandler: true,
                    },
                },
                "centered",
            ]}
        >
            {images &&
                images.map((image, index) => (
                    <HeaderImg key={index} src={"/storage" + image.image} />
                ))}
        </Carousel>
    </HeaderStyle>
);

export default RentHeader;
