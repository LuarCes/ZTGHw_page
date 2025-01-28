SELECT * FROM ztghw.productos;

INSERT INTO ztghw.productos (id,nombre,precio,descripcion)
VALUES (1, "Auris", 18000, "Auris 1");

ALTER TABLE ztghw.productos ADD categoria VARCHAR(15);

ALTER TABLE ztghw.productos ADD destacado boolean;

UPDATE ztghw.productos
SET categoria = 'Auriculares'
WHERE id = 1;

ALTER TABLE ztghw.productos ALTER COLUMN destacado SET DEFAULT FALSE;


INSERT INTO ztghw.productos (id,nombre,precio,descripcion,categoria,destacado)
VALUES (3, "Mouse", 15000, "Un mouse","Mouse",TRUE);

