<script type="text/javascript">
    $(document).ready(function () {
        $('#form').hide();
        $('.toggle_down').click(function () {
            $("#form").slideDown();
            return false;
        });
        $('.toggle_up').click(function () {
            $("#form").slideUp();
            return false;
        });
        $("#product").autocomplete({
            source: '<?= site_url('reports/suggestions'); ?>',
            select: function (event, ui) {
                $('#product_id').val(ui.item.id);               
            },
            minLength: 1,
            autoFocus: false,
            delay: 300,
        });
    });
</script>
<style type="text/css">
    .numeric {
        text-align:right !important;
    }
	
</style>
<?php 
    echo form_open('reports/getdepositBySupplier', 'id="action-form"');
?>
<style>
	#POData .active th,#POData .foot td{
			color: #fff;
			background-color: #428BCA;
			border-color: #357ebd;
	}

</style>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-star"></i><?=lang('deposit_by_supplier');?>
        </h2>
        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a href="#" class="toggle_up tip" title="<?= lang('hide_form') ?>">
                        <i class="icon fa fa-toggle-up"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="toggle_down tip" title="<?= lang('show_form') ?>">
                        <i class="icon fa fa-toggle-down"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-tasks tip" data-placement="left" title="<?=lang("actions")?>"></i></a>
                    <ul class="dropdown-menu pull-right" class="tasks-menus" role="menu" aria-labelledby="dLabel">
						<li>
							<a href="#" id="excel" data-action="export_excel">
								<i class="fa fa-file-excel-o"></i> <?=lang('export_to_excel')?>
							</a>
						</li>
					<!--	<li>
							<a href="#" id="pdf" data-action="export_pdf">
								<i class="fa fa-file-pdf-o"></i> <?=lang('export_to_pdf')?>
							</a>
						</li> -->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div style="display: none;">
        <input type="hidden" name="form_action" value="" id="form_action"/>
        <?=form_submit('performAction', 'performAction', 'id="action-form-submit"')?>
    </div>
    <?= form_close()?>  
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?=lang('list_results');?></p>
                <div id="form">

                    <?php echo form_open("reports/getdepositBySupplier"); ?>
                    <div class="row">
						
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("supplier", "supplier"); ?>
                                <?php echo form_input('supplier', (isset($_POST['supplier'])? $_POST['supplier'] : ''), 'class="form-control" id="supplier"'); ?>
                            </div>
                        </div>
						
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("start_date", "start_date"); ?>
                                <?php echo form_input('start_date', (isset($_POST['start_date']) ? $_POST['start_date'] : ''), 'class="form-control date" id="start_date"'); ?>
                            </div>
                        </div>
						
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("end_date", "end_date"); ?>
                                <?php echo form_input('end_date', (isset($_POST['end_date']) ? $_POST['end_date'] : ''), 'class="form-control date" id="end_date"'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div
                            class="controls"> <?php echo form_submit('submit_report', $this->lang->line("submit"), 'class="btn btn-primary"'); ?> </div>
                    </div>
                    <?php echo form_close(); ?>

                </div>

                <div class="clearfix"></div>
                <div class="table-responsive">
                    <table id="POData" cellpadding="0" cellspacing="0" border="0" class="table table-condensed table-bordered table-hover table-striped">
                      
                            <tr class="active">
                                <th class="text-center" ><?php echo $this->lang->line("supplier_name"); ?></th>
                                <th class="text-center"><?php echo $this->lang->line("date"); ?></th>
                                <th class="text-center"><?php echo $this->lang->line("reference"); ?></th>
                                <th class="text-center"><?php echo $this->lang->line("amount"); ?></th>
                            </tr>
             
                        <?php
							$arr_supplier_type = array('0' => 'supplier', '1' => 'custom');
							foreach($arr_supplier_type as $key => $value){ 
						?>
						    <tr>
								<th colspan="11" style="font-size : 16px !important;"><?= lang("supplier_type")?> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <?= lang($value); ?></th>
							</tr>
						<?php
							$sup_names = $this->reports_model->getSupplierBySupType($start_date2, $end_date2, $supplier, $key);
							$total_deposit_all = 0;
							foreach($sup_names as $sup_name){
						?>
						    <tr class="success">
								<th class="th_parent" colspan="11"><?= $sup_name->sup_name; ?></th>
							</tr>
						<?php
								$deposit_supplier = $this->reports_model->getDepositSuppliers($sup_name->sup_id);
								$total_deposit = 0;
								foreach($deposit_supplier as $sup){
									$return_deposit = $this->reports_model->getDepositReturnByDepositID($sup->deposit_id);
									$deposit_amount = $sup->total_amount + $return_deposit->amount_return;
									$total_deposit += $deposit_amount;
						?>
						            <tr>
										<td></td>
										<td  class="text-center"><?=  $sup->date; ?></td>
										<td  class="text-center"><?=  $sup->reference; ?></td>
										<td  class="text-right"><?=  $this->erp->formatMoney($deposit_amount); ?></td>
									</tr>
						<?php
								}
								$total_deposit_all += $total_deposit;
						?>
						        <tr>
									<td class="text-right" colspan="3"><b>Total</b></td>
									<td class="text-right"><b><?=$this->erp->formatMoney($total_deposit); ?></b></td>
								</tr>
						<?php
							}
						?>
									
								<tr class="foot">
									<td class="text-right" colspan="3"><b>Grand Total</b></td>
									<td class="text-right"><b><?=$this->erp->formatMoney($total_deposit_all)?></b></td>
								</tr>
						<?php
						}
						?>	
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

        $("#excel").click(function(e){
            e.preventDefault();
            window.location.href = "<?=site_url('reports/getdepositBySupplierExport/0/xls/'.$supplier.'/'.$start_date2.'/'.$end_date2)?>";
            return false;
        });
        $('#pdf').click(function (event) {
            event.preventDefault();
            window.location.href = "<?=site_url('reports/getdepositBySupplierExport/pdf/?v=1'.$v)?>";
            return false;
        });

    });
</script>