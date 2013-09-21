<?php

//actived step
for($i=1;$i<5;$i++){
	if($i == $_SESSION['step']){
		$active_step[$i] = 'class="act"';
	}else{
		$active_step[$i] = '';
	}
}
?>
<div class="cart-view">
	<div class="header-cart">
		<div class="width50 floatleft">
			<h1><?php echo JText::_('COM_VIRTUEMART_CART_TITLE'); ?></h1>
		</div>
		<?php if (VmConfig::get('oncheckout_show_steps', 1) && $this->checkout_task==='confirm'){
			vmdebug('checkout_task',$this->checkout_task);
			echo '<div class="checkoutStep" id="checkoutStep4">'.JText::_('COM_VIRTUEMART_USER_FORM_CART_STEP4').'</div>';
		} ?>
		<div class="width50 floatleft right">
			<?php // Continue Shopping Button
			if ($this->continue_link_html != '') {
				echo $this->continue_link_html;
			} ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="checkout-step">
		<ul>
			<li <?php echo $active_step['1'];?> >
				<div class="split-1"></div>
				<div class="step-1">
					<?php echo JText::_('COM_VIRTUEMART_STEP1')?>
				</div>
			</li>
			<li <?php echo $active_step['2'];?> >
				<div class="split-1"></div>
				<div class="split"></div>
				<div class="step-2">
					<?php echo JText::_('COM_VIRTUEMART_STEP2')?>
				</div>
			</li>
			<li <?php echo $active_step['3'];?> >
				<div class="split-1"></div>
				<div class="split"></div>
				<div class="split"></div>
				<div class="step-3">
					<?php echo JText::_('COM_VIRTUEMART_STEP3')?>
				</div>
			</li>
			<li <?php echo $active_step['4'];?> >
				<div class="split-1"></div>
				<div class="split"></div>
				<div class="split"></div>
				<div class="split"></div>
				<div>
					<?php echo JText::_('COM_VIRTUEMART_STEP4')?>
				</div>
			</li>
		</ul>
	</div>
	<div class="body-cart">
		<?php 
		if($_SESSION['step']==1){
			$page = 'cart-info';
		}else if($_SESSION['step']==2){
			$page = 'infomation';
		}else if($_SESSION['step']==3){
			$page = 'payment_shipment';
		}else {
			$page = 'cart-summer';
		}
		include_once 'components/com_virtuemart/views/cart/tmpl/'.$page.'.php';
		
		?>
	</div>
</div>
<?php 

?>
