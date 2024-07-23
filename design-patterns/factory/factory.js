import Input from "./ipts/input.js";
import Text from "./ipts/text.js";
import Checkbox from "./ipts/checkbox.js";
import Modal from "./modal.js";

export default class Factory
{
    constructor(name, label) {
        //checkbox -> Checkbox (first letter uppercase)
        const nameClass = name.at(0).toUpperCase() + name.slice(1).toLowerCase();
        //nouvelle instance de classe via eval
        const instance = eval(
            "new " + nameClass + "(label, name.toLowerCase())"
        );
    }
}