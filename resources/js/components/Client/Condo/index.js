import Footer from "../Footer";
import Navbar from "../Navbar";
import Header from "./Header";
import { Container } from "./style";
import Showcase from "./Showcase";
import { useParams, useLocation } from "react-router-dom";
import CondominiumsService from "../../services/CondominiumsService";
import { useEffect, useState } from "react";
import Description from "./Description";
import Unavailable from "./Unavailable";
const Condo = () => {
    const { id } = useParams();
    const location = useLocation();
    console.log(location);
    const [condo, setCondo] = useState();
    const [kitnets, setKitnets] = useState();
    const getCondominiums = () => {
        CondominiumsService.getid(id).then((data) => {
            setCondo(data.data);
        });
    };
    const getKitnets = () => {
        CondominiumsService.kitnetList(id).then((data) => {
            setKitnets(data.data);
        });
    };
    useEffect(() => {
        getCondominiums();
        getKitnets();
    }, []);

    return (
        <Container>
            <Navbar />
            <Header />
            {condo ? (
                <Description
                    title={condo.name}
                    address={condo.address}
                    description={condo.description}
                />
            ) : null}
            <Showcase data={kitnets} />
            {/* {kitnets.length > 0 ? <Showcase /> : <Unavailable />} */}
            <Footer />
        </Container>
    );
};

export default Condo;
