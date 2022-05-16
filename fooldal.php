<script>
        fetch('server/s_list_hirdetes.php')
            .then(response => response.json())
            .then(data => renderHirdetesList(data))
            
        function renderHirdetesList(data){
            let returnStr = ``
            for(let obj of data){
                returnStr +=`
                        <a href="hirdetesek/objektivek/${obj.id}">
                                <div class="flex flex-row hirdetes-list-item" style="border: 2px solid var(--gray); ">
                                        <div class="m-r-1vw" style="width: 30%; text-align: center;">
                                                <img src="hirdetesek/objektivek/${obj.id}/img/${obj.fokepURL}" alt="Nincs meg a kép">
                                        </div>
                                        <div class="flex flex-col mx-10vw justify-between" style="width: 70%;">
                                                <span class="flex flex-row justify-between" style="color: var(--gray);">
                                                        <span>
                                                                <img class="sml-icon" style="max-height: 200px;" src="/img/waypoint.png" alt="">
                                                                ${obj.nev}
                                                        </span>
                                                        <span>
                                                                <img class="sml-icon" style="max-height: 200px;" src="/img/calendar.png" alt="">
                                                                ${obj.feladas_datum}
                                                        </span>  
                                                </span>
                                                <span class="hirdetes-list-cim flex flex-row">
                                                ${obj.cim}
                                                </span>
                                                <span class="hirdetes-list-ar">${obj.ar} HUF</span>
                                        </div>
                                </div>
                        </a>
                `
            }
            document.getElementById('hirdetes-list').innerHTML += returnStr
        }  
</script>
<div class="main hirdetes-list flex-row" id="hirdetes-list">
</div>