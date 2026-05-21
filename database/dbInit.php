<?php

require_once __DIR__ . '/../includes/dbOpenConn.php';

$db->exec("CREATE TABLE IF NOT EXISTS items (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    description TEXT,
    category TEXT,
    condition TEXT,
    neighbourhood TEXT,
    owner_name TEXT,
    owner_email TEXT,
    available INTEGER DEFAULT 1,
    image_url TEXT,
    date_posted DATE DEFAULT CURRENT_DATE,
    times_lent INTEGER DEFAULT 0
)");

$db->exec("CREATE TABLE IF NOT EXISTS requests (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    status TEXT DEFAULT 'pending',
    date DATE DEFAULT CURRENT_DATE,
    item_id INTEGER,
    requester_name TEXT,
    requester_email TEXT
)");

$db->exec("
INSERT OR IGNORE INTO items (title, description, category, condition, neighbourhood, owner_name, owner_email, available, image_url, times_lent) VALUES
('Taladro percutor Bosch', 'Taladro percutor con maletín y set de brocas incluido. Perfecto para colgar cuadros, montar muebles o pequeñas obras en casa.', 'herramientas', 'como nuevo', 'Gràcia barcelona', 'Marc Puig', 'marc.puig@email.com', 0, 'https://images.unsplash.com/photo-1504148455328-c376907d081c?w=400', 3),
('Sierra de mano Stanley', 'Sierra de mano profesional, hoja de 500mm. Ideal para cortar madera, tablones o ramas gruesas. En perfecto estado.', 'herramientas', 'bueno', 'Sants', 'Jordi Mas', 'jordi.mas@email.com', 1, 'https://images.unsplash.com/photo-1572981779307-38b8cabb2407?w=400', 1),
('Escalera plegable de aluminio', 'Escalera plegable de aluminio de 3 peldaños. Ligera y fácil de transportar. Perfecta para trabajos en el hogar.', 'herramientas', 'usado', 'Eixample', 'Rosa Vila', 'rosa.vila@email.com', 1, 'https://images.unsplash.com/photo-1601598851547-4302969d0614?w=400', 5),
('Chaqueta de invierno talla M', 'Chaqueta impermeable de invierno, talla M. Color azul marino. Usada dos temporadas, en muy buen estado.', 'ropa', 'bueno', 'Gràcia', 'Amina', 'amina@email.com', 1, 'https://images.unsplash.com/photo-1539533018447-63fcce2678e3?w=400', 0),
('Vestido de fiesta talla S', 'Vestido largo de fiesta color negro, talla S. Usado una sola vez para una boda. Está como nuevo.', 'ropa', 'como nuevo', 'Sant Martí', 'Laura Ferrer', 'laura.ferrer@email.com', 1, 'https://images1.vinted.net/t/05_01d13_MLcmjUAdFLcCc8ptTUHgYbNH/310x430/1777304582.webp?s=6e4ead22c4b1022a5cfdfb9414f9c53f10cf7852', 0),
('Abrigo de lana talla L', 'Abrigo de lana gris, talla L. Muy calentito, ideal para el invierno. Lavado en seco antes de prestarlo.', 'ropa', 'usado', 'Horta', 'Pere Soler', 'pere.soler@email.com', 0, 'https://i.etsystatic.com/31032267/r/il/7fb858/3877216407/il_570xN.3877216407_gy3o.jpg', 2),
('A Little Life', 'A deeply moving novel by Hanya Yanagihara following the lives of four friends in New York City. Hardcover edition, excellent condition.', 'libros', 'como nuevo', 'Gràcia', 'Lucas Sanz', 'lucas.sanz@email.com', 1, 'https://cdn.theatlantic.com/thumbor/4XT1RMIyHp7VhV5mdZG1PxZmAO4=/0x408:2448x2856/1080x1080/media/img/mt/2015/05/image23/original.jpg', 2),
('White Nights', 'Fyodor Dostoevsky short story about a dreamer in Saint Petersburg. Small vintage edition, pages slightly yellowed but readable.', 'libros', 'bueno', 'Poblenou', 'Elena Vidal', 'elena.vidal@email.com', 1, 'https://m.media-amazon.com/images/I/51lMJWnnRDL._AC_UF1000,1000_QL80_.jpg', 0),
('The Picture of Dorian Gray', 'Oscar Wilde classic philosophical novel. Beautiful clothbound cover. A must-read for fans of gothic fiction.', 'libros', 'como nuevo', 'Gothic', 'Marc Vila', 'marc.vila@email.com', 0, 'https://m.media-amazon.com/images/I/9194LINdhIL._AC_UF1000,1000_QL80_.jpg', 5),
('1984', 'George Orwell dystopian masterpiece. Anniversary edition with a foreword. Perfect for school or personal reading.', 'libros', 'bueno', 'Les Corts', 'Sara Gomez', 'sara.g@email.com', 1, 'https://www.polifemo.com/static/img/portadas/_visd_0000JPG03EXB.jpg', 3),
('Lámpara de pie nórdica', 'Lámpara de pie estilo nórdico, color blanco, 160cm de altura. Incluye bombilla LED. Perfecta para salón o dormitorio.', 'hogar', 'como nuevo', 'Sants', 'Jordi Mas', 'jordi.mas@email.com', 1, 'https://images.unsplash.com/photo-1507473885765-e6ed057f782c?w=400', 0),
('dff', 'a pendant by pendoraaAAAAAAAAAAAAAAAA', 'ropa', 'como nuevo', 'fff', 'ffff', 'ffff@gamil.com', 1, 'https://es.pandora.net/dw/image/v2/BFCR_PRD/on/demandware.static/-/Sites-pandora-master-catalog/default/dw80fde86d/productimages/main_rect_center/793983C01_RGB.jpg?q=70&sfrm=png&bgcolor=F7F7F7&sw=810', 0)
");

?>