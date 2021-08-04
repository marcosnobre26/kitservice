import { useEffect, useRef, useState } from "react";
import CondominiumsService from "../../../services/CondominiumsService";
import Rent from "./Rent";
import { Next, Prev, ShowcaseCategory, ShowcaseStyle } from "./style";

const Showcase = ({ condos }) => {
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
    // let mousePosDown = 0;
    // let mousePosUp = 0;
    // const mouseDown = (e) => {
    //     mousePosDown = e.x;
    // };
    // const mouseUp = (e) => {
    //     mousePosUp = e.x;
    //     if (mousePosDown < mousePosUp) {
    //         scroll("prev");
    //     } else if (mousePosDown > mousePosUp) {
    //         scroll("next");
    //     }
    // };
    // useEffect(() => {
    //     ref.current.addEventListener("mousedown", mouseDown);
    //     ref.current.addEventListener("mouseup", mouseUp);
    // });
    return (
        <ShowcaseStyle>
            <Prev onClick={() => scroll("prev")}>{"<"}</Prev>
            <ShowcaseCategory ref={ref}>
                {condos
                    ? condos.map((condo, index) => {
                          return (
                              <Rent
                                  key={condo.id}
                                  title={condo.name}
                                  address={condo.address}
                                  description={condo.description}
                                  id={condo.id}
                                  images={condo.imagens}
                              />
                          );
                      })
                    : null}
            </ShowcaseCategory>
            <Next onClick={() => scroll("next")}>{">"}</Next>
        </ShowcaseStyle>
    );
};

export default Showcase;
