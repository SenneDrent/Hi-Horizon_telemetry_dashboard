class CalculationInput {
    constructor(name, parentElement, description) {
        this.name = name;
        this.parentElement = parentElement;
        this.description = description;

        this.displayToHtml();
    }

    displayToHtml() {
        var parentElementUpper = upperCaseFirstChar(this.parentElement);

        var container = document.createElement("DIV");
        container.setAttribute("class", "col form-inline");
        container.setAttribute("id", this.name + parentElementUpper +"Container");

        //maakt html element voor het omschrijvingstekst
        var node = document.createElement("P");
        var textnode= document.createTextNode(this.description);
        node.appendChild(textnode);
        node.setAttribute("class", "col-md-4");

        //maakt html element voor het invoervak
        var textInput = document.createElement("INPUT");
        textInput.setAttribute("class", "form-control mb-1 col-md-4");
        textInput.setAttribute("id", this.name + parentElementUpper +"Input");

        //voegt alles samen
        container.appendChild(node);
        container.appendChild(textInput);
        let referenceNode = document.getElementById(this.parentElement + "Resultaat");
        let parentNode = document.getElementById(this.parentElement);
        parentNode.insertBefore(container, referenceNode);
    }
}

class AutoInput extends CalculationInput {
    constructor(name, parentElement, description) {
        super(name, parentElement, description);
    }

    displayToHtml(){
        super.displayToHtml();

        var checkBox = document.createElement("INPUT");
        checkBox.setAttribute("class", "col-md-4");
        checkBox.setAttribute("type", "checkbox");
        checkBox.setAttribute("id", this.name + upperCaseFirstChar(this.parentElement) +"Checkbox");
        checkBox.setAttribute("onchange", "toggleDisabled(this.checked, '" + this.name + upperCaseFirstChar(this.parentElement) + "Input')");
        document.getElementById(this.name + upperCaseFirstChar(this.parentElement) +"Container").appendChild(checkBox);  
    }
}


function toggleDisabled(_checked, idName) {
    document.getElementById(idName).disabled = _checked ? true : false;
}

function autoBerekening(checkBoxId, inputTextId, autoValue) {
    if (document.getElementById(checkBoxId).checked == true) {
        document.getElementById(inputTextId).value = autoValue;
    }
}

function percentCalc(checkBoxId, inputTextId, total, amountLeft) {
    if (document.getElementById(checkBoxId).checked == true) {
        document.getElementById(inputTextId).value = (amountLeft / total) * 100;
    }
}

function pMotorCalc(pZon, percent, eTotal, tOver) {
    return pZon + ((eTotal * (percent/100.000000000)) / tOver);
}

function upperCaseFirstChar (str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}


function reachBerekening(pMotor, pZon, eBatterij, eGebruikt){
    reach = (0.8335*(pMotor**0.3943))*(((eBatterij-eGebruikt)/(pMotor-pZon)));
    return reach;
}
function pMotorCalcTimeTrial(pZon, eBatterij, eGebruikt, distance) {
    marge = 50;
    i = 0;
    pMotor = 50;
    reach = reachBerekening(pMotor, pZon, eBatterij, eGebruikt);
    while (i < 10) {
        while (reach > distance) {
            pMotor += marge;
            reach = reachBerekening(pMotor, pZon, eBatterij, eGebruikt);
        }
        pMotor -= marge;
        marge /= 2;
        reach = reachBerekening(pMotor, pZon, eBatterij, eGebruikt);
        i++;
    }
    return pMotor;
}

let pZonTimetrialInput =        new AutoInput("pZon", "timetrial", "Pzon (W)");
let eTotaltimetrialInput =      new CalculationInput("eTotal", "timetrial", "E batterij totaal (Wh)");
let eUsedtimetrialInput =       new AutoInput("eUsed", "timetrial", "E batterij gebruikt (Wh)");
let eOvertimetrialInput =       new AutoInput("eOver", "timetrial", "E over (%)");
let sGevarentimetrialInput =    new AutoInput("sGevaren", "timetrial", "afstand gevaren (km)");
let sTotaltimetrialInput =      new CalculationInput("sTotal", "timetrial", "afstand race (km)");

let tOverEnduranceInput =       new AutoInput("tOver", "endurance", "tijd over (h)");
let pZonEnduranceInput =        new AutoInput("pZon", "endurance", "Pzon (W)");
let eTotalenduranceInput =      new CalculationInput("eTotal", "endurance", "E batterij totaal (Wh)");
let eUsedenduranceInput =       new AutoInput("eUsed", "endurance", "E batterij gebruikt (Wh)");
let eOverenduranceInput =       new AutoInput("eOver", "endurance", "E over (%)");