   CREATE VIEW rechargehistory AS
   SELECT `mobilerechargeorders.*`,"Mob" AS type FROM mobilerechargeorders
   UNION ALL
   SELECT `rechargeorders.*`,"Dth" AS type FROM rechargeorders ORDER BY created_at DESC;

   CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rechargehistory` AS 


   select `mobilerechargeorders`.`id` AS `id`,`mobilerechargeorders`.`uniqueoid` AS `uniqueoid`,`mobilerechargeorders`.`user_id` AS `user_id`,`mobilerechargeorders`.`brandid` AS `brandid`,`mobilerechargeorders`.`mobileno` AS `mobileno`,`mobilerechargeorders`.`type` AS `type`,`mobilerechargeorders`.`amount` AS `amount`,`mobilerechargeorders`.`orderstatus` AS `orderstatus`,`mobilerechargeorders`.`paymentstatus` AS `paymentstatus`,`mobilerechargeorders`.`reason` AS `reason`,`mobilerechargeorders`.`trnid` AS `trnid`,`mobilerechargeorders`.`api_url` AS `api_url`,`mobilerechargeorders`.`recharge_res_msg` AS `recharge_res_msg`,`mobilerechargeorders`.`updated_at` AS `updated_at`,`mobilerechargeorders`.`created_at` AS `created_at`,`mobilerechargeorders`.`wallet_deduction` AS `wallet_deduction`,`mobilerechargeorders`.`use_wallet` AS `use_wallet`,`mobilerechargeorders`.`amttopay` AS `amttopay`,`mobilerechargeorders`.`circle` AS `circle`,`mobilerechargeorders`.`recharge_type` AS `recharge_type`,`mobilerechargeorders`.`cardno` AS `cardno`,"MOB" as rec_type from `mobilerechargeorders` union all 

   select `rechargeorders`.`id` AS `id`,`rechargeorders`.`uniqueoid` AS `uniqueoid`,`rechargeorders`.`user_id` AS `user_id`,`rechargeorders`.`brandid` AS `brandid`,"DTH" as rec_type,`rechargeorders`.`cardno` AS `cardno`,`rechargeorders`.`mobileno` AS `mobileno`,`rechargeorders`.`amount` AS `amount`,`rechargeorders`.`orderstatus` AS `orderstatus`,`rechargeorders`.`paymentstatus` AS `paymentstatus`,`rechargeorders`.`reason` AS `reason`,`rechargeorders`.`updated_at` AS `updated_at`,`rechargeorders`.`created_at` AS `created_at`,`rechargeorders`.`api_url` AS `api_url`,`rechargeorders`.`trnid` AS `trnid`,`rechargeorders`.`recharge_res_msg` AS `recharge_res_msg`,`rechargeorders`.`wallet_deduction` AS `wallet_deduction`,`rechargeorders`.`use_wallet` AS `use_wallet`,`rechargeorders`.`amttopay` AS `amttopay`,`rechargeorders`.`type` AS `type`,`rechargeorders`.`circle` AS `circle`,`rechargeorders`.`recharge_type` AS `recharge_type` from `rechargeorders` order by `created_at` desc


   ALTER view rechargehistory as select
    `mobilerechargeorders`.`id` AS `id`,
    `mobilerechargeorders`.`uniqueoid` AS `uniqueoid`,
    `mobilerechargeorders`.`user_id` AS `user_id`,
    `mobilerechargeorders`.`brandid` AS `brandid`,
    `mobilerechargeorders`.`cardno` AS `cardno`,
    `mobilerechargeorders`.`mobileno` AS `mobileno`,
    `mobilerechargeorders`.`type` AS `type`,
    `mobilerechargeorders`.`amount` AS `amount`,
    `mobilerechargeorders`.`orderstatus` AS `orderstatus`,
    `mobilerechargeorders`.`paymentstatus` AS `paymentstatus`,
    `mobilerechargeorders`.`reason` AS `reason`,
    `mobilerechargeorders`.`trnid` AS `trnid`,
    `mobilerechargeorders`.`api_url` AS `api_url`,
    `mobilerechargeorders`.`recharge_res_msg` AS `recharge_res_msg`,
    `mobilerechargeorders`.`updated_at` AS `updated_at`,
    `mobilerechargeorders`.`created_at` AS `created_at`,
    `mobilerechargeorders`.`wallet_deduction` AS `wallet_deduction`,
    `mobilerechargeorders`.`use_wallet` AS `use_wallet`,
    `mobilerechargeorders`.`amttopay` AS `amttopay`,
    `mobilerechargeorders`.`circle` AS `circle`,
    `mobilerechargeorders`.`recharge_type` AS `recharge_type`,

   `mobilerechargeorders`.`brandid` AS `mob_brand`,
   0 AS `dth_brand`,
   "MOB" as rec_type
    from `mobilerechargeorders`
    union all 

   select `rechargeorders`.`id` AS `id`,
   `rechargeorders`.`uniqueoid` AS `uniqueoid`,
   `rechargeorders`.`user_id` AS `user_id`,
   `rechargeorders`.`brandid` AS `brandid`,
   `rechargeorders`.`cardno` AS `cardno`,
   `rechargeorders`.`mobileno` AS `mobileno`,
   `rechargeorders`.`type` AS `type`,
   `rechargeorders`.`amount` AS `amount`,
   `rechargeorders`.`orderstatus` AS `orderstatus`,
   `rechargeorders`.`paymentstatus` AS `paymentstatus`,
   `rechargeorders`.`reason` AS `reason`,
   `rechargeorders`.`trnid` AS `trnid`,
   `rechargeorders`.`api_url` AS `api_url`,
    `rechargeorders`.`recharge_res_msg` AS `recharge_res_msg`,
   `rechargeorders`.`updated_at` AS `updated_at`,
   `rechargeorders`.`created_at` AS `created_at`,
   `rechargeorders`.`wallet_deduction` AS `wallet_deduction`,
   `rechargeorders`.`use_wallet` AS `use_wallet`,
   `rechargeorders`.`amttopay` AS `amttopay`,
   `rechargeorders`.`circle` AS `circle`,
   `rechargeorders`.`recharge_type` AS `recharge_type`,
   0 AS `mob_brand`,
   `rechargeorders`.`brandid` AS `dth_brand`,
    "DTH" as rec_type
     from `rechargeorders` order by `created_at` desc