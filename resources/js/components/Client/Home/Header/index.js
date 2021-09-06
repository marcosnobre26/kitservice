import { HeaderStyle, Section, NextBtn, PrevBtn, BackImg } from "./style";
import Carousel, { arrowsPlugin } from "@brainhubeu/react-carousel";
import "@brainhubeu/react-carousel/lib/style.css";

import slide1 from "../../../../../media/slide1.jpeg";
import slide2 from "../../../../../media/slide2.jpeg";
const Header = ({ condos }) => {
    const banners = condos.map((condo) => (
        <img style={{ width: "100%" }} src={"/storage" + condo.banner} />
    ));
    return (
        <HeaderStyle>
            {banners && (
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
                    slides={banners}
                >
                    {/* <Section>
                    <BackImg img={slide1} />
                    <BackImg img={slide1} />
                    <BackImg img={slide1} />
                </Section>
                <Section>
                    <BackImg img={slide2} />
                </Section> */}
                </Carousel>
            )}
        </HeaderStyle>
    );
};

export default Header;
