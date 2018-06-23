<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Invoice</title>
		<link rel="stylesheet" href="<?= $assets ?>styles/helpers/bootstrap.min.css" type="text/css" />
		<script type="text/javascript" src="<?= $assets ?>js/jquery-2.0.3.min.js"></script>
		<style type="text/css">
			html, body {
				height: 100%;
				background: #FFF;
			}

			body:before, body:after {
				display: none !important;
				font-family:Times New Roman !important;
			}
			hr{
				border-color: #333;
				width:100px;
				margin-top: 70px;
				
			}
			.tdborder td {
				border: 0.1px solid #505356;
				font-family:Times New Roman !important;
				height:18px !important;
			}
			.header_border td {
				border: 0.5px solid black;
				font-family:Times New Roman !important;
				height:18px;
			}
			.main_header_border td {
				border: 0.5px solid black;
				font-family:Times New Roman !important;
				height:25px;
			}
			
			.style_border{
				border: 0.5px solid black;
				font-family:Times New Roman !important;
				height:18px;
			}
			.header_border_double td {
				border-bottom-style:double !important;
				font-family:Times New Roman !important;
				height:20px;
			}
			.psize{
				width:10%;
				height:15%;
			}
			.firstrow{
				width:60%;
				vertical-align:top;
				height:15px;
				text-align:left;
				font-family:Khmer OS Muol;
				font-family:Time New Roman !important;
			}
			.secondrow{
				width:40%;
				vertical-align:top;
				height:15px;
				text-align:left;
				font-family:Khmer OS Muol;
				font-family:Time New Roman !important;
			}
			.secondtdborder td{
				border-left:0.5px solid black;
				border-right:0.5px solid black;
				height:15px;
				font-family:Khmer OS Muol;
				font-family:Time New Roman !important;
			}
			h5,h6,p{
				font-family:Khmer OS Muol;
				font-family:Time New Roman !important;
			}
			@media print{
				#wrap_invoice{
					display : none;
				}
			}
		</style>
		<?php 
			function cutString($str){
				$arr = explode(' @', $str);
				$get = $arr[0].' '.$arr[1];
				return $get;
			}
		?>
	</head>
	
	<body>
		<div class="invoice" id="wrap" style="width: 95%; margin: 0 auto;">
			<div class="row">
				<div class="col-lg-12">					
					<div class="text-center" style="font-size:10px;line-height:4px;font-family:Times New Roman !important;">						
						<h5 style="font-family:'Khmer OS Muol' ,Khmer OS Muol Light !important;"><b>ធ្វីនឡូជីស្ទីក ខេមបូឌា ខូអិលធីឌី</b></h5>
						<h4 style="padding-top:0px !important;"><b>Twin Logistics (Cambodia) Co.,LTD</b></h4>
						<p>លេខអត្តសញ្ញាណកម្ម អតប  (VAT TIN) <?= $biller->vat_no; ?></p>
						<p>អសយដ្ធាន ៖ ផ្លូវសហព័ន្ធរុស្សី សង្កាត់ទឹកថ្លា ខណ្ឌ សែនសុខ រាជធានី ភ្នំពេញ</p>
						<p>ទូរស័ព្ធ 023 866 069</p>						
					</div>
					<div style="margin-top:-100px;float:left;">
						<img src="<?= base_url() . 'assets/uploads/logos/' . $biller->logo; ?>"
                         alt="<?= $biller->company != '-' ? $biller->company : $biller->name; ?>">
					</div>
					<div></div>
					<div class="text-center" style="line-height:10px;font-size:15px;margin-top:15px;">
						<p style="font-family:'Khmer OS Muol','Khmer OS Muol Light' !important;"​ /><b>វិក័យបត្រអាករ</b></p>
						<p style="font-family:Time New Roman;"><b>TAX INVOICE</b></p>
					</div>
					
					<div class="row">
						<table style="width: 100%;" style="font-family:Times New Roman;">				
							<tbody>
								<tr>
									<td colspan="2" style="width:35%;vertical-align:middle;font-size:12px;padding-left:2px;"></td>
									<td style="width:50%;vertical-align:middle;font-size:11px;padding-left:50px;font-family:Time New Roman !important;"><strong>Invoice Number/ លេខរៀងវិក្ក័យបត្រ ៖ <?= $inv->reference_no; ?>​</strong></td>
								</tr>
								<tr>
									<td colspan="2" style="width:35%;vertical-align:middle;font-size:12px;padding-left:2px;"></td>
									<td style="width:50%;vertical-align:middle;font-size:11px;padding-left:50px;font-family:Time New Roman !important;"><strong>Date Invoice/ កាលបរិច្ឆេទ ៖​ <?= date('d-M-Y',strtotime($inv->date)); ?></strong></td>
								</tr>
								<tr class="main_header_border">
									<td style="width:35%;vertical-align:middle;font-size:14px;padding-left:2px;"><b>ឈ្មោះក្រុមហ៊ុន ឬ អតិថិជន/CUSTOMER :</b></td>
									<td colspan="2" style="width:50%;vertical-align:middle;font-size:14px;padding-left:2px;"><b><?= $customer->company_kh ? $customer->company_kh : $customer->name_kh; ?></b></td>
								</tr>
								<tr class="main_header_border">
									<td style="width:35%;vertical-align:middle;font-size:14px;padding-left:2px;"><b>COMPANY NAME / CUSTOMER :</b></td>
									<td colspan="2" style="width:50%;font-size:14px;vertical-align:middle;padding-left:2px;"><b><?= $customer->company ? $customer->company : $customer->name; ?></b></td>
								</tr>
								<tr class="header_border">
									<td colspan="3" style="width:35%;vertical-align:middle;font-size:10px;padding-left:2px;">អាសយដ្ឋាន : <?= $customer->address_kh; ?></td>
								</tr>
								<tr class="header_border">
									<td colspan="3" style="width:35%;vertical-align:middle;font-size:10px;padding-left:2px;">Address : <?= $customer->address ?></td>
								</tr>
								<tr class="header_border">
									<td colspan="3" style="width:35%;vertical-align:middle;font-size:10px;padding-left:2px;">លេខអត្តសញ្ញាណកម្ម អតប <b>(VAT TIN)</b> : <?= $customer->vat_no; ?></td>
								</tr>
								<tr>
									<td colspan="2" style="width:35%;vertical-align:middle;font-size:10px;padding-left:2px;border-right:none !important; border-left:0.5px solid black !important; border-bottom:0.5px solid black !important; height:18px;">ទូរស័ព្ទ  :  <?= $customer->phone; ?></td>
									<td style="width:50%;vertical-align:middle;font-size:10px;padding-left:2px;border-top-style:double !important;border-right-style:double !important;border-left-style:double !important;border-bottom:0.5px solid black important;">ស្ថានភាព (Status) : <?= strtoupper($inv->ctn_no); ?> </td>
								</tr>
								<tr>
									<td colspan="2" style="width:35%;vertical-align:middle;font-size:10px;padding-left:2px;height:18px;border-left:0.5px solid black !important;"><b><u>លេខរៀងយោងទំនិញ / Cargo Ref No</u></b></td>
									<td style="width:50%;vertical-align:middle;font-size:10px;padding-left:2px;border-right-style:double !important;border-left-style:double !important;border-top:0.5px solid black !important;">ជើងកប៉ាល់ទី១(Mother vessel/Voy) : <?= strtoupper($inv->vsl_voy1); ?> </td>
								</tr>
								<tr>
									<td colspan="2" style="width:35%;vertical-align:middle;font-size:10px;padding-left:2px;height:18px;border-left:0.5px solid black !important;">លេខប័ណ្ណទំនិញ(Real B/L) :</td>
									<td style="width:50%;vertical-align:middle;font-size:10px;padding-left:2px;border-right-style:double !important;border-left-style:double !important;border-top:0.5px solid black !important;">ថ្ងៃកប៉ាល់ចេញ/ទៅដល់(ETD/ETA) : <?= ($inv->etd > 0 ?  date('d-M-Y',strtotime($inv->etd)) : "").($inv->eta > 0 ? ' / '.date('d-M-Y',strtotime($inv->eta)) : ""); ?></td>
								</tr>
								<tr>
									<td  class="style_border" style="width:35%;vertical-align:middle;font-size:10px;padding-left:50px;">Qty / បរិមាណ</td>
									<td class="style_border" style="width:15%;vertical-align:middle;font-size:10px;"></td>
									<td style="width:50%;vertical-align:middle;font-size:10px;padding-left:2px;border-right-style:double !important;border-left-style:double !important;border-top:0.5px solid black !important;">ផែកប៉ាល់ចេញ(POL/From)​ : <?= strtoupper($inv->pol); ?></td>
								</tr>
								<tr>
									<td class="style_border" style="width:35%;vertical-align:middle;font-size:10px;padding-left:50px;">G.W (Kgs)</td>
									<td class="style_border" style="width:15%;vertical-align:middle;font-size:10px;"></td>
									<td style="width:50%;vertical-align:middle;font-size:10px;padding-left:2px;border-right-style:double !important;border-left-style:double !important;border-top:0.5px solid black !important;border-bottom:double !important;">ផែកប៉ាល់ចូល (POD/To) : <?= strtoupper($inv->pod); ?> </td>
								</tr>
								<tr class="header_border" style="border : none !important;">
									<td style="width:35%;vertical-align:middle;font-size:10px;padding-left:50px;border:none;">លេខកុងតៃន័រ (TNS No) :</td>
									<td style="width:15%;vertical-align:middle;font-size:10px;border:none;padding-left:2px;"></td>
									<td style="width:50%;vertical-align:middle;border:none;"></td>
								</tr>
							</tbody>
						</table> 
					</div>					
					<div class="row" style="padding-left: 0px;">
						<table style="width: 100%;">				
							<tbody style="font-size: 10px;">						
								<tr style="font-weight:bold;text-align:center;border-top:0.5px solid black !important;background-color:#e2e0e0 !important;" class="secondtdborder">	
									<td style="width:5%;vertical-align:middle;">ល.រ</td>
									<td colspan="2" style="width:35%;vertical-align:middle;">បរិយាយមុខទំនិញ</td>
									<td style="width:13%;vertical-align:middle;">បរិមាណ/ឯកតា</td>
									<td style="width:10%;vertical-align:middle;">ថ្លៃឯកតា</td>
									<td style="width:12%;vertical-align:middle;">ថ្លៃទំនិញ</td>
									<td style="width:10%;vertical-align:middle;">អាករលើតម្លៃបន្ថែម</td>
									<td style="width:15%;vertical-align:middle;">តម្លៃសរុប</td>
								</tr>
								<tr style="font-weight:bold;text-align:center;border-bottom-style:double !important;background-color:#e2e0e0 !important;" class="secondtdborder">	
									<td style="width:5%;vertical-align:middle;">No</td>
									<td colspan="2" style="width:35%;vertical-align:middle;">Description</td>
									<td style="width:13%;vertical-align:middle;">Qty/Unit</td>
									<td style="width:10%;vertical-align:middle;">Unit Price</td>
									<td style="width:12%;vertical-align:middle;">Amount</td>
									<td style="width:10%;vertical-align:middle;">VAT %10</td>
									<td style="width:15%;vertical-align:middle;">Total Amount</td>
								</tr>
								<?php $r = 1;
								$total = 0;
								$total_amount = 0;
								$total_vat = 0;
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
								<tr class="tdborder">	
									<td style="width:5%;vertical-align:middle;text-align:center;"><?= $r; ?></td>
									<td style="width:17%;vertical-align:middle;border-right:0px !important;">
										
										<?php if($row->name_kh == ""){
											echo $product_name_setting;	
										}else echo $row->name_kh; ?>
									</td>
									<td style="width:18%;vertical-align:middle;border-left:0px !important;"><?php if($row->name_kh == ""){ 
										  echo $product_name_setting = "";
									}else echo $product_name_setting; ?>
									<td style="width:13%;vertical-align:middle;padding-left:15px !important;">
										<?php if($row->unit_price > 0) { ?>
											<span style="text-align:left !important;"><?= $this->erp->formatQuantity($row->quantity); ?></span>
											<span style="text-align:left !important;"><?= $row->product_unit; ?></span>
										<?php } ?>
									</td>									
									<td style="width:10%;vertical-align:middle;"><?= $row->unit_price > 0 ? '<span style="padding-left:3px !important;">'.$this->Settings->default_currency.'</span> <span style="float:right !important;padding-right:5px !important;">'.$this->erp->formatMoney($row->unit_price).'</span>' : ''; ?></td>
									<td style="width:12%;vertical-align:middle;"><?= $row->unit_price > 0 ? '<span style="padding-left:3px !important;">'.$this->Settings->default_currency.'</span> <span style="float:right !important;padding-right:5px !important;">'.$this->erp->formatMoney($row->unit_price * $row->quantity) : ''.'</span>'; ?></td>
									<td style="width:10%;vertical-align:middle;"><?= $row->unit_price > 0 ? '<span style="padding-left:3px !important;">'.$this->Settings->default_currency .'</span> <span style="float:right !important;padding-right:5px !important;">'.$this->erp->formatMoney($row->item_tax):''.'</span>' ?></td>									
									<td style="width:15%;vertical-align:middle;">
										<?php if($row->subtotal > 0) { ?>
											<?= '<span style="padding-left:3px !important;">'.$this->Settings->default_currency.'</span> <span style="float:right !important;padding-right:5px !important;">'.$this->erp->formatMoney($row->subtotal).'</span>'; ?>
										<?php }else{ ?>
											<?= '<span style="padding-left:3px !important;">'.$this->Settings->default_currency.'</span> <span style="float:right !important;padding-right:5px !important;">'.'('.$this->erp->formatMoney(abs($row->subtotal)).')'.'</span>'; ?>
										<?php } ?>
									</td>
								</tr>
								<?php
									if($row->unit_price > 0){
										$total_amount += $row->unit_price * $row->quantity;
										$total_vat += $row->item_tax;										
									}
									$total += $row->subtotal;
									$r++;
								endforeach; ?>
								<?php
									if($r <= 5){
										$n = 15 - $r;
										for($a = 1; $a < $n; $a++){										
								?>
								<tr style="text-align:center;" class="tdborder">	
									<td style="width:5%;vertical-align:middle;">&nbsp;</td>
									<td colspan="2" style="width:35%;vertical-align:middle;"></td>
									<td style="width:13%;vertical-align:middle;"></td>
									<td style="width:10%;vertical-align:middle;"></td>
									<td style="width:12%;vertical-align:middle;"></td>
									<td style="width:10%;vertical-align:middle;"></td>
									<td style="width:15%;vertical-align:middle;"></td>
								</tr>
								<?php
										}
									}
								?>
								
								<tr class="tdborder" style="font-size:12px; font-weight:bold !important;font-family:Times New Roman;background-color:#e2e0e0 !important;height:23px !important;">
									<td colspan="5" style="width:5%;vertical-align:middle;text-align:right;padding-right:3px !important;">GRAND TOTAL</td>
									<td style="width:12%;vertical-align:middle;"><?= '<span style="padding-left:3px !important;">'.$this->Settings->default_currency.'</span> <span style="float:right !important;padding-right:5px !important;">'.$this->erp->formatMoney($total_amount).'</span>'; ?></td>
									<td style="width:10%;vertical-align:middle;"><?= '<span style="padding-left:3px !important;">'.$this->Settings->default_currency.'</span> <span style="float:right !important;padding-right:5px !important;">'.$this->erp->formatMoney($total_vat).'</span>'; ?></td>
									<td style="width:15%;vertical-align:middle;"><?= '<span style="padding-left:3px !important;">'.$this->Settings->default_currency.'</span> <span style="float:right !important;padding-right:5px !important;">'.$this->erp->formatMoney($total).'</span>'; ?></td>
								</tr>
								<tr style="font-size:12px;font-weight:bold;font-family:Times New Roman !important;height:23px !important;">
									<td colspan="2" style="background-color:#e2e0e0 !important;">IN WORD(USD): </td>
									<td colspan="6" style="width:5%;vertical-align:middle;"><span style="padding-left:20%;"><?= strtoupper($this->erp->convert_number_to_words($this->erp->formatDecimal($total)));?></span></td>
								</tr>
							</tbody>
						</table> 
					</div>
					<div class="row" style="font-size:11px !important;">	      
						<div class="col-xs-6 pull-left" style="margin-left: 35px;">
							<br/><br/><br/><br/><br/>
							<div style="width:40%;border-top:2px solid black;line-height:10px;background-color:#e2e0e0 !important;font-family:Times New Roman !important;">						
								<p style="padding-top:5px;margin-left: 20px;">ហត្ថលេខា និងឈ្មោះអ្នកទិញ</p>
								<p style="margin-left: 20px;">Customer's Signature & Name</p>
							</div>
						</div>
						<div class="col-xs-6 pull-right" style="margin-right: -175px;">
							<br/><br/><br/><br/><br/>
							<div style="width:40%;border-top:2px solid black;line-height:10px;background-color:#e2e0e0 !important;font-family:Times New Roman !important;">						
								<p style="padding-top:5px;margin-left: 20px;">ហត្ថលេខា និងឈ្មោះអ្នកលក់</p>
								<p style="margin-left: 30px;">Seller's Signature & Name</p>
							</div>
						</div>
					</div>	
					<div style="margin-left:0px;font-size:10px;line-height:10px;padding-top:10px;font-family:Times New Roman !important;">
						<p><b>សម្គាល់ :</b> ច្បាប់ដើមសម្រាប់អ្នកទិញ ច្បាប់ចម្លងសម្រាប់អ្នកលក់</p>
						<p><b>Note:</b> Original Invoice for Customer,Copied for seller</p>
					</div><br/><br/>
					<div id="wrap_invoice" style="width: 90%; margin:0px auto;">
						<div class="col-xs-10" style="margin-bottom:20px;">
							<button type="button" class="btn btn-primary btn-default no-print pull-left" onclick="window.print();">
								<i class="fa fa-print"></i> <?= lang('print'); ?>
							</button>&nbsp;&nbsp;
							<a href="<?=base_url()?>sales/print_invoice_twin/<?= $sid ?>" target="_blank"><button class="btn btn-primary no-print" ><i class="fa fa-print"></i>&nbsp;<?= lang("invoice"); ?></button></a>&nbsp;&nbsp;
							<a href="<?= site_url('sales'); ?>"><button class="btn btn-warning no-print" ><i class="fa fa-heart"></i>&nbsp;<?= lang("back_to_sale"); ?></button></a>		  
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>