fetch('../server/s_kategoriak.php')
    .then(response => response.json())
    .then(data => render_kategoriak(data))
    
function render_kategoriak(data){
    let returnStr = '' 
    returnStr = '<select class="form-input" name="kategoriak" id="kategoriak" onchange="showSelected();"> <option selected hidden>Válassz kategóriát </option>'

    for(let obj of data){
        returnStr += `<option id="${obj.id}" value="${obj.id}"> ${obj.nev}</option>`
    }
    
    returnStr += '</select>'
    document.getElementById('kategoriak_select').innerHTML += returnStr
}