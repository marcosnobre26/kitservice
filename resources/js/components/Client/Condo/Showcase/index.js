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
                        rooms={item.qtd_bedrooms}
                        bathrooms={item.qtd_bathrooms}
                        tax={item.rate}
                        available={item.status}
                    />
                ))}
        </ShowcaseStyle>
    );
};

export default Showcase;
