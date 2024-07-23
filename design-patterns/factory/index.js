import Factory from "./factory.js";
import Modal from "./modal.js";

document.addEventListener("DOMContentLoaded", (event) => {
    const builder = document.querySelector(".builder")
    //elements pouvant être ajoutés (classe addable)
    const elements = builder.querySelectorAll(".addable")

    elements.forEach((element) => {
        element.addEventListener("click", (e) => {
            e.preventDefault();

            const md = new Modal(`
                <input type="text" placeholder="label">
                <input type="text" placeholder="nom">
            `)

            md.open()

            //dans data-add
            const dataAdd = element.dataset.add
            const label = element.textContent

            new Factory(dataAdd, label)
        })
    })
})

