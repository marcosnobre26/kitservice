import { HomeStyle } from "./style";
import Header from "./Header";
import Search from "./Search";
import Showcase from "./Showcase";
import SumAbout from "./SumAbout";
import Navbar from "../Navbar";
import Footer from "../Footer";

import CondominiumsService from "../../services/CondominiumsService";
import { useEffect, useState } from "react";

const Home = () => {
    const [condos, setCondos] = useState();

    const getCondominiums = () => {
        CondominiumsService.get().then((data) => {
            setCondos(data.data);
        });
    };
    useEffect(() => {
        getCondominiums();
    }, []);
    return (
        <HomeStyle>
            <Navbar />
            <Header />
            <Search />
            <div>
                <Showcase condos={condos} />
                <Showcase condos={condos} />
            </div>
            <SumAbout />
            <Footer />
        </HomeStyle>
    );
};

export default Home;
