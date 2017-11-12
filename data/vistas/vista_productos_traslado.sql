CREATE VIEW `vista_productos_traslado` AS
SELECT
  `disponibilidad_x_almacen`.`id`,
  `disponibilidad_x_almacen`.`almacen` AS `idalmacen`,
  `almacen`.`nombre`,
  `marca`.`id` AS `idmarca`,
  `marca`.`nombre` AS `nombmarca`,
  `categorias`.`id` AS `idcategoria`,
  `categorias`.`nombre` AS `nombcategoria`,
  `disponibilidad_x_almacen`.`producto` AS `idproducto`,
  `productos`.`nombre` AS `nombproducto`,
  `disponibilidad_x_almacen`.`cantidad` AS `disponible`,
  `unidmedalmacen`.`simbolo` AS `unidmed`

FROM
  `disponibilidad_x_almacen`
  LEFT JOIN `almacen` ON `disponibilidad_x_almacen`.`almacen` = `almacen`.`id`
  LEFT JOIN `tipo_almacen` ON `almacen`.`idtipoalmacen` = `tipo_almacen`.`id`
  LEFT JOIN `productos` ON `disponibilidad_x_almacen`.`producto` = `productos`.`id`
  LEFT JOIN `unidad_medida` AS `unidmedalmacen` ON `productos`.`unidadmedidaalmacen` = `unidmedalmacen`.`id`
  LEFT JOIN `marca` ON `productos`.`idmarca` = `marca`.`id`
  LEFT JOIN `categorias` ON `productos`.`idcategoria` = `categorias`.`id`

  WHERE `almacen`.`idtipoalmacen` = 1