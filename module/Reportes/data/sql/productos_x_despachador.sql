SELECT
  `users`.`displayName`,
  `productos_x_pedido`.`producto`,
  `productos`.`nombre`,
  SUM(`productos_x_pedido`.`cantidad`),
  SUM(`productos_x_pedido`.`subtotal`)
FROM
  `productos_x_pedido`
  LEFT JOIN `productos` ON `productos_x_pedido`.`producto` = `productos`.`id`
  LEFT JOIN `pedidos` ON `productos_x_pedido`.`pedido` = `pedidos`.`id`
  LEFT JOIN `users` ON `pedidos`.`despachador` = `users`.`id`
  WHERE `pedidos`.`estatus` = 4
GROUP BY `users`.`displayName`, `productos_x_pedido`.`producto`