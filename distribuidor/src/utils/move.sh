#/bin/bash
data=`/bin/date +%Y-%m-%d-%H.%M`
mv /opt/bitnami/apps/wordpress/htdocs/distribuidor/dist.log /opt/bitnami/apps/wordpress/htdocs/distribuidor/logs/dist-${data}.log
