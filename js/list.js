var table = document.getElementById("list-table");
var tbody = document.getElementById("tbody");
var loading = document.getElementById("loading");
var symbol = document.getElementById("symbol");
var btnClear = document.getElementById("btn-clear");
var filterForm = document.getElementById("filter-form");
var zoom = document.getElementsByClassName("zoom");
var zoomDiv = document.getElementById("zoom-div");
var zoomImg = document.getElementById("zoom-image");

table.style.display = 'none';
loading.style.display = 'block';

var companies = [];
getCompaniesList();

filterForm.addEventListener("submit", function(event){
    event.preventDefault()
    getCompaniesList();
});

btnClear.addEventListener("click", function(event){
    symbol.value = '';
    getCompaniesList();
});

function getCompaniesList(){
    fetch('php/api-companies.php', {
        method: 'POST',
        body: new FormData(filterForm)
    })
    .then( res => res.json() )
    .then(response => {
        tableRows(response["data"])
    }) 
    .catch(error => console.error('Error:', error));
}

function tableRows(data){
    var innerHTML = '';
    let darker = false;
    for(var i = 0; i < data.length ; i++){
        var val = data[i];
        if (darker) {
            innerHTML += '<tr class="darker"><td class="td-logo"><img onmouseleave="hideBig(this)" onmouseenter="bigLogo(this)" src="img/logos/'+val.symbol+'.svg"></td><td><a href="single-company.php?symbol='+val.symbol+'">'+val.symbol+'</a></td><td>'+val.name+'</td></tr>';
            darker = false;
        } else {
            innerHTML += '<tr><td class="td-logo"><img onmouseleave="hideBig(this)" onmouseenter="bigLogo(this)" src="img/logos/'+val.symbol+'.svg"></td><td><a href="single-company.php?symbol='+val.symbol+'">'+val.symbol+'</a></td><td>'+val.name+'</td></tr>';
            darker = true;
        }
        
    }
    tbody.innerHTML = innerHTML;
    table.style.display = 'block';
    loading.style.display = 'none';
}

function bigLogo(event){
    zoomDiv.style.left = window.event.clientX+"px";
    zoomDiv.style.top = window.event.clientY+"px";
    zoomDiv.style.display = 'block';
    zoomImg.src = event.src;
}

function hideBig(event){
    zoomDiv.style.left = "0px";
    zoomDiv.style.top = "0px";
    zoomDiv.style.display = 'none';
    zoomImg.src = '';
}