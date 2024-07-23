class Manipulator {
    constructor(selector) {
        this.element = document.querySelector(selector);
    }

    setAttributes(name, val) {
        this.element[name] = val;
        return this;
    }

    addEventListener(event, callback) {
        this.element.addEventListener(event, callback);
        return this;
    }
}