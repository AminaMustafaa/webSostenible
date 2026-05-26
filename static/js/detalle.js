//-----------------------------------------------------------
//----------------- CRUD : GET(specific- item) --------------
//-----------------------------------------------------------
// 1. read the id from the URL
const params = new URLSearchParams(window.location.search);
const id = params.get("id");
//const url = `http://localhost:3002/items/${id}`;
//const url = `${API_URL}/items/${id}`;
const url    = `/controllers/itemController.php/items/${id}`;


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
    const isAdmin = window.currentUserRole === 'admin';
    const isOwner = window.currentUserEmail && window.currentUserEmail === item.owner_email;
    const canEdit = isAdmin || isOwner;

    const mainItem = document.getElementById("item-detail");
    mainItem.innerHTML = `
        
        <img src="${item.image_url}" alt="${item.title}" style="max-width:300px;">
        <h3> Titulo: ${item.title} </h3>
        <p> 
            Categoria: ${item.category} <br>
            Descripcion: ${item.description} <br>
            Condicion: ${item.condition} <br>
            
            Disponibilidad: ${item.available ? "Disponible" : "No disponible"} <br>
            Fecha de publicación: ${item.date_posted} <br>
            Veces prestado: ${item.times_lent} veces <br>

            Barrio: ${item.neighbourhood} <br>
            Nombre Propietario: ${item.owner_name} <br>
            Correo: ${item.owner_email} <br>
        </p> 
        
        ${canEdit ? `
        <button onclick="window.location.href='/views/users/modificar.php?id=${item.id}'">Modificar</button>
        <button id="delete-btn" style="background:#c0392b;color:white;"> Eliminar</button>
        ` : ''}
    
    `;

    // 4. to delete the item
    if (canEdit) {
        document.getElementById("delete-btn").addEventListener("click", async () => {
            if (!confirm("¿Seguro que quieres eliminar este artículo?")) return;
            try {
                const response = await fetch(url, { method: "DELETE" });
                const data = await response.json();
                if (response.ok) {
                    alert("Artículo eliminado correctamente.");
                    window.location.href = "/views/users/explorar.php";
                } else {
                    alert(data.error || "Error al eliminar");
                }
            } catch (error) {
                console.log(error);
            }
        });
    }

}



getItem(id);