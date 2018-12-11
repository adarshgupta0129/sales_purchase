<?php if($type==1){ ?>
<select class="form-control m-bootstrap-select m_selectpicker" name="party_name" id="party_name" data-required-select data-name="party name">
   <option disabled selected value="">Select Name</option>
   <?php foreach($sales_party as $row) { ?>
   <option value="<?=$row->m03_name?>"><?=$row->m03_name?></option>
   <?php } ?>
</select>
<span></span>
<?php }  if($type==2){ ?>

<select class="form-control m-bootstrap-select m_selectpicker" name="party_name" id="party_name" data-required-select data-name="party name">
   <option disabled selected value="">Select Name</option>
   <?php foreach($sales_party as $row) { ?>
   <option value="<?=$row->m02_name?>"><?=$row->m02_name?></option>
   <?php } ?>
</select>
<span></span>

<?php } ?>
<script src="<?=base_url()?>assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>