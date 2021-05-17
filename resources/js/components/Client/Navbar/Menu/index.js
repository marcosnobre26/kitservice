import { MenuLink, MenuStyle } from "./style";

const Menu = () => (
    <MenuStyle>
        <MenuLink to="/">PRINCIPAL</MenuLink>
        <MenuLink to="/rent">ALUGAR</MenuLink>
        <MenuLink to="/about">SOBRE NÓS</MenuLink>
    </MenuStyle>
);

export default Menu;
