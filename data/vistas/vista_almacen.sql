CREATE VIEW vista_almacen AS
SELECT
  `almacen`.`id`,
  `almacen`.`idtipoalmacen`,
  `tipo_almacen`.`nombre` AS `nombtipoalmacen`,
  `almacen`.`nombre`
FROM `almacen`
LEFT JOIN `tipo_almacen` ON `almacen`.`idtipoalmacen`= `tipo_almacen`.`id`