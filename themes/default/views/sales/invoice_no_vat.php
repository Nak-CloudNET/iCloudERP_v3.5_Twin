<html>
	<head>		
		<link rel="stylesheet" href="<?= $assets ?>styles/helpers/bootstrap.min.css" type="text/css" />
		<script type="text/javascript" src="<?= $assets ?>js/jquery-2.0.3.min.js"></script>
		<style type="text/css">
			html, body {
				height: 100%;
				background: #FFF;
			}

			body:before, body:after {
				display: none !important;
			}		
			.tdborder td {
				border: 1px solid black;
				height:19px;
				padding-left:3px;
				}
			.double_border td {
				border: 1px solid black;
				height:11px;
				padding-left:3px;
			}
			.footer_border td {
				border: 1px solid black;
				height:30px;
				padding-left:3px;
			}
			.borderstyle{
				border: 1px solid black;
				vertical-align:middle;
				height:19px;
			}
			.Newtdborder td {
				border: 1px solid black;
				height:19px;
				padding-left:3px;
			}
			.border{
				border-left:1px solid black !important;
				border-right:1px solid black !important;
			}
			@media print{
				#wrap_invoice{
					display : none;
				}
			}
		</style>
		<title>Reibursement</title>
	</head>
	<body style="font-family:Time New Roman;">
		<div class="invoice" id="wrap" style="width: 95%; margin: 0 auto;">
			<div style="padding-top:20px;">
                <table style="width: 100%;">				
					<tbody style="font-size: 11px;">
						<tr style="text-align:center;">	
							<td colspan="5" style="font-size:18px;width:15%;vertical-align:middle;height:40px;"><b>REIMBURSEMENT</b></td>						
						</tr>
						<tr style="text-align:center;text-align:left;">	
							<td></td>						
							<td></td>
							<td style="width:10%;vertical-align:middle;"><b>No.</b></td>							
							<td colspan="2" style="width:10%;vertical-align:middle;"><b><?= $inv->reference_no;?></b></td>							
						</tr>
						<tr style="text-align:center;text-align:left;">	
							<td></td>						
							<td></td>
							<td style="width:10%;vertical-align:middle;"><b>Date</b></td>							
							<td colspan="2" style="width:10%;vertical-align:middle;"><b><?= date('d-M-Y',strtotime($inv->date)); ?></b></td>							
						</tr>
						<tr style="text-align:center;text-align:left; border-bottom:1px solid black !important;" class="tdborder">	
							<td style="width:15%;vertical-align:middle;border-bottom:0px !important;">Bill To</td>						
							<td colspan="4" style="width:40%;vertical-align:middle;border-bottom:0px !important;"><b><?= $customer->company ? $customer->company : $customer->name; ?></b></td>
						</tr>	
						<tr style="text-align:center;text-align:left;" class="tdborder">	
							<td style="width:15%;vertical-align:middle;border-top:0px !important;border-bottom:0px !important;">Address</td>						
							<td colspan="4" style="width:40%;vertical-align:middle;font-size:10px;border-top:0px !important;border-bottom:0px !important;"><?= $customer->address; ?></td>
						</tr>
						<tr style="text-align:center;text-align:left;" class="tdborder">	
							<td style="width:15%;vertical-align:middle;">Tel/Tax</td>						
							<td style="width:46%;vertical-align:middle;"></td>
							<td style="width:12%;vertical-align:middle;"><b>Status</b></td>
							<td style="width:12%;vertical-align:middle;"><b><?= strtoupper($inv->ctn_no);?></b></td>							
							<td style="width:15%;vertical-align:middle;"><b><?= $inv->pol_date > 0 ? date('d-M-Y',strtotime($inv->pol_date)) : "";?></b></td>							
						</tr> 
						
						<tr style="text-align:center;text-align:left;" class="tdborder">	
							<td style="width:15%;vertical-align:middle;">Attn</td>						
							<td style="width:46%;vertical-align:middle;"></td>
							<td style="width:12%;vertical-align:middle;">POL</td>
							<td style="width:12%;vertical-align:middle;"><?= strtoupper($inv->pol);?></td>							
							<td style="width:15%;vertical-align:middle;"></td>							
						</tr>
						
						<tr style="text-align:center;text-align:left;" class="tdborder">	
							<td style="width:15%;vertical-align:middle;">Declaration</td>						
							<td style="width:46%;vertical-align:middle;"><?= $inv->declaration; ?></td>
							<td style="width:12%;vertical-align:middle;">POD</td>
							<td style="width:12%;vertical-align:middle;"><?= strtoupper($inv->pod);?></td>							
							<td style="width:15%;vertical-align:middle;"></td>							
						</tr>
						<tr style="text-align:center;text-align:left;" class="tdborder">	
							<td style="width:15%;vertical-align:middle;">INV NO.</td>						
							<td style="width:46%;vertical-align:middle;"><?= strtoupper($inv->inv_no);?></td>
							<td style="width:12%;vertical-align:middle;">VSL/VOY</td>
							<td style="width:12%;vertical-align:middle;"><?= strtoupper($inv->vsl_voy1);?></td>							
							<td style="width:15%;vertical-align:middle;"></td>							
						</tr>
						<tr style="text-align:center;text-align:left;" class="tdborder">	
							<td style="width:15%;vertical-align:middle;">HBL/Hawb</td>						
							<td style="width:46%;vertical-align:middle;"><?= strtoupper($inv->hbl_hawb);?></td>
							<td style="width:12%;vertical-align:middle;">Qty/Vol</td>
							<td style="width:12%;vertical-align:middle;"><?= strtoupper($inv->qty_vol.' '.$inv->qty_vol_id);?></td>							
							<td style="width:15%;vertical-align:middle;"></td>							
						</tr>
						<tr style="text-align:center;text-align:left;" class="tdborder">	
							<td style="width:15%;vertical-align:middle;">Type Doc</td>						
							<td style="width:46%;vertical-align:middle;"></td>
							<td style="width:12%;vertical-align:middle;">G.W(KG)</td>
							<td style="width:12%;vertical-align:middle;"><?= strtoupper($inv->g_w.' '.$inv->g_w_id); ?></td>							
							<td style="width:15%;vertical-align:middle;"><?= strtoupper($inv->ex_q.' '.$inv->ex_q_id); ?></td>							
						</tr>
						<tr style="text-align:center;text-align:left;" class="tdborder">	
							<td style="width:15%;vertical-align:middle;">CTNR NO</td>						
							<td colspan="4" style="width:46%;vertical-align:middle;"><?= strtoupper($inv->ctnr_no);?></td>
						</tr>
						<tr style="text-align:center;text-align:left;height:11px;" class="double_border">	
							<td colspan="5" style="width:15%;vertical-align:middle;"></td>
						</tr> 
					</tbody>
                </table>		
            </div> 
			<div style="padding-top:1px; margin-left: -1px;">
				<table style="width: 100%;">				
					<tbody style="font-size: 11px;">						
						<tr style="text-align:center;font-weight:bold;" class="Newtdborder">	
							<td style="width:5%;vertical-align:middle;border-top:1px solid black !important;">Item</td>						
							<td style="width:41%;vertical-align:middle;border-top:1px solid black !important;">Description</td>
							<td style="width:15%;vertical-align:middle;border-top:1px solid black !important;">Unit</td>							
							<td style="width:12%;vertical-align:middle;border-top:1px solid black !important;">Unit Price</td>
							<td style="width:12%;vertical-align:middle;border-top:1px solid black !important;">Credit</td>							
							<td style="width:15%;vertical-align:middle;border-top:1px solid black !important;">Amount</td>
						</tr>
						<?php $r = 1;
							$total = 0;
							foreach ($rows as $row):
							$free = lang('free');
							$product_unit = '';
							if($row->variant){
								$product_unit = $row->variant;
							}else{
								$product_unit = $row->product_units;
							}

							$product_name_setting;
							if($pos->show_product_code == 0) {
								$product_name_setting = ($row->promotion == 1 ? '<i class="fa fa-check-circle"></i> ' : '') . $row->product_name . ($row->variant ? ' (' . $row->variant . ')' : '');
							}else{
								$product_name_setting = ($row->promotion == 1 ? '<i class="fa fa-check-circle"></i> ' : '') . $row->product_name . " (" . $row->product_code . ")" . ($row->variant ? ' (' . $row->variant . ')' : '');
							}
						?>
						<tr>	
							<td class="borderstyle" style="width:5%;text-align:center;"><?= $r ?></td>						
							<td class="borderstyle" style="width:41%;text-align:left;padding-left:3px;"><?= $product_name_setting ?>
								<?= $row->details ? '<br>' . $row->details : ''; ?></td>
							<td class="borderstyle" style="width:15%;padding-left:15px !important;">
								<?php if($row->unit_price > 0) { ?>
									<span style="text-align:left !important;"><?= $this->erp->formatQuantity($row->quantity); ?></span>
									<span style="text-align:left !important;"><?= $row->product_unit; ?></span>
								<?php } ?>
							</td>							
							<td class="borderstyle" style="width:12%;"><?= $row->unit_price > 0 ? '<span style="padding-left:5px !important;">'.$this->Settings->default_currency.'</span> <span style="float:right !important;padding-right:5px !important;">'.$this->erp->formatMoney($row->unit_price):''.'</span>'; ?></td>
							<td class="borderstyle" style="width:12%;"></td>							
							<td class="borderstyle" style="width:15%;">
								<?php if($row->subtotal > 0) { ?>
									<?= '<span style="padding-left:5px !important;">'.$this->Settings->default_currency.'</span> <span style="float:right !important;padding-right:5px !important;">'.$this->erp->formatMoney($row->subtotal).'</span>';?>
								<?php }else{ ?>
									<?= '<span style="padding-left:5px !important;">'.$this->Settings->default_currency.'</span> <span style="float:right !important;padding-right:5px !important;">'.'('.$this->erp->formatMoney(abs($row->subtotal)).')'.'</span>';?>
								<?php } ?>
							</td>
						</tr>
						<?php
							if($row->unit_price > 0) {
								$total_unit_price += $row->unit_price;
							}
							$total += $row->subtotal;
							$r++;
						endforeach; ?>
						
						<?php 
							if($deposit_amount){
								$total += $deposit_amount->total_deposit_amount * (-1);
						?>
							<tr>	
								<td class="borderstyle" style="width:5%;text-align:center;"><?= $r ?></td>						
								<td class="borderstyle" style="width:41%;text-align:left;padding-left:3px;"><?= lang($deposit_amount->paid_by); ?></td>
								<td class="borderstyle" style="width:15%;padding-left:15px !important;"></td>							
								<td class="borderstyle" style="width:12%;"></td>
								<td class="borderstyle" style="width:12%;"><?= $deposit_amount->total_deposit_amount > 0 ? '<span style="padding-left:5px !important;">'.$this->Settings->default_currency.'</span> <span style="float:right !important;padding-right:5px !important;">('.$this->erp->formatMoney(abs($deposit_amount->total_deposit_amount)).')':''.'</span>'; ?></td>							
								<td class="borderstyle" style="width:15%;"><?= $deposit_amount->total_deposit_amount > 0 ? '<span style="padding-left:5px !important;">'.$this->Settings->default_currency.'</span> <span style="float:right !important;padding-right:5px !important;">('.$this->erp->formatMoney(abs($deposit_amount->total_deposit_amount)).')':''.'</span>'; ?></td>
							</tr>
						<?php
							
							}
						?>
						
						<?php
							//if($r <= 20){
								$n = 8;
								for($a = 1; $a < $n; $a++){										
						?>
						<tr class="no-bor">
							<td class="borderstyle" style="width:5%;">&nbsp;</td> 
							<td class="borderstyle" style="width:41%;text-align:left;padding-left:3px;"></td> 
							<td class="borderstyle" style="width:15%;"></td> 
							<td class="borderstyle" style="width:12%;"></td> 
							<td class="borderstyle" style="width:12%;"></td> 
							<td class="borderstyle" style="width:15%;"></td>
						</tr>
						<?php
							}
							//}
						?>
						<tr class="Newtdborder" style="font-weight:bold;">	
							<td colspan="3" style="width:41%;vertical-align:middle;text-align:right;padding-right:10px;">TOTAL AMOUNT</td>
							<td style="width:12%;vertical-align:middle;"><?= '<span style="padding-left:3px !important;">'.$this->Settings->default_currency.'</span> <span style="float:right !important;padding-right:5px !important;">'.$this->erp->formatMoney($total_unit_price).'</span>'; ?></td>
							<td style="width:12%;vertical-align:middle"><?= '<span style="padding-left:3px !important;">'.$this->Settings->default_currency.'</span> <span style="float:right !important;padding-right:5px !important;">'.$this->erp->formatMoney($deposit_amount->total_deposit_amount).'</span>'; ?></td>							
							<td style="width:15%;vertical-align:middle;"><?= '<span style="padding-left:3px !important;">'.$this->Settings->default_currency.'</span> <span style="float:right !important;padding-right:5px !important;">'.$this->erp->formatMoney($total).'</span>'; ?></td>
						</tr>
						<tr rowspan="2" style="text-align:center;text-align:left;" class="footer_border">	
							<td colspan="6" style="width:5%;vertical-align:top;">Amount In Word : <?=strtoupper($this->erp->convert_number_to_words($this->erp->formatMoney($total)));?></td>
						</tr>
						
						<tr style="font-size:11px;">	
							<td class="border" colspan="2" style="width:5%;vertical-align:top; text-align:left;padding-left:2px;"><b>Payment should be made upon receiving of our debit note and paid to our account</b></td>
							<td class="border" colspan="4" style="width:15%;vertical-align:middle; padding-left:110px;">For and on behalf of</td>
						</tr>
						<tr style="text-align:center;font-size:11px;">	
							<td class="border" colspan="2" style="width:5%;vertical-align:middle;text-align:left;border-top:1px solid black !important;padding-left:2px;"><b>Note : Credit Term 15 days from date of invoice,</b></td>
							<td class="border" colspan="4" style="width:15%;vertical-align:top;text-align:left;padding-left:10px;">&nbsp;</td>
						</tr>
						<tr style="text-align:center;font-size:10px;">	
							<td class="border" colspan="2" style="width:5%;vertical-align:middle;text-align:left;border-top:1px solid black !important;padding-left:35px;"><b>If not paid will charge %1.5 per month untill completely settle.</b></td>														
							<td class="border" colspan="4" style="width:15%;vertical-align:top;text-align:left;padding-left:10px;">&nbsp;</td>
						</tr>
						<tr style="text-align:center;font-size:10px;">	
							<td class="border" colspan="2" style="width:5%;vertical-align:middle;text-align:left;border-top:1px solid black !important;padding-left:35px;"></td>														
							<td class="border" colspan="4" style="width:15%;vertical-align:top;text-align:left;padding-left:10px;">&nbsp;</td>
						</tr>
						<tr style="text-align:center;font-size:10px;">	
							<td class="border" colspan="2" style="width:5%;vertical-align:middle;text-align:left;border-top:1px solid black !important;padding-left:35px;"></td>														
							<td class="border" colspan="4" style="width:15%;vertical-align:top;text-align:left;padding-left:10px;">&nbsp;</td>
						</tr>
						<tr style="text-align:center;font-size:10px;">	
							<td class="border" colspan="2" style="width:5%;vertical-align:middle;text-align:left;border-top:1px solid black !important;padding-left:35px;"></td>														
							<td class="border" colspan="4" style="width:15%;vertical-align:top;text-align:left;padding-left:10px;">&nbsp;</td>
						</tr>
						<tr style="text-align:center;font-size:10px;">	
							<td class="border" colspan="2" style="width:5%;vertical-align:middle;text-align:left;border-top:1px solid black !important;padding-left:35px;"></td>														
							<td class="border" colspan="4" style="width:15%;vertical-align:top;text-align:left;padding-left:10px;">&nbsp;</td>
						</tr>
						<tr style="text-align:center;font-size:11px;">	
							<td class="border" colspan="2" style="width:5%;vertical-align:middle;text-align:left;border-top:1px solid black !important;padding-left:35px;"></td>														
							<td class="border" colspan="4" style="width:15%;vertical-align:top;text-align:left;padding-left:110px;">Authorized Signature Accountant</td>
						</tr>
						<tr style="text-align:center;font-size:9px;border-bottom: 1px solid black !important;">	
							<td class="border" colspan="2" style="width:5%;text-align:left;background-color:#D3D3D3 !important; border-top:1px solid black !important;">All Expend is Pay Behalf for <?= $customer->company ? $customer->company : $customer->name;?></td>														
							<td class="border" colspan="4" style="width:15%;vertical-align:top;text-align:left;padding-left:10px;">&nbsp;</td>
						</tr>
					<!--	<tr style="text-align:center; font-size:10px;">	
							<td class="border" colspan="4" style="width:5%;vertical-align:middle;text-align:left;">&nbsp;</td>														
							<td class="border" colspan="3" style="width:15%;vertical-align:top;text-align:left;font-size:12px;border-top-style:double !important;height:30px !important;">Authorized Signature Accountant</td>
						</tr>						
						<tr style="text-align:left;background-color:#D3D3D3 !important;" class="tdborder" >	
							<td colspan="7" style="width:5%;vertical-align:top;font-size:9px;">All Expend is Pay Behalf for <?= $customer->company ? $customer->company : $customer->name;?></td>
						</tr> -->
					</tbody>
                </table>		
            </div> 
			<br/><br/>
			<div id="wrap_invoice" class="no-print" style="width: 90%; margin:0px auto;">
				<div class="col-xs-10" style="margin-bottom:20px;">
					<button type="button" class="btn btn-primary btn-default no-print pull-left" onclick="window.print();">
						<i class="fa fa-print"></i> <?= lang('print'); ?>
					</button>&nbsp;&nbsp;
					<a href="<?=base_url()?>sales/invoiceTaxTwin/<?=$sid?>" target="_blank"><button class="btn btn-primary no-print" ><i class="fa fa-print"></i>&nbsp;<?= lang("print_tax_invoice"); ?></button></a>&nbsp;&nbsp;
					<a href="<?= site_url('sales'); ?>"><button class="btn btn-warning no-print" ><i class="fa fa-heart"></i>&nbsp;<?= lang("back_to_sale"); ?></button></a>		  
				</div>
			</div>
		</div>
	</body>
</html>