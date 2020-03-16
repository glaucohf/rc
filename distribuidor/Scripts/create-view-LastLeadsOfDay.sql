/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;

use distribuidor;

create view lastLeads AS
SELECT lead_email FROM distribuidor.access
where DATE_FORMAT(lead_register_date, "%Y-%m-%d") =  CURDATE()
order by id desc;
