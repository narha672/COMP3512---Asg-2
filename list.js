document.addEventListener("DOMContentLoaded",function(){  
    const url='http://localhost/asg2/COMP3512---Asg-2/api-companies.php';

    //loading local storage  
    let localData;
    if (localStorage.getItem('companies') == null && localStorage.getItem('companies')!='') {
        fetch(url)
            .then(response => {
                return response.json();
            })
            .then(data => {
                localStorage.setItem('companies',JSON.stringify(data));
                localData = localStorage.getItem('companies');
                field();
            })
            .catch(function (error) {
                console.log(error)
            });
    } 
    else {
        localData = localStorage.getItem('companies');
        field();
    }
                

    //list of companies
    function field(filter=''){
        let ul = document.getElementById("StockList");
        ul.innerHTML = "";
        let companies = [];
        document.querySelector(".b section").style.display = "block";
        companies = JSON.parse(localData);

        //filter
        if (filter!=''){
            let filterItems = (filter) => {
                return companies.filter(el => el.symbol.startsWith(filter));
            };
            companies= filterItems(filter);
        }
        
        //logo and image 
        for (let i = 0; i < companies.length; i++) {
            let ul = document.getElementById("StockList");
            let li = document.createElement("li");
            let img = document.createElement('img');
                img.src = './logos/' + companies[i].symbol + '.svg';
                img.className ='divImg';
            let hr = document.createElement('hr');
            let dv = document.createElement('div');
            let spn = document.createElement('span');
            let lnk = document.createElement('a');
            let linkText = document.createTextNode(companies[i].symbol);

            lnk.appendChild(img); 
            // symbol is added to logo
            lnk.appendChild(linkText);
            dv.className='box b';
            spn.appendChild(lnk);
            dv.appendChild(spn);
            li.appendChild(hr);
            li.appendChild(dv);
            ul.appendChild(li);
            if (companies[i].symbol != null){
                    dv.addEventListener('click',function(){
                        fetchCompData(companies[i].symbol);                    
                        fetchCompDatachart(companies[i].symbol);
                    });
            }
        }
    }   

    //checks for stored data is local storage after symbol is passed 
    function fetchCompData(comp){
        let companyURL= "api-companies.php?symbol=" + comp;
        var companyLocalData= localStorage.getItem("["+comp+"]");
        if (companyLocalData==null || companyLocalData=='') {
                //fetches the url using link
                getCompany(companyURL);
                async function getCompany(companyURL) {
                try {
                    let data = await fetch(companyURL);
                    let copmanyData = await data.json(); 
                    companyLocalData = JSON.stringify(copmanyData );
                    localStorage.setItem("["+comp+"]",companyLocalData);                    
                    await fetchCompData(comp);
            
                } catch (e) {
                    console.error(e);
                }
                }
        } 
        else {
            companyLocalData = localStorage.getItem("["+comp+"]"); //Data is found
            showInformation(companyLocalData);
        } 
    }
         
    
    btnGo.addEventListener('click', function() {
        //document.getElementById("filterList").value ="";
        var filter = document.getElementById("filterList").value;
        console.log(filter);
        field(filter);
    })
        
    btnClear.addEventListener('click', function() {
        document.getElementById("filterList").value ="";
        field();
    }) 
});