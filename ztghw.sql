SELECT * FROM ztghw.productos;

SELECT id, nombre,stock FROM ztghw.productos
WHERE id=6;

INSERT INTO ztghw.productos (id,nombre,precio,descripcion)
VALUES (1, "Auris", 18000, "Auris 1");

ALTER TABLE ztghw.productos ADD stock INT;
ALTER TABLE ztghw.productos DROP COLUMN stock;

ALTER TABLE ztghw.productos ADD destacado boolean;

UPDATE ztghw.productos
SET categoria = 'Auriculares'
WHERE id = 1;

ALTER TABLE ztghw.productos ALTER COLUMN destacado SET DEFAULT FALSE;


INSERT INTO ztghw.productos (id,nombre,precio,descripcion,categoria,destacado)
VALUES (141, "Auricular Inalámbrico JBL Sport Pure Bass Ows 80 (imitación)", 19800, " ","Auriculares",TRUE);
INSERT INTO ztghw.productos (id,nombre,precio,descripcion,categoria,destacado)
VALUES (136, "Auricular Inalámbrico Netmak Volt", 35600, " ","Auriculares",TRUE);
INSERT INTO ztghw.productos (id,nombre,precio,descripcion,categoria,destacado)
VALUES (125, "Auricular Gamer GTC Headset Eclipse", 25800, " ","Auriculares",TRUE);
INSERT INTO ztghw.productos (id,nombre,precio,descripcion,categoria,destacado)
VALUES (123, "Lentes Realidad Virtual para Celular | VR BOX", 13000, " ","Otros",TRUE);

DELETE FROM ztghw.productos
WHERE id=73;


update ztghw.productos set destacado=TRUE
where id=135;

update ztghw.productos SET stock=100
where id=27;
