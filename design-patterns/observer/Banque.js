import DAB from "./DAB.js";

export default class Banque {
    constructor() {
        this.DAB = new DAB();
        this.DAB.addWithDrawObserver(this.removeMoneyFromAccount)
    }

    removeMoneyFromAccount(account) {
        console.log("Vous avez retiré " + account + " smackaroos")
    }
}