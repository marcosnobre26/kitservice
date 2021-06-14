import Footer from "../Footer";
import Navbar from "../Navbar";
import Header from "./Header";
import { Container } from "./style";
import Showcase from "./Showcase";
import { useParams } from "react-router-dom";
import CondominiumsService from "../../services/CondominiumsService";
import { useEffect, useState } from "react";
import Description from "./Description";
import Unavailable from "./Unavailable";
const Condo = () => {
    const { id } = useParams();
    const [condo, setCondo] = useState();
    const getCondominiums = () => {
        CondominiumsService.getid(id).then((data) => {
            setCondo(data.data);
        });
    };
    useEffect(() => {
        getCondominiums();
    }, []);
    console.log(condo);
    const kitnets = condo ? condo.kitnets : [];
    console.log(kitnets);
    return (
        <Container>
            <Navbar />
            <Header />
            {condo ? (
                <Description title={condo.name} address={condo.address} />
            ) : null}
            <Showcase />
            {/* {kitnets.length > 0 ? <Showcase /> : <Unavailable />} */}
            <Footer />
        </Container>
    );
};

export default Condo;