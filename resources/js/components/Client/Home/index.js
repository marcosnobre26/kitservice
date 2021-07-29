import { HomeStyle } from "./style";
import Header from "./Header";
import Search from "./Search";
import Showcase from "./Showcase";
import SumAbout from "./SumAbout";
import Navbar from "../Navbar";
import Footer from "../Footer";

import CondominiumsService from "../../services/CondominiumsService";
import CommercialRoomService from "../../services/CommercialRoomService";
import { useEffect, useState } from "react";

const Home = () => {
    const [condos, setCondos] = useState();
    const [commercial, setCommercial] = useState();

    const getCondominiums = () => {
        CondominiumsService.get().then((data) => {
            setCondos(data.data);
        });
    };

    const getCommercial = () => {
        CommercialRoomService.get().then((data) => {
            setCommercial(data.data);
        });
    };

    useEffect(() => {
        getCondominiums();
        getCommercial();
    }, []);

    return (
        <HomeStyle>
            <Navbar />
            <Header />
            <Search />
            <div>
                <Showcase condos={condos} />
                <Showcase condos={commercial} />
            </div>
            <SumAbout />
            <Footer />
        </HomeStyle>
    );
};

export default Home;
