CREATE VIEW vista_productos AS SELECT `productos`.`id`, `productos`.`nombre`,`categorias`.`id` AS `idcategoria`,`categorias`.`nombre` AS `nombcategoria`,
 `ventas`.`abreviatura` AS `unidadmedidaventas` ,`productos`.`preciounidad`,`almacen`.`abreviatura` AS `unidadmedidaalmacen`,
 `productos`.`imagen` AS `imagen`
FROM `productos`
 LEFT JOIN `categorias` ON `productos`.`idcategoria` = `categorias`.`id`
 LEFT JOIN `unidad_medida` AS `ventas` ON `productos`.`unidadmedidaventas` = `ventas`.`id`
 LEFT JOIN `unidad_medida` AS `almacen` ON `productos`.`unidadmedidaalmacen` = `almacen`.`id`;