CREATE TABLE items_terraria (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    tipo VARCHAR(50) NOT NULL,     
    rareza INT NOT NULL,           
    dano INT DEFAULT 0,  
    descripcion VARCHAR(500),
    valor_venta DECIMAL(10, 2) DEFAULT 0.00 -- Monedas (1 platino = 10.00)
);