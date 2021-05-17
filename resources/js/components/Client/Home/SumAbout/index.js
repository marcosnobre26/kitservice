import {
    SumAboutButton,
    SumAboutImg,
    SumAboutInfo,
    SumAboutStyle,
    SumAboutText,
    SumAboutTitle,
} from "./style";
import aboutImg from "../../../../../media/aboutImg.png";

const SumAbout = () => (
    <SumAboutStyle>
        <SumAboutInfo>
            <SumAboutTitle>QUEM SOMOS</SumAboutTitle>
            <SumAboutText>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                semper nisl non velit condimentum, quis mollis quam gravida.
                Aliquam pretium, leo sit amet iaculis euismod, mauris nisi
                rhoncus diam, eget rhoncus risus massa quis magna. Donec velit
                nisl, pharetra sit amet convallis sit amet, laoreet id arcu. In
                id cursus leo. In dolor enim, vestibulum a justo at.
            </SumAboutText>
            <SumAboutButton>SOBRE NÓS</SumAboutButton>
        </SumAboutInfo>
        <SumAboutImg src={aboutImg} />
    </SumAboutStyle>
);

export default SumAbout;
