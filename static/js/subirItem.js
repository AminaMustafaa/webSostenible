//-----------------------------------------------------------
//----------------- CRUD : POST -----------------------------
//-----------------------------------------------------------
// ----------------- FROM VALIDATION CHECKS -----------------
document.getElementById("title").addEventListener("blur", function(event) {
    if(!this.checkValidity()){
        document.getElementById("errorTitle").innerText = "Introduce su nombre, minimu 3 characters.";
    } else {
        document.getElementById("errorTitle").innerText = "";
    };
});
document.getElementById("description").addEventListener("blur", function(event) {
    if(!this.checkValidity()){
        document.getElementById("errorDescription").innerText = "Introduce un poco de descripcion de item";
    } else {
        document.getElementById("errorDescription").innerText = "";
    };
});
/*
document.getElementById("email").addEventListener("blur", function(event) {
    if(!this.checkValidity()){
        event.preventDefault();
        document.getElementById("errorEmail").innerText = "Introduce un correo correcto.";
    } else {
        document.getElementById("errorEmail").innerText = "";
    };
});*/
document.getElementById("category").addEventListener("blur", function(event) {
    if(!this.checkValidity()){
        event.preventDefault();
        document.getElementById("errorCategory").innerText = "Elije una categoria";
    } else {
        document.getElementById("errorCategory").innerText = "";
    };
});
document.getElementById("condition").addEventListener("blur", function(event) {
    if(!this.checkValidity()){
        event.preventDefault();
        document.getElementById("errorCondition").innerText = "Elije condicion de item";
    } else {
        document.getElementById("errorCondition").innerText = "";
    };
});

// ----------------------------------------------------

document.getElementById("post-item").addEventListener("click", async () => {
    // 1 read all input values
    const titulo = document.getElementById("title").value;
    const image = document.getElementById("image").value;
    const category = document.getElementById("category").value;
    const description = document.getElementById("description").value;
    const condition = document.getElementById("condition").value;
    const disponibilidad = document.getElementById("available").value;
    const barrio = document.getElementById("address").value;
  

    // 2 validate before sending (stop if anything is empty)
    if(titulo === "" || category === "" || condition === "" || 
       description === "" || barrio === "" ) {
        alert("Por favor rellena todos los campos.");
        return; 
    }

    // 3 build newItem object
    const newItem = {
        title:         titulo,
        image_url:     image,
        category:      category,
        description:   description,
        condition:     condition,
        available:     disponibilidad === "true",
        neighbourhood: barrio,
        times_lent:    0,
        date_posted:   new Date().toISOString().split("T")[0]
        // owner_name and owner_email are filled from the server-side (from the JWT)
    };

    // 4  fetch POST 
    try {
        const response = await fetch( /* `${API_URL}/items`, */ `/controllers/itemController.php/items`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(newItem)
            
        });

        const data = await response.json();
        if (response.ok) {
            alert("¡Artículo subido correctamente!");
            window.location.href = "/views/users/explorar.php";
        } else {
            alert(data.error || "Error al subir el artículo");
        }
        
    } catch(error) {
        console.log(error);
        alert("Error de conexión");
    }
    

});
