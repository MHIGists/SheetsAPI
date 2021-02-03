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

window.onload = function () {
    var a_tags = document.getElementsByTagName('a');
    var button_tags = document.getElementsByTagName('button');
    var data = document.getElementById('data');
    if (a_tags.length > 1) {
        for (let i = 0; i < a_tags.length; i++) {
            a_tags[i].href += data.value;
        }
    }
    for (let button in button_tags) {
        button_tags[button].classList.add('btn');
        button_tags[button].classList.add('btn-secondary');
    }
}