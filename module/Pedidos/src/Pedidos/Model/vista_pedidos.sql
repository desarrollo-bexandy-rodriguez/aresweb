CREATE VIEW vista_pedidos AS SELECT `pedidos`.`id`, `pedidos`.`codigo`, `pedidos`.`vendedor`,
        `ventas`.`nombre` AS `nombvendedor`, `pedidos`.`preciototal`,
        `pedidos`.`cliente`, `pedidos`.`estatus`, `estatus_pedido`.`nombre` AS `nombestatus`,
        `estatus_pedido`.`msgclientes`, `estatus_pedido`.`msgventas` ,
        `estatus_pedido`.`msgdespacho` , `pedidos`.`despachador`, `despacho`.`nombre` AS `nombdespachador`,
        `pedidos`.`fecha`, `pedidos`.`hora`
FROM `pedidos`
LEFT JOIN `usuarios` AS `ventas` ON `pedidos`.`vendedor`= `ventas`.`id`
LEFT JOIN `usuarios` AS `despacho` ON `pedidos`.`despachador`= `despacho`.`id`
LEFT JOIN `estatus_pedido` ON `pedidos`.`estatus`= `estatus_pedido`.`id`;