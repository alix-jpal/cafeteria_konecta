SELECT productos.id, productos.nombre, ventas.cantidad
FROM ventas
INNER JOIN productos ON productos.id = ventas.id_producto
GROUP BY productos.id, productos.nombre, ventas.cantidad
ORDER BY SUM(ventas.cantidad) DESC
LIMIT 1;