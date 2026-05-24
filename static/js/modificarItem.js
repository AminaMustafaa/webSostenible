//-----------------------------------------------------------
//------------------------- CRUD : PUT ----------------------
//-----------------------------------------------------------
// 1. read the id from the URL
const params = new URLSearchParams(window.location.search);
const id = params.get("id");
//const url = `http://localhost:3000/items/${id}`;
const url = `${API_URL}/items/${id}`;


// 2. fetch the item to modify it later on
async function getItem(){
    try{
        const response = await fetch(url);
        if(!response.ok){
            throw new Error(`Error ${response.status}: ${response.statusText}`);
        }

        const item = await response.json();
        if(item) {
            fillForm(item);  
        } else {
            console.log("Item not found");
        }

    } catch(error){
        console.log(error);
    }
}

// 3. fill each form field with the item's current data
function fillForm(item) {
    document.getElementById("title").value       = item.title;
    document.getElementById("image").value       = item.image_url;
    document.getElementById("category").value    = item.category;
    document.getElementById("description").value = item.description;
    document.getElementById("condition").value   = item.condition;
    document.getElementById("available").value   = item.available ? "true" : "false";
    document.getElementById("address").value     = item.neighbourhood;
    document.getElementById("name").value        = item.owner_name;
    document.getElementById("email").value       = item.owner_email;
}

// 4. on submit, send PUT with updated values
document.getElementById("modify-btn").addEventListener("click", async () => {
    const updatedItem = {
        title:        document.getElementById("title").value,
        image_url:    document.getElementById("image").value,
        category:     document.getElementById("category").value,
        description:  document.getElementById("description").value,
        condition:    document.getElementById("condition").value,
        available:    document.getElementById("available").value === "true",
        neighbourhood: document.getElementById("address").value,
        owner_name:   document.getElementById("name").value,
        owner_email:  document.getElementById("email").value,
    };

    if (!updatedItem.title || !updatedItem.category || !updatedItem.description) {
        alert("Por favor rellena todos los campos.");
        return;
    }

    try {
        const response = await fetch(url, {
            method: "PUT",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(updatedItem)
        });

        if (response.ok) {
            alert("Articulo modificado correctamente!");
            window.location.href = `../pages/detalle.php?id=${id}`;
        }
    } catch (error) {
        console.log(error);
    }
});

getItem();