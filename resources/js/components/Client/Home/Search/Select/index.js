import { SelectInput } from "./style";

const Select = ({ options, onSelect }) => (
    <SelectInput onChange={(e) => onSelect(e.target.value)}>
        <option defaultValue>Selecione uma categoria</option>
        {options
            ? options.map((option) => (
                  <option key={option.id} value={option.id}>
                      {option.name}
                  </option>
              ))
            : null}
    </SelectInput>
);

export default Select;
