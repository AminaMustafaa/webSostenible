//API'S GET Endpoint created in request.http file
const url = "http://localhost:3000/items";
//empty array to store all items
let allItems = []; 

// 1 — fetch all items on load
async function getItems(){
    
    try{
        const response = await fetch(url);
       
        if(!response.ok){
           throw new Error(`Error ${response.status}: ${response.statusText}`);
        }

        const data = await response.json();
        if(data) {
            //console.log(data);
            allItems = data;
        } else {
            console.log("There are no items.")
        }

    } catch(error){
        console.log("Error in getting thedata from Json file", error)
    }

};

// 2 — render items to the DOM
function renderItems(items){
    const mainItems = document.getElementById("items-container");
    mainItems.innerHTML = "";
    items.forEach((item) => {
        const singleItem = creatCard(item);
        mainItems.appendChild(singleItem);
    });
}

// 3 — build one card
function creatCard(item){
    //creating main div
    const itemDiv = document.createElement("div");
    itemDiv.classList.add("item-div");
    itemDiv.innerHTML = `
        <img src="${item.image_url}" alt="${item.title}">
        <h3> ${item.title} </h3>
        <p> ${item.category} <br>
            ${item.condition} <br>
            ${item.available} <br>
        </p> 
    `;
    return itemDiv;
}

// 4 — filter function
function filterItems(){
    const searchBar = document.getElementById("site-search");
    const searchBarInput = searchBar.value;
    const filterArray = () => {
        allItems.filter((item) => item.title.includes(searchBarInput));
        
    }
}
