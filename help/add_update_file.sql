/* 05/04/2018 By Kaoly */

ALTER TABLE `erp_pos_register`
ADD COLUMN `cash_in`  text NULL AFTER `closed_by`,
ADD COLUMN `cash_out`  text NULL AFTER `cash_in`;


ALTER TABLE `erp_sales`
ADD COLUMN `declaration` int(11) DEFAULT NULL,
ADD COLUMN `inv_no` varchar(255) DEFAULT NULL,
ADD COLUMN `hbl_hawb` varchar(255) DEFAULT NULL,
ADD COLUMN `ctnr_no` varchar(255) DEFAULT NULL,
ADD COLUMN `ctn_no` varchar(255) DEFAULT NULL,
ADD COLUMN `pol` varchar(255) DEFAULT NULL,
ADD COLUMN `pol_date` datetime DEFAULT NULL,
ADD COLUMN `pod` varchar(255) DEFAULT NULL,
ADD COLUMN `vsl_voy1` varchar(255) DEFAULT NULL,
ADD COLUMN `vsl_voy2` varchar(255) DEFAULT NULL,
ADD COLUMN `qty_vol` varchar(255) DEFAULT NULL,
ADD COLUMN `qty_vol_id` varchar(255) DEFAULT NULL,
ADD COLUMN `g_w` varchar(255) DEFAULT NULL,
ADD COLUMN `g_w_id` varchar(255) DEFAULT NULL,
ADD COLUMN `ex_q` varchar(255) DEFAULT NULL,
ADD COLUMN `ex_q_id` varchar(255) DEFAULT NULL,
ADD COLUMN `real_b` varchar(255) DEFAULT NULL,
ADD COLUMN `etd` datetime DEFAULT NULL,
ADD COLUMN `eta` datetime DEFAULT NULL,
ADD COLUMN `total_unit_cost` decimal(25,4) DEFAULT NULL;

ALTER TABLE `erp_sale_items`
ADD COLUMN `product_unit` varchar(255) DEFAULT NULL;

ALTER TABLE `erp_companies`
ADD COLUMN `supplier_type`  tinyint(1) NULL AFTER `public_charge_id`;