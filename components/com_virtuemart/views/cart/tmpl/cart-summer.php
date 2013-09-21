<div class="billto-shipto">
	<div class="width50 floatleft">
	<?php echo "<h2 class='billto-icon'>".JText::_('COM_VIRTUEMART_USER_FORM_BILLTO_LBL')."</h2>";	?>
		<div class="output-billto">
		<?php
		foreach($this->cart->BTaddress['fields'] as $item){
			if(!empty($item['value'])){
				?>
					<div class="values vm2<?php echo '-'.$item['name'] ?>" ><?php echo "<div class='title-billto'>".$this->escape($item['title']).': </div>'; ?><?php echo $this->escape($item['value']) ?></div>
				<?php
			}
		} ?>
		
		<div class="clear"></div>
		</div>
		<input type="hidden" name="billto" value="<?php echo $this->cart->lists['billTo']; ?>"/>
	</div>
	<div class="width50 floatleft">
	<?php echo "<h2 class='shipto-icon'>".JText::_('COM_VIRTUEMART_USER_FORM_SHIPTO_LBL')."</h2>";	?>
		<div class="output-shipto">
		<?php
		if(!empty($this->cart->STaddress['fields'])){
			foreach($this->cart->STaddress['fields'] as $item){
			if(!empty($item['value'])){
				?>
					<div class="values vm2<?php echo '-'.$item['name'] ?>" ><?php echo "<div class='title-billto'>".$this->escape($item['title']).': </div>'; ?><?php echo $this->escape($item['value']) ?></div>
				<?php
				}
			}
		}
 		?>
		
		<a class="details" href="<?php echo JRoute::_('index.php?option=com_virtuemart&view=cart&step=2',$this->useXHTML,$this->useSSL) ?>">
		<?php echo JText::_('COM_VIRTUEMART_CHANGE'); ?>
		</a>
		<div class="clear"></div>
		</div>
		<?php if(!isset($this->cart->lists['current_id'])) $this->cart->lists['current_id'] = 0; ?>

	</div>

	<div class="clear"></div>
</div>
<div class="clear"></div>
<div class="shipment-payment-sumary">
	<div class="width50 floatleft">
		<?php echo "<h2 class='payment-icon'>".JText::_('COM_VIRTUEMART_CART_PAYMENT')."</h2>";	?>
		<?php echo "<div class='item-payment'>".$this->cart->cartData['paymentName']."</div>"; ?>
	</div>
	<div class="width50 floatright">
		<?php echo "<h2 class='shipment-icon'>".JText::_('COM_VIRTUEMART_CART_SHIPPING')."</h2>";	?>
		<?php echo "<div class='item-payment'>".$this->cart->cartData['shipmentName']; ?>
		<a class="details" href="<?php echo JRoute::_('index.php?option=com_virtuemart&view=cart&step=3',$this->useXHTML,$this->useSSL) ?>">
			<?php echo JText::_('COM_VIRTUEMART_CHANGE'); ?>
		</a>
	</div>
</div>
</div>
<div class="clear"></div>

<?php 
include_once 'components/com_virtuemart/views/cart/tmpl/cart-info.php';
?>
<form method="post" id="checkoutForm" name="checkoutForm" action="<?php echo JRoute::_( 'index.php?option=com_virtuemart&view=cart'.$taskRoute,$this->useXHTML,$this->useSSL ); ?>">
	<?php
	echo $this->checkout_link_html;
	$text = JText::_('COM_VIRTUEMART_ORDER_CONFIRM_MNU');
	?>
	<input type='hidden' name='task' value='<?php echo $this->checkout_task; ?>'/>
	<input type='hidden' name='option' value='com_virtuemart'/>
	<input type='hidden' name='view' value='cart'/>
</form>