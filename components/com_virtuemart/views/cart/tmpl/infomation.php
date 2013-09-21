<form action="index.php" method="post">
	<div class="width50 floatleft">
	<h2><?php echo JText::_('COM_VIRTUEMART_USER_FORM_EDIT_BILLTO_LBL')?></h2>
	<table class="adminform user-details" id="bt_user_info" >
		<tbody><tr>
			<td class="key">
				<label class="email" for="email_field">
					<?php echo JText::_('COM_VIRTUEMART_USER_FORM_EMAIL')?>*
				</label>
			</td>
			<td>
				<input type="text" id="bt_email_field" name="email" size="30" value="<?php echo $_SESSION['billto']['email'];?>" class="required" maxlength="100" aria-required="true" required="required"> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label class="first_name" for="first_name_field">
					<?php echo JText::_('COM_VIRTUEMART_SHOPPER_FORM_FIRST_NAME')?> *
				</label>
			</td>
			<td>
				<input type="text" id="bt_first_name_field" name="first_name" size="30" value="<?php echo $_SESSION['billto']['first_name'];?>" class="required" maxlength="32" aria-required="true" required="required"> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label class="address_1" for="address_1_field">
					<?php echo JText::_('COM_VIRTUEMART_SHOPPER_FORM_ADDRESS_1')?> *
				</label>
			</td>
			<td>
				<input type="text" id="bt_address_1_field" name="address_1" size="30" value="<?php echo $_SESSION['billto']['address_1'];?>" class="required" maxlength="64" aria-required="true" required="required"> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label class="phone_1" for="phone_1_field">
					<?php echo JText::_('COM_VIRTUEMART_SHOPPER_FORM_PHONE')?> *
				</label>
			</td>
			<td>
				<input type="text" id="bt_phone_1_field" name="phone_1" size="30" value="<?php echo $_SESSION['billto']['phone_1'];?>" class="required" maxlength="32" aria-required="true" required="required"> 
			</td>
		</tr>
	</tbody>
	</table>
	
	</div>
	
	<div class="width50 floatright">
	<h2><?php echo JText::_('COM_VIRTUEMART_USER_FORM_ADD_SHIPTO_LBL')?></h2>
	<input type="checkbox" id="copy_info" name="copy_info" "/>Copy
	<table class="adminform user-details" id="st_user_info" >
		<tbody><tr>
			<td class="key">
				<label class="email" for="email_field">
					<?php echo JText::_('COM_VIRTUEMART_USER_FORM_EMAIL')?>*
				</label>
			</td>
			<td>
				<input type="text" id="st_email_field" name="st_email" size="30" value="<?php echo $_SESSION['shipto']['shipto_email'];?>" class="required" maxlength="100" aria-required="true" required="required"> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label class="first_name" for="first_name_field">
					<?php echo JText::_('COM_VIRTUEMART_SHOPPER_FORM_FIRST_NAME')?> *
				</label>
			</td>
			<td>
				<input type="text" id="st_first_name_field" name="st_first_name" size="30" value="<?php echo $_SESSION['shipto']['shipto_first_name'];?>" class="required" maxlength="32" aria-required="true" required="required"> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label class="address_1" for="address_1_field">
					<?php echo JText::_('COM_VIRTUEMART_SHOPPER_FORM_ADDRESS_1')?> *
				</label>
			</td>
			<td>
				<input type="text" id="st_address_1_field" name="st_address_1" size="30" value="<?php echo $_SESSION['shipto']['shipto_address_1'];?>" class="required" maxlength="64" aria-required="true" required="required"> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label class="phone_1" for="phone_1_field">
					<?php echo JText::_('COM_VIRTUEMART_SHOPPER_FORM_PHONE')?>  *
				</label>
			</td>
			<td>
				<input type="text" id="st_phone_1_field" name="st_phone_1" size="30" value="<?php echo $_SESSION['shipto']['shipto_phone_1'];?>" class="required" maxlength="32" aria-required="true" required="required"> 
			</td>
		</tr>
	</tbody>
	</table>
	</div>
	<input type="submit" class="pre_button" name="pre_button" title="" align="middle" value="<?php echo JText::_('COM_VIRTUEMART_BOX_PREVIOUS')?>"/>
	<input type="submit" class="next_button" name="next_button" title="" align="middle" value="<?php echo JText::_('COM_VIRTUEMART_BOX_NEXT')?>"/>
	<input type='hidden' name='task' value='saveBT'/>
	<input type='hidden' name='option' value='com_virtuemart'/>
	<input type='hidden' name='view' value='cart'/>
	<input type="hidden" name="agreed" id="agreed_field" value="1">
</form>
<script type="text/javascript" >
jQuery(function(){
	jQuery("#copy_info").click(function(){
		var tick = jQuery("#copy_info").attr('checked');
		if(tick == 'checked'){
			copyBT();
		}else{
			clearST();
		}
	});
});

function copyBT(){
	var st_email = jQuery('#bt_email_field').val();	
	var st_name = jQuery('#bt_first_name_field').val();
	var st_address = jQuery('#bt_address_1_field').val();
	var st_phone = jQuery('#bt_phone_1_field').val();
	jQuery('#st_email_field').val(st_email);
	jQuery('#st_first_name_field').val(st_name);
	jQuery('#st_address_1_field').val(st_address);
	jQuery('#st_phone_1_field').val(st_phone);	
}
function clearST(){
	jQuery('#st_email_field').val('');
	jQuery('#st_first_name_field').val('');
	jQuery('#st_address_1_field').val('');
	jQuery('#st_phone_1_field').val('');	
}
</script>
