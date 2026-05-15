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
document.getElementById("email").addEventListener("blur", function(event) {
    if(!this.checkValidity()){
        event.preventDefault();
        document.getElementById("errorEmail").innerText = "Introduce un correo correcto.";
    } else {
        document.getElementById("errorEmail").innerText = "";
    };
});
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
    // 1 — read all input values
    const titulo = document.getElementById("title").value;
    const image = document.getElementById("image").value;
    const category = document.getElementById("category").value;
    const description = document.getElementById("description").value;
    const condition = document.getElementById("condition").value;
    const disponibilidad = document.getElementById("available").value;
    const barrio = document.getElementById("address").value;
    const ownerName = document.getElementById("name").value;
    const correo = document.getElementById("email").value;

    // 2 — validate before sending (stop if anything is empty)
    if(titulo === "" || category === "" || condition === "" || 
       description === "" || barrio === "" || ownerName === "" || correo === "") {
        alert("Por favor rellena todos los campos.");
        return;  // stops the function here if invalid
    }

    // 3 — build newItem object
    const newItem = {
        title: titulo,
        image_url: image,
        category: category,
        description: description,
        condition: condition,
        available: disponibilidad === "true", // converts string to boolean
        neighbourhood: barrio,
        owner_name: ownerName,
        owner_email: correo,
        times_lent: 0,              // always 0 for a new item
        date_posted: new Date().toISOString().split("T")[0]  // today
    };

    // 4 — fetch POST 
    try {
        const response = await fetch("http://localhost:3000/items", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(newItem)
            
        });

        if(response.ok) {
            // 5 — success: show message and redirect
            alert("Artículo subido correctamente!");
            window.location.href = "../pages/explorar.html";
        }
    } catch(error) {
        console.log(error);
    }
    

});
