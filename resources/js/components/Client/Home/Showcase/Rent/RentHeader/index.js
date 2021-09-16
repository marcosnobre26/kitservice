import { HeaderImg, HeaderStyle, PrevBtn, NextBtn, Section } from "./style";
import Carousel, { arrowsPlugin } from "@brainhubeu/react-carousel";

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
                    <Section>
                        <HeaderImg key={index} src={"/storage" + image.image} />
                    </Section>
                ))}
        </Carousel>
    </HeaderStyle>
);

export default RentHeader;
