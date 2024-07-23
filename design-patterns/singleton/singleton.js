/** Essai lul */
class Singleton
{
    /** Instance de la classe */
    _instance;

    constructor() {}

    /**
     * Donne l'instance du singleton
     * @returns { Singleton }
     */
    static getInstance()
    {
        if(!this._instance) {
            this._instance = new Singleton()
        }

        return this._instance;
    }
}

/** Correction */
class SingletonCor
{
    constructor() {
        if(!SingletonCor.instance) {
            SingletonCor.instance = this;
        }

        return SingletonCor.instance;
    }
}

const instance = new SingletonCor();
//freeze de l'object
Object.freeze(instance);

export default instance;