CREATE VIEW vista_items AS SELECT
  `productos_x_pedido`.`pedido`,
  `productos_x_pedido`.`producto`,
  `productos`.`nombre` AS `nombproducto`,
  `unidad_medida`.`simbolo` AS `unidmedprod`,
  `productos_x_pedido`.`cantidad`,
  `productos_x_pedido`.`subtotal`
FROM
  `productos_x_pedido`
LEFT JOIN `productos` ON `productos_x_pedido`.`producto` = `productos`.`id`
LEFT JOIN `unidad_medida` ON `productos`.`unidadmedidaventas` = `unidad_medida`.`id`;