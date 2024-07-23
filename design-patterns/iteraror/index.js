import List from "./list.js";
import Item from "./item.js";

const item3 = new Item("4")
const item2 = new Item("2", item3);
const item1 = new Item("1", item2)


const list = new List([item1, item2, item3])
console.log(list.current)
list.next();
console.log(list.current)