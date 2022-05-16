const form = document.getElementById("hirdetesfeladas_form")
const formData = new FormData(document.getElementById("hirdetesfeladas_form"))
form.addEventListener("submit", (e)=>{
    let messages= []

    console.log("obj of formData: \n");
    for(let obj of formData){
        console.log(obj);



    }

    if(messages.length > 0){
        e.preventDefault()
    }

    
})
