function showFokusztav(){
    let returnStr = ``    

    if(document.getElementById("fix_fokusz").checked==true){
        returnStr = ``
        returnStr += `<div><span>Fókusztáv</span><input type="number" name="fokusztav" id="fokusztav"></div>`
    }else{
        returnStr = ``
        returnStr += `<div><span>Min fókusztáv</span><input type="number" name="min_fokusztav" id="min_fokusztav"></div>`
        returnStr += `<div><span>Max fókusztáv</span><input type="number" name="max_fokusztav" id="max_fokusztav"></div>`
    }
    document.getElementById("fokusz_div").innerHTML = returnStr
}

function showRekesz(){
    let returnStr = ``    

    if(document.getElementById("fix_rekesz").checked==true){
        returnStr = ``
        returnStr += `<div><span>Rekesz</span><input type="number" step="0.1" name="rekesz" id="rekesz"></div>`
    }else{
        returnStr = ``
        returnStr += `<div><span>Min rekesz</span><input type="number" step="0.1" name="min_rekesz" id="min_rekesz"></div>`
        returnStr += `<div><span>Max rekesz</span><input type="number" step="0.1" name="max_rekesz" id="max_rekesz"></div>`
    }
    document.getElementById("rekesz_div").innerHTML = returnStr
}