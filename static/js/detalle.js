//-----------------------------------------------------------
//----------------- CRUD : GET(specific- item) --------------
//-----------------------------------------------------------
// 1. read the id from the URL
const params = new URLSearchParams(window.location.search);
const id = params.get("id");
//const url = `http://localhost:3000/items/${id}`;
const url = `${API_URL}/items/${id}`;
let oneItem = [];

// 2. fetch just that one item
async function getItem(id) {
    try{

        const response = await fetch(url);
        if(!response.ok){
            throw new Error(`Error ${response.status}: ${response.statusText}`);
        }

        const data = await response.json();
        if(data){
            oneItem = data;
            renderDetail(oneItem);
        } else {
            console.log("Item not found");
        }

    } catch(error) {
        console.log(error);
    }
}

// 3. render full detail
function renderDetail(item) {

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
        <button onclick="window.location.href='/views/users/modificar.php?id=${item.id}'"> Modificar</button>
        <button id="delete-btn">Eliminar</button>
    `;

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
                window.location.href = "/views/users/explorar.php";
            }
        } catch (error) {
            console.log(error);
        }
    });

}



getItem(id);