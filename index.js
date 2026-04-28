import express from "express";
import fs, { read } from "fs"; //treballar amb arxius
import bodyParser from "body-parser"; //Ho afegim per entendre que estem rebent un json des de la petició post.
import cors from "cors";

//application object
const PORT = 3000;
const app = express();
app.use(bodyParser.json());
app.use(cors());

//to read JSOn file data
const readData=()=>{
    try{
        const data=fs.readFileSync("./db.json");
        //console.log(data);
        //console.log(JSON.parse(data));
        return JSON.parse(data); //parse converts strinf into object 
    } catch(error){
        console.log(error);
    }
};

//funciton to write into
const writeData=(data)=>{
    try{
        fs.writeFileSync("./db.json", JSON.stringify(data));
    }catch(error){
        console.log(error);
    }
};

//Funció per llegir la informació
//readData();

// ------- API ENDPOINTS ----------

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
app.post("/items/:id", (req,res) => {
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
app.put("/items:id", (req,res) => {
    const data = readData();
    const body = req.body;
    const id = parseInt(req.params.id);
    const itemIndex = data.items.findIndex((i) => i.id === id);
    data.item[itemIndex] = {
        ...data.item[itemIndex],
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

//
app.listen(PORT, ()=> {
    console.log(`Server listing on port ${PORT}`);
});