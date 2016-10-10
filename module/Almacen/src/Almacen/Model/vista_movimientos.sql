CREATE `vista_movimientos` AS
SELECT
  `movimiento_almacen`.`id`,
  `movimiento_almacen`.`idalmacenmayor`,
  `mayor`.`nombre` AS `nombmayor`,
  `movimiento_almacen`.`idalmacendetal`,
  `detal`.`nombre` AS `nombdetal`,
  `movimiento_almacen`.`idproducto`,
  `productos`.`nombre` AS `nombproducto`,
  `movimiento_almacen`.`cantidad`,
  `unidad_medida`.`simbolo` AS `unidmed`,
  `movimiento_almacen`.`fecha`,
  `movimiento_almacen`.`idusuario`
FROM
  `movimiento_almacen`
LEFT JOIN `almacen` AS `mayor` ON `movimiento_almacen`.`idalmacenmayor` = `mayor`.`id`
LEFT JOIN `almacen` AS `detal` ON `movimiento_almacen`.`idalmacendetal` = `detal`.`id`
LEFT JOIN `productos` ON `movimiento_almacen`.`idproducto` = `productos`.`id`
LEFT JOIN `unidad_medida` ON `productos`.`unidadmedidaalmacen` = `unidad_medida`.`id`