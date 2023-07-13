SELECT id,nombre, stock
FROM productos
WHERE stock = (SELECT MAX(stock) FROM productos);

