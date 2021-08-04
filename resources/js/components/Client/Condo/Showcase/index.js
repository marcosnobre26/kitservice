import Rent from "./Rent";
import { ShowcaseStyle } from "./style";

const Showcase = ({ data }) => {
    return (
        <ShowcaseStyle>
            {data &&
                data.map((item, index) => (
                    <Rent
                        key={index}
                        value={item.value}
                        title={item.number}
                        description={item.description}
                        images={item.imagens}
                    />
                ))}
        </ShowcaseStyle>
    );
};

export default Showcase;
