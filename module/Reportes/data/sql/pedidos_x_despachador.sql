SELECT
 `users`.`displayName` AS `despachador`,
 COUNT(*) AS `pedidos`,
 `estatus`
FROM
  `pedidos`
  LEFT JOIN `users` ON `pedidos`.`despachador`= `users`.`id`
WHERE
 `pedidos`.`estatus` = 4 AND `pedidos`.`fecha` BETWEEN '2016-09-22' AND '2016-09-26'
 GROUP BY `despachador`