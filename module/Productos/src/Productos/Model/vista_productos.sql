CREATE VIEW `vista_productos` AS
 SELECT
  `productos`.`id`,
  `productos`.`nombre`,
  `categorias`.`id` AS `idcategoria`,
  `categorias`.`nombre` AS `nombcategoria`,
  `productos`.`unidadmedidaventas`,
  `ventas`.`abreviatura` AS `nombunidmedventas` ,
  `productos`.`preciounidad`,
  `productos`.`unidadmedidaalmacen`,
  `almacen`.`abreviatura` AS `nombunidmedalmacen`,
  `productos`.`relacionunidad`,
  `productos`.`imagen` AS `imagen`,
  `productos`.`idmarca`,
  `marca`.`nombre` AS `nombmarca`
 FROM `productos`
  LEFT JOIN `categorias` ON `productos`.`idcategoria` = `categorias`.`id`
  LEFT JOIN `unidad_medida` AS `ventas` ON `productos`.`unidadmedidaventas` = `ventas`.`id`
  LEFT JOIN `unidad_medida` AS `almacen` ON `productos`.`unidadmedidaalmacen` = `almacen`.`id`
  LEFT JOIN `marca` ON `productos`.`idmarca` = `marca`.`id`