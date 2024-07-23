import Field from "./Field.js";

export default class Text extends Field
{
    container = document.getElementById("form");

    constructor(label, name) {
        super(label, name)
        this.cloneText()
    }

    cloneText()
    {
        //Element à append
        const el = document.createElement("label")

        const input = document.createElement("textarea")
        input.setAttribute("name", this.name)

        el.innerHTML = this.label
        el.appendChild(input)

        this.container.appendChild(el)
    }
}