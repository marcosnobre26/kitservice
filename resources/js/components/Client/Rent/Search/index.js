import SearchBtn from "./SearchBtn";
import Select from "./Select";
import { Categories, SearchStyle } from "./style";

const Search = () => (
    <SearchStyle>
        <Categories>
            <Select />
            <Select />
            <Select />
        </Categories>
        <SearchBtn />
    </SearchStyle>
);

export default Search;
