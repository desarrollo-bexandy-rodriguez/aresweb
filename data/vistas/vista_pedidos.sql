CREATE VIEW vista_pedidos AS
SELECT
`pedidos`.`id`,
`pedidos`.`codigo`,
`pedidos`.`vendedor`,
`ventas`.`displayName` AS `nombvendedor`,
`pedidos`.`preciototal`,
`pedidos`.`cliente`,
`pedidos`.`estatus`,
`estatus_pedido`.`nombre` AS `nombestatus`,
`estatus_pedido`.`msgclientes`,
`estatus_pedido`.`msgventas` ,
`estatus_pedido`.`msgdespacho` ,
`pedidos`.`despachador`,
`despacho`.`displayName` AS `nombdespachador`,
`pedidos`.`fecha`, `pedidos`.`hora`
FROM `pedidos`
LEFT JOIN `users` AS `ventas` ON `pedidos`.`vendedor`= `ventas`.`id`
LEFT JOIN `users` AS `despacho` ON `pedidos`.`despachador`= `despacho`.`id`
LEFT JOIN `estatus_pedido` ON `pedidos`.`estatus`= `estatus_pedido`.`id`