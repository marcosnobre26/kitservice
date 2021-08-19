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

import AboutUs from "../../services/AboutUs";
import { useEffect, useState } from "react";
const About = () => {
    const [aboutText, setAboutText] = useState();
    const getAbout = async () => {
        const response = await AboutUs.get();
        if (response.data) {
            setAboutText(response.data[0].about);
        }
    };
    useEffect(() => {
        getAbout();
    }, []);

    return (
        <div>
            <Navbar />
            <AboutHeader />
            <AboutStyle>
                <AboutInfo>
                    <AboutTitle>QUEM SOMOS</AboutTitle>
                    <AboutText>{aboutText}</AboutText>
                </AboutInfo>
                <AboutImg src={aboutImg} />
            </AboutStyle>
            <Footer />
        </div>
    );
};

export default About;
