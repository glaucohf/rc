/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;

use distribuidor;
create view lastLeads
 AS SELECT lead_email
FROM access order by id desc limit 200;
