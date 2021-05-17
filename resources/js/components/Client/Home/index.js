import { HomeStyle } from "./style";

import Header from "./Header";
import Search from "./Search";
import Showcase from "./Showcase";
import SumAbout from "./SumAbout";
import Navbar from "../Navbar";
import Footer from "../Footer";
const Home = () => (
    <HomeStyle>
        <Navbar />
        <Header />
        <Search />
        <Showcase />
        <SumAbout />
        <Footer />
    </HomeStyle>
);

export default Home;
