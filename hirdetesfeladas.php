<form id="hirdetesfeladas_form" class="flex m-a flex-col main hirdetes-form" method="POST" enctype="multipart/form-data" onsubmit="kuldes();">
        <div>
            <h1 class="text-center">Hirdetésfeladás</h1>
        </div>
        <div class="flex justify-between mb-1 input-control">
            <span class="form-text">Hirdetés címe</span>
            <input class="form-input" type="text" name="cim" id="cim" class="" placeholder="Hirdetés címe" title="Speciális karakterek nem megengedettek.">
        </div>
        <div class="flex justify-between mb-1 input-control" id="kategoriak_select">
            <span class="form-text">Válassz kategóriát</span>
        </div>
        <div class="flex justify-between mb-1 input-control">
            <span class="form-text">Leírás</span>
            <textarea class="form-input" name="leiras" id="leiras" cols="30" rows="1" placeholder="Leírás a termékről"  title="Speciális karakterek nem megengedettek."></textarea>
        </div>
        <div class="flex justify-between mb-1 input-control">
            <span class="form-text">Email cím</span>
            <input class="form-input" type="text" name="email" id="email" class="" placeholder="email cím" title="Speciális karakterek nem megengedettek.">
        </div>
        <div class="flex justify-between mb-1 input-control">
            <span class="form-text">Telefonszám</span>
            <input class="form-input" type="text" name="mobil" id="mobil" class="" placeholder="Telefonszám" title="Speciális karakterek nem megengedettek.">
        </div>
        <div class="flex justify-between mb-1 input-control">
            <span class="form-text">Ár</span>
            <input class="form-input" type="number" name="ar" id="ar" placeholder="ár" class="" >
        </div>
        <div class="flex justify-between mb-1 input-control">
            <span class="form-text">Település</span>
            <input class="form-input" list="telepulesek" name="telepules" placeholder="Válassz települést" >
            <datalist id="telepulesek">

            </datalist>
        </div>
        <div class="flex justify-between mb-1 input-control">
            <label class="form-text" for="fokep">Főkép</label>
            <span class="form-input" style="height: 220px; border: none;">
                <label for="fokep" class="kep-button">Válassz képet</label>
                <input type="file" name="fokep" id="fokep" onchange="PreviewImage();" accept=".jpg, .jpeg, .png, .gif" >
                <div>
                    <img id="uploadPreview" style="max-height: 180px; margin-top: 12px;">
                </div>
                
            </span>
            
        </div>
        <div class="flex justify-between mb-1 input-control">
            <label class="form-text" for="kepek">További képek</label>
            <span class="form-input" style="height: 440px; border: none;">
                <label for="kepek" class="kep-button">Válassz képeket</label>
                <input type="file" name="kepek[]" id="kepek" onchange="PreviewImages(event);" accept=".jpg, .jpeg, .png, .gif" multiple required>
                <div id="uploadPreviews">

                </div>  
            </span>
        </div>
        <div id="hirdetes_adatok">
            <!-- Ide jönnek majd javascriptből a kiválasztott kategóriák adatai (inputok) -->
        </div>
        <input type="submit" class="form-submit" value="Hirdetésfeladás">
    </form>

<script>
    function PreviewImage(){
        document.getElementById("uploadPreview").src = "";
        var oFRreader = new FileReader();        
        oFRreader.readAsDataURL(document.getElementById("fokep").files[0]);

        oFRreader.onload = function (oFREvent){
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        }
        
    }
    function PreviewImages(event){
        var saida = document.getElementById("kepek");
        var quantos = saida.files.length;
        if(quantos > 10){
            alert("Csak 10 fájl választható ki.")
        }else{
            for(i=0; i<quantos; i++){
                var urls = URL.createObjectURL(event.target.files[i]);
                document.getElementById("uploadPreviews").innerHTML += 
                '<img src="'+urls+'" style="max-height: 120px; margin-right: 10px; margin-top:12px;">';
            }
        }
       
    }    
</script>


<script defer>

function kuldes(){  
    const formData = new FormData(document.getElementById("hirdetesfeladas_form"))
    const kat = ["objektiv","fenykepezogep"]
    if(document.getElementById("kategoriak").value==1){
        if(document.getElementById("fix_rekesz").checked){
            formData.append('min_rekesz',rekesz.value)
            formData.append('max_rekesz',rekesz.value)
        }
        if(document.getElementById("fix_fokusz").checked){
            formData.append('min_fokusztav',fokusztav.value)
            formData.append('max_fokusztav',fokusztav.value)
        }
    }
    
    
    console.log("obj of formData: \n");
    for(let obj of formData){
        console.log(obj);
    }
    
    
    fetch(`../server/s_kuldes.php`,{method:"POST",body:formData})
        .then(response => response.text())
       // .then(data => console.log(data))
      // window.location.href = "http://localhost/hirdetesek/"+kat[document.getElementById("kategoriak").value-1]+"/".$hirdetes_infok_id."/index.php"";


    }
    

    
</script>

<script defer src="js/fromvalidation.js"></script>
<script src="js/kategoriak.js"></script>
<script src="js/hirdetesfeladas.js"></script>
<script src="js/objektiv.js"></script>
<script src="js/telepules.js"></script>
<?php
        
?>
<!-- 
    Last edit 2022.04.04 22:14
-->