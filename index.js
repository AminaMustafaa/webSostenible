import express from "express";
import fs, { read } from "fs"; //treballar amb arxius
import bodyParser from "body-parser"; //Ho afegim per entendre que estem rebent un json des de la petició post.
import cors from "cors";
import { fileURLToPath } from "url";
import { dirname, join } from "path";
//db imports
import Database from 'better-sqlite3';

const db = new Database('./database/items.db');

//to use an absolute route for the json datan file
const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);


//application object
const PORT = 3001;
const app = express();
app.use(bodyParser.json());
app.use(cors());

/*
//to read JSOn file data
const readData=()=>{
    try {
        //using absolute route for data
        const data = fs.readFileSync(join(__dirname, 'db.json'));

        //const data=fs.readFileSync("./db.json");
        //console.log(data);
        //console.log(JSON.parse(data));
        return JSON.parse(data); //parse converts strinf into object 
    } catch(error){
        console.log(error);
    }
};

//funciton to write into
const writeData=(data)=>{
    try {
        fs.writeFileSync(join(__dirname,'db.json'),JSON.stringify(data));
        //fs.writeFileSync("./db.json", JSON.stringify(data));
    } catch(error){
        console.log(error);
    }
};

//Funció per llegir la informació
//readData();


//-------------------------------------------------
// ------- API ENDPOINTS USING JSON FILE ----------
//-------------------------------------------------


// ENDPOINT for GET -> to get all the items
app.get("/items", (req,res) => {
    const data= readData();
    res.json(data.items);
});

// ENDPOINT for GET with id-> to get the item by a specifc id
app.get("/items/:id",(req,res) => {
    const data = readData();
    const id = parseInt(req.params.id);
    const item = data.items.find((i) => i.id === id);
    res.json(item);
});

// ENDPOINT for POST -> to CREATE a new item
app.post("/items", (req,res) => {
    const data = readData();
    const body = req.body;
    const newItem = {
        id:data.items[data.items.length-1].id+1,
        ...body,
    };
    data.items.push(newItem);
    writeData(data);
    res.json(newItem);
});

// ENDPOINT for PUT with id -> to UPDATE a specific item
app.put("/items/:id", (req,res) => {
    const data = readData();
    const body = req.body;
    const id = parseInt(req.params.id);
    const itemIndex = data.items.findIndex((i) => i.id === id);
    data.items[itemIndex] = {
        ...data.items[itemIndex],
        ...body,
    };
    writeData(data);
    res.json({ message: "Item updated successfully."})
});

// ENDPOINT for DELETE with id -> to DELETE a specific item
app.delete("/items/:id", (req,res) => {
    const data = readData();
    const id = parseInt(req.params.id);
    const itemIndex = data.items.findIndex((i) => i.id === id);
    data.items.splice(itemIndex,1);
    writeData(data);
    res.json({ message: "Item delete successfully."})

});

// ENDPOINT for POST (requests)-> to move an item in the requested items
app.post("/requests", (req,res) => {
    const data = readData();
    const body = req.body;
    const reqItemid = data.requests.length === 0 ? 1: data.requests[data.requests.length-1].id+1;
    const reqItem = {
        id: reqItemid,
        status: "pending",
        date: new Date().toISOString().split("T")[0],
        ...body,
    };
    data.requests.push(reqItem);

    writeData(data);
    res.json({ message: "Item requested successfully."})

});

*/

//----------------------------------------------------------------
// ------- API ENDPOINTS USING LOCALLY CREATED DATABASE ----------
//----------------------------------------------------------------


// GET all items
app.get("/items", (req,res) => {
    const items = db.prepare("SELECT * FROM items").all();
    res.json(item);
});

// GET single item by id
app.get("/items/:id", (req,res) => {
    const item = db.prepare("SELECT * FROM items WHERE id= ? ")
    .get(req.params.id);
    res.json(items);
});

// POST create new item
app.post("/items", (req,res) => {
    const b = req.body;
    const stmt = db.prepare(`
        INSERT INTO items(title,description,category,neighbourhood,owner_name,
        owner_email,available,image_url,times_lent,date_posted)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`)
    const result = stmt.run(
        b.title,b.description,b.category, b.condition, b.neighbourhood,
        b.owner_name, b.owner_email,b.available ? 1:0, b.image_url,
        b.times_lent ?? 0,
        b.date_posted ?? new Date().toISOString().split("T")[0]
    );
    res.json( {id: result.lastInsertRowid,
        ...b
    });
});

// PUT update item
app.put("/items/:id", (req, res) => {
    const b = req.body;
    db.prepare(`UPDATE items SET title=?, description=?, category=?, condition=?,
        neighbourhood=?, owner_name=?, owner_email=?, available=?, image_url=?
        WHERE id=?`).run(
        b.title, b.description, b.category, b.condition, b.neighbourhood,
        b.owner_name, b.owner_email, b.available ? 1 : 0, b.image_url,
        req.params.id
    );
    res.json({ message: "Item updated successfully." });
});

// DELETE item
app.delete("/items/:id", (req, res) => {
    db.prepare("DELETE FROM items WHERE id = ?").run(req.params.id);
    res.json({ message: "Item delete successfully." });
});


//port
app.listen(PORT, ()=> {
    console.log(`Server listing on port ${PORT}`);
});