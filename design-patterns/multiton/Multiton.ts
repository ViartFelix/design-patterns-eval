/** Essai */
class Multiton
{
    /** Instances de la classe */
    static _intances: Multiton[] = [];
    /** Nombre d'instances au total */
    static _nbrInstances: number;

    constructor() {
        //si on peut créer un multiton (max: 2)
        if((Multiton._nbrInstances ?? 0) < 2)
        {
            Multiton._intances.push(this);

            if(!Multiton._nbrInstances) {
                Multiton._nbrInstances = 1
            } else {
                Multiton._nbrInstances++;
            }
        }
    }

    /**
     * Retourne une instance ou les multitons
     * @param {number|null} index L'index de l'instance à retourner.
     */
    public getInstance(index: number|undefined): Multiton | Multiton[]
    {
        if(index !== undefined) {
            return Multiton._intances
        } else {
            return Multiton._intances.at(index)
        }
    }
}

/** Correction dans multiton 2 */