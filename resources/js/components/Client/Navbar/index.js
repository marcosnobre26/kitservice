import Logo from "./Logo";
import Menu from "./Menu";
import { NavStyle } from "./style";
import Tel from "./Tel";

const Navbar = () => (
    <NavStyle>
        <Logo />
        <Menu />
        <Tel />
    </NavStyle>
);

export default Navbar;
