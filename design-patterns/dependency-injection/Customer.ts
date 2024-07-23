import BasketManager from "./BasketManager";

class Customer
{
    private basketManager: BasketManager;

    constructor(basketManager: BasketManager) {
        this.basketManager = basketManager;
    }
}