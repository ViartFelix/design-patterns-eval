/** Essai */
class Multiton_Multi
{

    /** @var {Multiton[]} Instances */
    _tables;

    constructor() {

        if(!Multiton_Multi._tables){
            Multiton_Multi._tables = [
                {players: [this]}
            ];
        } else {
            let hasInserted = false;

            Multiton_Multi._tables.forEach((val) => {

            })
        }

        return Multiton_Multi._tables;
    }
}

/** Correction */
class PokerManager
{
    /** @var {Multiton[]} _tables Les tables du poker */
    _tables;

    constructor() {
        if(!PokerManager._tables) {
            PokerManager._tables = [{players: [this]}];
        } else if(PokerManager._tables[PokerManager._tables.length - 1].players.length < 3) {
            PokerManager._tables[PokerManager._tables.length - 1].players.push(this)
        } else {
            PokerManager._tables.push({players: [this]})
        }

        return PokerManager._tables;
    }
}
