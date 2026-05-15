//-----------------------------------------------------------
//----------------- CRUD : GET(specific- item) --------------
//-----------------------------------------------------------
// 1. read the id from the URL
const params = new URLSearchParams(window.location.search);
const id = params.get("id");
const url = `http://localhost:3000/items/${id}`;
/*
// 2. fetch the item to delet it later on
async function getItem(){
    try{
        const response = await fetch(url);
        if(!response.ok){
            throw new Error(`Error ${response.status}: ${response.statusText}`);
        }

        const item = await response.json();
        if(item) {
            renderItem(item);
        } else {
            console.log("Item not found");
        }

    } catch(error){
        console.log(error);
    }
}
// 3. show item info on the page
function renderItem(item) {
    const mainItem = document.getElementById("item-detail");
    mainItem.innerHTML = `
        <img src="${item.image_url}" alt="${item.title}">
        <h3> Titulo: ${item.title} </h3>
        <p> Categoria: ${item.category} <br>
            Descripcion: ${item.description} <br>
            Condicion: ${item.condition} <br>
            
            Disponibilidad: ${item.available ? "Disponible" : "No disponible"} <br>
            Fecha de publicación: ${item.date_posted} <br>
            Veces prestado: ${item.times_lent} veces <br>

            Barrio: ${item.neighbourhood} <br>
            Nombre Propietario: ${item.owner_name} <br>
            Correo: ${item.owner_email} <br>
        </p> 
    `;

}
    */
// 4. to delete the item
document.getElementById("delete-btn").addEventListener("click", async () => {
    const confirm = window.confirm("Seguro que quieres eliminar este artículo?");
    if (!confirm) return;

    try {
        const response = await fetch(url, {
            method: "DELETE"
        });

        if (response.ok) {
            alert("Articulo eliminado correctamente!");
            window.location.href = "../pages/explorar.html";
        }
    } catch (error) {
        console.log(error);
    }
});

getItem();