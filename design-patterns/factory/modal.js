export default class Modal
{
    /** Element HTML du modal */
    element;


    constructor(content) {
        const el = document.createElement("div");
        el.classList.add("modal")

        const container = document.createElement("div")
        container.classList.add("container")
        container.innerHTML = content

        el.appendChild(container)

        this.element = el

        document.querySelector("main")
            .appendChild(this.element)
    }

    open()
    {
        this.element.classList.add("open")
    }

    close()
    {
        this.element.classList.remove("open")
    }
}