import { HeaderStyle, Section, NextBtn, PrevBtn } from "./style";
import Carousel, { arrowsPlugin } from "@brainhubeu/react-carousel";
import "@brainhubeu/react-carousel/lib/style.css";

import slide1 from "../../../../../media/slide1.jpeg";
import slide2 from "../../../../../media/slide2.jpeg";
const Header = () => {
    return (
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
                ]}
            >
                <Section img={slide1}></Section>
                <Section img={slide2}></Section>
            </Carousel>
        </HeaderStyle>
    );
};

export default Header;
