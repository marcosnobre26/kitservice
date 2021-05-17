import Footer from "../Footer";
import Search from "./Search";
import Navbar from "../Navbar";
import Header from "./Header";
import { Container } from "./style";
import Showcase from "./Showcase";

const Rent = () => {
    return (
        <Container>
            <Navbar />
            <Header />
            <Search />
            <Showcase />
            <Footer />
        </Container>
    );
};

export default Rent;
