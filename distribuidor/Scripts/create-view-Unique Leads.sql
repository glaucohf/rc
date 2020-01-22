<<<<<<< HEAD
use distribuidor;
/*!50001 DROP TABLE IF EXISTS `uniqueleads`*/;
/*!50001 DROP VIEW IF EXISTS `uniqueleads`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dist`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `uniqueleads` AS select distinct `a`.`lead_email` AS `email`,`a`.`lead_name` AS `nome`,`a`.`lead_phone` AS `celular`,`a`.`consulting_id` AS `codigoConsultor`,`c`.`consulting_name` AS `nomeConsultor`,`a`.`interest` AS `interest`,`a`.`ip` AS `ip`,`a`.`from_url` AS `url`,`a`.`form` AS `formulario`,`a`.`origins` AS `codigoOrigem`,`a`.`product` AS `codigoProduto`,`a`.`category` AS `categoria`,`a`.`id_leadlovers` AS `idLeadlovers`,`a`.`pid_leadlovers` AS `pidLeadlovers`,`a`.`observation` AS `observacao`,`a`.`thanks_url` AS `paginaObrigado`,`a`.`first_time` AS `primeiraAplicacao`,`a`.`whatsapp` AS `whatsapp`,extract(day from `a`.`lead_register_date`) AS `dia`,extract(month from `a`.`lead_register_date`) AS `mes`,extract(year from `a`.`lead_register_date`) AS `ano`,extract(hour from `a`.`lead_register_date`) AS `hora`,extract(minute from `a`.`lead_register_date`) AS `minutos`,date_format(`a`.`lead_register_date`,'%Y%m%d') AS `data` from (`access` `a` left join `consulting01` `c` on((`a`.`consulting_id` = `c`.`ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;




use distribuidor;
create view uniqueLeads 
 AS select distinct `a`.`lead_email` AS `email`,`a`.`lead_name` AS `nome`,`a`.`lead_phone` AS `celular`,
 `a`.`consulting_id` AS `codigoConsultor`,`c`.`consulting_name` AS `nomeConsultor`,`a`.`interest` AS `interest`,
 `a`.`ip` AS `ip`,`a`.`from_url` AS `url`,`a`.`form` AS `formulario`,`a`.`origins` AS `codigoOrigem`,
 `a`.`product` AS `codigoProduto`,`a`.`category` AS `categoria`,`a`.`id_leadlovers` AS `idLeadlovers`,
 `a`.`pid_leadlovers` AS `pidLeadlovers`,`a`.`observation` AS `observacao`,`a`.`thanks_url` AS `paginaObrigado`,
 `a`.`first_time` AS `primeiraAplicacao`,`a`.`whatsapp` AS `whatsapp`,extract(day from `a`.`lead_register_date`) AS `dia`,
 extract(month from `a`.`lead_register_date`) AS `mes`,extract(year from `a`.`lead_register_date`) AS `ano`,
 extract(hour from `a`.`lead_register_date`) AS `hora`,extract(minute from `a`.`lead_register_date`) AS `minutos`,
 date_format(`a`.`lead_register_date`,'%Y%m%d') AS `data` 
 from (`distribuidor`.`access` `a` left join `distribuidor`.`consulting01` `c` on((`a`.`consulting_id` = `c`.`ID`)));
 
=======
use distribuidor;
/*!50001 DROP TABLE IF EXISTS `uniqueleads`*/;
/*!50001 DROP VIEW IF EXISTS `uniqueleads`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dist`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `uniqueleads` AS select distinct `a`.`lead_email` AS `email`,`a`.`lead_name` AS `nome`,`a`.`lead_phone` AS `celular`,`a`.`consulting_id` AS `codigoConsultor`,`c`.`consulting_name` AS `nomeConsultor`,`a`.`interest` AS `interest`,`a`.`ip` AS `ip`,`a`.`from_url` AS `url`,`a`.`form` AS `formulario`,`a`.`origins` AS `codigoOrigem`,`a`.`product` AS `codigoProduto`,`a`.`category` AS `categoria`,`a`.`id_leadlovers` AS `idLeadlovers`,`a`.`pid_leadlovers` AS `pidLeadlovers`,`a`.`observation` AS `observacao`,`a`.`thanks_url` AS `paginaObrigado`,`a`.`first_time` AS `primeiraAplicacao`,`a`.`whatsapp` AS `whatsapp`,extract(day from `a`.`lead_register_date`) AS `dia`,extract(month from `a`.`lead_register_date`) AS `mes`,extract(year from `a`.`lead_register_date`) AS `ano`,extract(hour from `a`.`lead_register_date`) AS `hora`,extract(minute from `a`.`lead_register_date`) AS `minutos`,date_format(`a`.`lead_register_date`,'%Y%m%d') AS `data` from (`access` `a` left join `consulting01` `c` on((`a`.`consulting_id` = `c`.`ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;




use distribuidor;
create view uniqueLeads 
 AS select distinct `a`.`lead_email` AS `email`,`a`.`lead_name` AS `nome`,`a`.`lead_phone` AS `celular`,
 `a`.`consulting_id` AS `codigoConsultor`,`c`.`consulting_name` AS `nomeConsultor`,`a`.`interest` AS `interest`,
 `a`.`ip` AS `ip`,`a`.`from_url` AS `url`,`a`.`form` AS `formulario`,`a`.`origins` AS `codigoOrigem`,
 `a`.`product` AS `codigoProduto`,`a`.`category` AS `categoria`,`a`.`id_leadlovers` AS `idLeadlovers`,
 `a`.`pid_leadlovers` AS `pidLeadlovers`,`a`.`observation` AS `observacao`,`a`.`thanks_url` AS `paginaObrigado`,
 `a`.`first_time` AS `primeiraAplicacao`,`a`.`whatsapp` AS `whatsapp`,extract(day from `a`.`lead_register_date`) AS `dia`,
 extract(month from `a`.`lead_register_date`) AS `mes`,extract(year from `a`.`lead_register_date`) AS `ano`,
 extract(hour from `a`.`lead_register_date`) AS `hora`,extract(minute from `a`.`lead_register_date`) AS `minutos`,
 date_format(`a`.`lead_register_date`,'%Y%m%d') AS `data` 
 from (`distribuidor`.`access` `a` left join `distribuidor`.`consulting01` `c` on((`a`.`consulting_id` = `c`.`ID`)));
 
>>>>>>> ca48c177890edfc50428c0e9235aeea290cd73f6
