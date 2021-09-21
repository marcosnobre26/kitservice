import Carousel, { arrowsPlugin } from "@brainhubeu/react-carousel";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import { useEffect, useRef, useState } from "react";
import CondominiumsService from "../../../services/CondominiumsService";
import Rent from "./Rent";
import { Next, Prev, ShowcaseCategory, ShowcaseStyle, Section } from "./style";
import "./styles.css";

import Slider from "react-slick";

const Showcase = ({ condos, type }) => {
    const [current, setCurrent] = useState(0);
    const ref = useRef();
    const scroll = (direction) => {
        const element = ref.current.lastElementChild;
        const width = element.getBoundingClientRect().width;
        let offset;

        if (direction === "next") {
            offset = current + 30 + width;
            if (current >= element.getBoundingClientRect().x) {
                return;
            }
        } else if (direction === "prev") {
            offset = current - 30 - width;
            if (offset < 0) {
                return;
            }
        }
        ref.current.scroll(offset, 0);
        setCurrent(offset);
    };
    let pages = condos.length / 6;
    let pagesData = [];
    console.log(Math.ceil(pages));
    for (let i = 1; i <= Math.ceil(pages); i++) {
        const condo = condos.filter(
            (data, index) => index < i * 6 && index >= i * 6 - 6
        );
        pagesData.push(condo);
    }

    const toRender = pagesData.map((page) => (
        <div>
            <Section>
                {page.map((condo) => (
                    <Rent
                        type={type}
                        key={condo.id}
                        title={condo.name}
                        address={condo.address}
                        description={condo.description}
                        id={condo.id}
                        images={condo.imagens}
                    />
                ))}
            </Section>
        </div>
    ));

    console.log(toRender);

    const settings = {
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
    };

    return (
        <ShowcaseStyle>
            {/*<Slider {...settings}>{toRender}</Slider> */}
            <Section>
                {condos &&
                    condos.map((condo) => (
                        <Rent
                            type={type}
                            key={condo.id}
                            title={condo.name}
                            address={condo.address}
                            description={condo.description}
                            id={condo.id}
                            images={condo.imagens}
                        />
                    ))}
            </Section>
        </ShowcaseStyle>
    );
};

const Sect = () => (
    <Section>
        <p>sled campos silva</p>
    </Section>
);

export default Showcase;
