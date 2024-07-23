import Field from "./Field.js";

export default class Input extends Field
{
    container = document.getElementById("form");

    constructor(label, name) {
        super(label, name)
        this.cloneInput()
    }

    cloneInput()
    {
        //Element à append
        const el = document.createElement("label")

        const input = document.createElement("input")
        input.setAttribute('type', 'text')
        input.setAttribute("name", this.name)

        el.innerHTML = this.label
        el.appendChild(input)

        this.container.appendChild(el)
    }

}