function clickSearch() {
    document.getElementById('range').value = document.getElementById('range1').value + ":" + document.getElementById('range2').value;
}
function createQuery() {
    console.log("Creating query");
    let values = document.getElementById('values');
    var elems = document.getElementsByTagName('input');
    let result = "";
    for (let i = 0; i < elems.length; i++) {
        if (elems[i].hidden === true) {
            continue;
        }
        result += elems[i].value + ":";
    }
    values.value = result;
    document.getElementById('input').submit();
}