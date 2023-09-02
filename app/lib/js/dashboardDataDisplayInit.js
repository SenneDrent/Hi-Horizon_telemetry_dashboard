var dataColumns = [document.getElementById("dataColumn1"), document.getElementById("dataColumn2")];

let dashboardDisplay = new DataManager(dataColumns, dataTypes);

dashboardDisplay.initHtml();