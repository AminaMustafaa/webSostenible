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
            renderItems(allItems);
        } else {
            console.log("There are no items.");
        }

    } catch(error){
        console.log("Error in getting thedata from Json file", error);
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
        <h3> Titulo: ${item.title} </h3>
        <p> Categoria: ${item.category} <br>
            Condicion:  ${item.condition} <br>
            Disponibilidad: ${item.available ? "Disponible" : "No disponible"} <br>
        </p> 
    `;
    //event listener to show the details of a specific item
    itemDiv.addEventListener("click", () => {
        window.location.href = `../pages/detalle.html?id=${item.id}`;
    });
    return itemDiv;
}

// 4 — filter function
function filterItems(){
    const searchBar = document.getElementById("site-search").value.toLowerCase();
    const categoryInput = document.getElementById("category").value;
    const conditionInput = document.getElementById("condition").value;

    const filtered = allItems.filter((item) => {
        const matchSearch = item.title.toLowerCase().includes(searchBar);
        // "" -> in case the section is empty
        const matchCategory = categoryInput === "" || item.category === categoryInput;
        const matchCondition = conditionInput === "" || item.condition === conditionInput;

        return matchSearch && matchCategory && matchCondition;
    });

    renderItems(filtered); 
}

document.getElementById("site-search").addEventListener("input", filterItems);
document.getElementById("category").addEventListener("change", filterItems);
document.getElementById("condition").addEventListener("change", filterItems);

getItems();
