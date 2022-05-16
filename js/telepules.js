fetch('../server/s_telepules.php')
    .then(response => response.json())
    .then(data => render_telepulesek(data))
    
function render_telepulesek(data){
    let returnStr = '' 

    for(let obj of data){
        returnStr += `<option value="${obj.nev}" data-val="${obj.id}"> `
    }
    
    document.getElementById('telepulesek').innerHTML += returnStr
}