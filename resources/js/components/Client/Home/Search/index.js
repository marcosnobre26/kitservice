import SearchBtn from "./SearchBtn";
import Select from "./Select";
import { Categories, SearchStyle } from "./style";
import Title from "./Title";

const Search = () => (
    <SearchStyle>
        <Title />
        <Categories>
            <Select />
            <Select />
            <Select />
        </Categories>
        <SearchBtn />
    </SearchStyle>
);

export default Search;
