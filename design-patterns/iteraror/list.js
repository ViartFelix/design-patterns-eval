export default class List {
    constructor(listItem) {
        this.current = listItem[0];
        this.listItem = listItem;
    }

    next() {
        this.current = this.current.next
    }
}