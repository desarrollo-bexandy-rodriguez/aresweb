SELECT `productos`.`id_producto`, `productos`.`nombre`,`categorias`.`id_categoria` AS `id_categoria`,`categorias`.`nombre` AS `categoria`, `ventas`.`abreviatura` AS `unidad_medida_ventas` ,`productos`.`precio_x_unidad`,`almacen`.`abreviatura` AS `unidad_medida_almacen`,`productos`.`foto` AS `imagen`
FROM `productos` LEFT JOIN `categorias` ON `productos`.`categoria` = `categorias`.`id_categoria`
 LEFT JOIN `unidad_medida` AS `ventas` ON `productos`.`unid_med_ventas` = `ventas`.`id_unidad_medida`
 LEFT JOIN `unidad_medida` AS `almacen` ON `productos`.`unid_med_almacen` = `almacen`.`id_unidad_medida`


CREATE VIEW vista_productos AS SELECT `productos`.`id`, `productos`.`nombre`,`categorias`.`id` AS `idcategoria`,`categorias`.`nombre` AS `nombcategoria`,
 `ventas`.`abreviatura` AS `unidadmedidaventas` ,`productos`.`preciounidad`,`almacen`.`abreviatura` AS `unidadmedidaalmacen`,
 `productos`.`imagen` AS `imagen`
FROM `productos`
 LEFT JOIN `categorias` ON `productos`.`idcategoria` = `categorias`.`id`
 LEFT JOIN `unidad_medida` AS `ventas` ON `productos`.`unidadmedidaventas` = `ventas`.`id`
 LEFT JOIN `unidad_medida` AS `almacen` ON `productos`.`unidadmedidaalmacen` = `almacen`.`id`;