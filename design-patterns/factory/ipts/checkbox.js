import Field from "./Field.js";

export default class Checkbox extends Field
{
    container = document.getElementById("form");

    constructor(label, name) {
        super(label, name)
        this.cloneCheckBox()
    }

    cloneCheckBox()
    {
        const el = document.createElement("label")

        const input = document.createElement("input")
        input.setAttribute('type', 'checkbox')
        input.setAttribute("name", this.name)

        el.innerHTML = this.label
        el.appendChild(input)

        this.container.appendChild(el)
    }
}