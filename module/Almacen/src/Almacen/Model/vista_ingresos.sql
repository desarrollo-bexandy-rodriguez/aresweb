CREATE vista_ingresos AS
SELECT
  `ingreso_almacen`.`id`,
  `ingreso_almacen`.`fecha`,
  `ingreso_almacen`.`idalmacen`,
  `almacen`.`nombre` AS `nombalmacen`,
  `ingreso_almacen`.`idproducto`,
  `productos`.`nombre` AS `nombproducto`,
  `ingreso_almacen`.`cantidad`,
  `unidad_medida`.`simbolo` AS `unidmed`
FROM
  `ingreso_almacen`
  LEFT JOIN `almacen` ON `ingreso_almacen`.`idalmacen` = `almacen`.`id`
  LEFT JOIN `productos` ON `ingreso_almacen`.`idproducto` = `productos`.`id`
  LEFT JOIN `unidad_medida` ON `productos`.`unidadmedidaalmacen` = `unidad_medida`.`id`