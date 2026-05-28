//-----------------------------------------------------------
//----------------- CRUD : GET (all) ------------------------ 
//-----------------------------------------------------------
//API'S GET Endpoint created in request.http file
//const url = "http://localhost:3000/items";
//const url = `${API_URL}/items`;
//const url = "http://localhost:3002/items";

const url = "/controllers/itemController.php";
//empty array to store all items
let allItems = []; 

// 1. fetch all items on load
async function getItems(){

    console.log("Fetching from:", url);

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

    } catch (error) {
        console.error("Error fetching items:", error);
        document.getElementById("items-container").innerHTML =
            "<p>Error al cargar los artículos. Asegúrate de que el servidor está en marcha.</p>";
    }
    
};

// 2. render items to the DOM
function renderItems(items){
    const mainItems = document.getElementById("items-container");
    mainItems.innerHTML = "";

    if (!items.length) {
        mainItems.innerHTML = "<p class='no-results'>No se encontraron artículos.</p>";
        return;
    }
    items.forEach((item) => {
        const singleItem = creatCard(item);
        mainItems.appendChild(singleItem);
    });
}

// 3. build one card
function creatCard(item){
    //creating main div
    const itemDiv = document.createElement("div");
    itemDiv.classList.add("item-div");
    const available = parseInt(item.available) === 1;
    itemDiv.innerHTML = `
        <img src="${item.image_url}" alt="${item.title}">
        <h3> Titulo: ${item.title} </h3>
        <p> 
            Categoria: ${item.category} <br>
            Condicion:  ${item.condition} <br>
            Disponibilidad: ${item.available ? "Disponible" : "No disponible"} <br>
        </p> 
    `;
    //event listener to show the details of a specific item
    itemDiv.addEventListener("click", () => {
        window.location.href = `/views/users/detalle.php?id=${item.id}`;
    });
    return itemDiv;
}

function filterItems() {
    const search    = document.getElementById("site-search").value.toLowerCase();
    const category  = document.getElementById("category").value;
    const condition = document.getElementById("condition").value;

    const filtered = allItems.filter(item =>
        item.title.toLowerCase().includes(search) &&
        (category  === "" || item.category  === category)  &&
        (condition === "" || item.condition === condition)
    );
    renderItems(filtered);
}

document.getElementById("site-search").addEventListener("input",  filterItems);
document.getElementById("category").addEventListener("change",    filterItems);
document.getElementById("condition").addEventListener("change",   filterItems);

// Pre-select category from URL ?category=ropa
async function init() {
    await getItems();                               
    const params = new URLSearchParams(window.location.search);
    const precat = params.get("category");
    if (precat) {
        document.getElementById("category").value = precat;
        filterItems();
    }
}

init();
