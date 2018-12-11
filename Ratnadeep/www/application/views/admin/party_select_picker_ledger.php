<?php if($type==1){ ?>
<select class="form-control m-bootstrap-select m_selectpicker" name="party_name" id="party_name" data-name="party name">
   <option selected value="0">All</option>
   <?php foreach($sales_party as $row) { ?>
   <option value="<?=$row->m03_name?>"><?=$row->m03_name?></option>
   <?php } ?>
</select>
<span></span>
<?php }  if($type==2){ ?>

<select class="form-control m-bootstrap-select m_selectpicker" name="party_name" id="party_name" data-name="party name">
   <option selected value="0">All</option>
   <?php foreach($sales_party as $row) { ?>
   <option value="<?=$row->m02_name?>"><?=$row->m02_name?></option>
   <?php } ?>
</select>
<span></span>

<?php }  if($type==0){ ?>

<select class="form-control m-bootstrap-select m_selectpicker" name="party_name" id="party_name" data-name="party name">
   <option selected value="0">All</option>
</select>
<span></span>

<?php } ?>
<script src="<?=base_url()?>assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>