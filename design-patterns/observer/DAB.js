export default class DAB {
    constructor() {
        this.withdrawCallBackList = [];
    }

    withdraw(ammount) {
        for(let call of this.withdrawCallBackList) {
            call(ammount)
        }

        return ammount;
    }

    addWithDrawObserver(callback) {
        this.withdrawCallBackList.push(callback)
    }
}