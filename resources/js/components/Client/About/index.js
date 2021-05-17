import {
    AboutButton,
    AboutImg,
    AboutInfo,
    AboutStyle,
    AboutText,
    AboutTitle,
} from "./style";
import aboutImg from "../../../../media/aboutImg.png";
import build from "../../../../media/build.png";
import Navbar from "../Navbar";
import Footer from "../Footer";
import AboutHeader from "./AboutHeader";

const About = () => (
    <div>
        <Navbar />
        <AboutHeader />
        <AboutStyle>
            <AboutInfo>
                <AboutTitle>QUEM SOMOS</AboutTitle>
                <AboutText>
                    Lorem ip dolor sit amet, consectetur adipiscing elit.
                    Integer semper nisl non velit condimentum, quis mollis quam
                    gravida. Aliquam pretium, leo sit amet iaculis euismod,
                    mauris nisi rhoncus diam, eget rhoncus risus massa quis
                    magna. Donec velit nisl, pharetra sit amet convallis sit
                    amet, laoreet id arcu. In id cursus leo. In dolor enim,
                    vestibulum a justo at.
                </AboutText>
            </AboutInfo>
            <AboutImg src={aboutImg} />
        </AboutStyle>
        <AboutStyle>
            <AboutImg src={build} />
            <AboutInfo>
                <AboutTitle>MAIS</AboutTitle>
                <AboutText>
                    Lorem ip dolor sit amet, consectetur adipiscing elit.
                    Integer semper nisl non velit condimentum, quis mollis quam
                    gravida. Aliquam pretium, leo sit amet iaculis euismod,
                    mauris nisi rhoncus diam, eget rhoncus risus massa quis
                    magna. Donec velit nisl, pharetra sit amet convallis sit
                    amet, laoreet id arcu. In id cursus leo. In dolor enim,
                    vestibulum a justo at.
                </AboutText>
            </AboutInfo>
        </AboutStyle>
        <Footer />
    </div>
);

export default About;
