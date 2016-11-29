#!/bin/bash
 
FILE=/var/www/ares-app/ares-`date +%Y%m%d_%H%M%S`.sql.gz
 
mysqldump --password=p3lk4x --user=root --verbose --ignore-table=squema.table1 --ignore-table=squema.table2 app_ares | sed -r 's/DEFINER=`[^`]+`@`[^`]+`/DEFINER=CURRENT_USER/g' | gzip > $FILE
 
echo "Backup finished: $FILE"
