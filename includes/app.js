function clickSearch(){
    document.getElementById('range').value = document.getElementById('range1').value + ":" + document.getElementById('range2').value;

}
//  window.onload = function (){
//     var elements = document.getElementsByTagName('TD')
//     for (let i = 0; i < elements.length; i++) {
//         elements[i].classList.add('not-marked');
//         elements[i].addEventListener('click', function (event){
//             let target = event.target;
//             let realTarget = document.getElementById(target.id);
//             if (realTarget.classList.contains('not-marked')){
//                 realTarget.classList.replace('not-marked', 'marked');
//             }else{
//                 if (realTarget.classList.contains('marked')){
//                     realTarget.classList.replace('marked', 'not-marked');
//                 }
//             }
//         })
//     }
// }
function createQuery(){
    let values = document.getElementById('values');
    var elems = document.getElementsByTagName('input');
    let result = "";
    for (let i = 0; i < elems.length; i++) {
        if (i === 0){
            continue;
        }
        result += elems[i].value + ":";
    }
    values.value = result;
}