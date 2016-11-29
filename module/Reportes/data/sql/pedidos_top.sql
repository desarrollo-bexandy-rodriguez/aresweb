SELECT
 `productos`.`nombre`,
 SUM(`productos_x_pedido`.`cantidad`) AS `cantidad`
FROM
  `productos_x_pedido`
  LEFT JOIN
  `productos` ON `productos`.`id` = `productos_x_pedido`.`producto`
  LEFT JOIN
  `pedidos` ON `pedidos`.`id` = `productos_x_pedido`.`pedido`
  WHERE
 `pedidos`.`estatus` = 4 AND `pedidos`.`fecha` BETWEEN '2016-11-01' AND '2016-11-16'
GROUP BY `productos`.`nombre` ORDER BY `cantidad` DESC LIMIT 20