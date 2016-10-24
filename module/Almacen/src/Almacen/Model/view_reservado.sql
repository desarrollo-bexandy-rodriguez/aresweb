CREATE `view_reservado` AS
SELECT
  `productos_x_pedido`.`producto`,
  `pedidos`.`idalmacen`,
  SUM(`productos_x_pedido`.`cantidad`) AS `reservado`,
  `pedidos`.`estatus`
FROM
  `productos_x_pedido`
LEFT JOIN `pedidos` ON `productos_x_pedido`.`pedido` = `pedidos`.`id`
WHERE `pedidos`.`estatus`= 2
GROUP BY `productos_x_pedido`.`producto`,`pedidos`.`estatus`, `pedidos`.`idalmacen`