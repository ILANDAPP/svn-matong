<fieldset>
	<table class="cart-summary" cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<th align="left"><?php echo JText::_('COM_VIRTUEMART_CART_NAME') ?></th>
			<th align="left" width="60px"><?php echo JText::_('COM_VIRTUEMART_CART_SKU') ?></th>
			<th	align="center" width="60px"><?php echo JText::_('COM_VIRTUEMART_CART_PRICE') ?></th>
			<th align="right" width="140px"><?php echo JText::_('COM_VIRTUEMART_CART_QUANTITY') ?>
				/ <?php echo JText::_('COM_VIRTUEMART_CART_ACTION') ?></th>


              <?php if ( VmConfig::get('show_tax')) { ?>
            <th align="right" width="60px"><?php  echo "<span  class='priceColor2'>".JText::_('COM_VIRTUEMART_CART_SUBTOTAL_TAX_AMOUNT') ?></th>
			<?php } ?>
            <th align="right" width="60px"><?php echo "<span  class='priceColor2'>".JText::_('COM_VIRTUEMART_CART_SUBTOTAL_DISCOUNT_AMOUNT') ?></th>
			<th align="right" width="110px"><?php echo JText::_('COM_VIRTUEMART_CART_TOTAL') ?></th>
		</tr>



		<?php
		$i=1;
// 		vmdebug('$this->cart->products',$this->cart->products);
		foreach( $this->cart->products as $pkey =>$prow ) { ?>
			<tr valign="top" class="sectiontableentry<?php echo $i ?>">
				<td align="left" >
					<?php if ( $prow->virtuemart_media_id) {  ?>
						<span class="cart-images">
						 <?php
						 if(!empty($prow->image)) echo $prow->image->displayMediaThumb('',false);
						 ?>
						</span>
					<?php } ?>
					<?php echo JHTML::link($prow->url, $prow->product_name).$prow->customfields; ?>

				</td>
				<td align="left" ><?php  echo $prow->product_sku ?></td>
				<td align="center" >
				<?php
// 					vmdebug('$this->cart->pricesUnformatted[$pkey]',$this->cart->pricesUnformatted[$pkey]['priceBeforeTax']);
					echo $this->currencyDisplay->createPriceDiv('basePrice','', $this->cart->pricesUnformatted[$pkey],false);
// 					echo $prow->salesPrice ;
					?>
				</td>
				<td align="right" ><form action="<?php echo JRoute::_('index.php'); ?>" method="post" class="inline">
				<input type="hidden" name="option" value="com_virtuemart" />
				<input type="text" title="<?php echo  JText::_('COM_VIRTUEMART_CART_UPDATE') ?>" class="inputbox" size="3" maxlength="4" name="quantity" value="<?php echo $prow->quantity ?>" />
				<input type="hidden" name="view" value="cart" />
				<input type="hidden" name="task" value="update" />
				<input type="hidden" name="cart_virtuemart_product_id" value="<?php echo $prow->cart_item_id  ?>" />
				<input type="submit" class="vmicon vm2-add_quantity_cart" name="update" title="<?php echo  JText::_('COM_VIRTUEMART_CART_UPDATE') ?>" align="middle" value=" "/>
			  </form>
					<a class="vmicon vm2-remove_from_cart" title="<?php echo JText::_('COM_VIRTUEMART_CART_DELETE') ?>" align="middle" href="<?php echo JRoute::_('index.php?option=com_virtuemart&view=cart&task=delete&cart_virtuemart_product_id='.$prow->cart_item_id  ) ?>"> </a>
				</td>

				<?php if ( VmConfig::get('show_tax')) { ?>
				<td align="right"><?php echo "<span class='priceColor2'>".$this->currencyDisplay->createPriceDiv('taxAmount','', $this->cart->pricesUnformatted[$pkey],false,false,$prow->quantity)."</span>" ?></td>
                                <?php } ?>
				<td align="right"><?php echo "<span class='priceColor2'>".$this->currencyDisplay->createPriceDiv('discountAmount','', $this->cart->pricesUnformatted[$pkey],false,false,$prow->quantity)."</span>" ?></td>
				<td colspan="1" align="right">
				<?php
				if (VmConfig::get('checkout_show_origprice',1) && !empty($this->cart->pricesUnformatted[$pkey]['basePriceWithTax']) && $this->cart->pricesUnformatted[$pkey]['basePriceWithTax'] != $this->cart->pricesUnformatted[$pkey]['salesPrice'] ) {
					echo '<span class="line-through">'.$this->currencyDisplay->createPriceDiv('basePriceWithTax','', $this->cart->pricesUnformatted[$pkey],true,false,$prow->quantity) .'</span><br />' ;
				}
				echo $this->currencyDisplay->createPriceDiv('salesPrice','', $this->cart->pricesUnformatted[$pkey],false,false,$prow->quantity) ?></td>
			</tr>
		<?php
			$i = 1 ? 2 : 1;
		} ?>
		<!--Begin of SubTotal, Tax, Shipment, Coupon Discount and Total listing -->
                  <?php if ( VmConfig::get('show_tax')) { $colspan=3; } else { $colspan=2; } ?>
		<tr>
			<td colspan="4">&nbsp;</td>

			<td colspan="<?php echo $colspan ?>"><hr /></td>
		</tr>
		  <tr class="sectiontableentry1">
			<td colspan="4" align="right"><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_PRODUCT_PRICES_TOTAL'); ?></td>

                        <?php if ( VmConfig::get('show_tax')) { ?>
			<td align="right"><?php echo "<span  class='priceColor2'>".$this->currencyDisplay->createPriceDiv('taxAmount','', $this->cart->pricesUnformatted,false)."</span>" ?></td>
                        <?php } ?>
			<td align="right"><?php echo "<span  class='priceColor2'>".$this->currencyDisplay->createPriceDiv('discountAmount','', $this->cart->pricesUnformatted,false)."</span>" ?></td>
			<td align="right"><?php echo $this->currencyDisplay->createPriceDiv('salesPrice','', $this->cart->pricesUnformatted,false) ?></td>
		  </tr>

			<?php
		if (VmConfig::get('coupons_enable')) {
		?>
			<tr class="sectiontableentry2">
				<td colspan="4" align="left">
				    <?php if(!empty($this->layoutName) && $this->layoutName=='default') {
					   // echo JHTML::_('link', JRoute::_('index.php?view=cart&task=edit_coupon',$this->useXHTML,$this->useSSL), JText::_('COM_VIRTUEMART_CART_EDIT_COUPON'));
					    echo $this->loadTemplate('coupon');
				    }
				?>

				<?php if (!empty($this->cart->cartData['couponCode'])) { ?>
					 <?php
						echo $this->cart->cartData['couponCode'] ;
						echo $this->cart->cartData['couponDescr'] ? (' (' . $this->cart->cartData['couponDescr'] . ')' ): '';
						?>

				</td>

					 <?php if ( VmConfig::get('show_tax')) { ?>
					<td align="right"><?php echo $this->currencyDisplay->createPriceDiv('couponTax','', $this->cart->pricesUnformatted['couponTax'],false); ?> </td>
					 <?php } ?>
					<td align="right">&nbsp;</td>
					<td align="right"><?php echo $this->currencyDisplay->createPriceDiv('salesPriceCoupon','', $this->cart->pricesUnformatted['salesPriceCoupon'],false); ?> </td>
				<?php } else { ?>
					<td colspan="6" align="left">&nbsp;</td>
				<?php }

				?>
			</tr>
		<?php } ?>


		<?php
		foreach($this->cart->cartData['DBTaxRulesBill'] as $rule){ ?>
			<tr class="sectiontableentry<?php $i ?>">
				<td colspan="4" align="right"><?php echo $rule['calc_name'] ?> </td>

                                   <?php if ( VmConfig::get('show_tax')) { ?>
				<td align="right"> </td>
                                <?php } ?>
				<td align="right"><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'].'Diff','', $this->cart->pricesUnformatted[$rule['virtuemart_calc_id'].'Diff'],false); ?></td>
				<td align="right"><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'].'Diff','', $this->cart->pricesUnformatted[$rule['virtuemart_calc_id'].'Diff'],false); ?> </td>
			</tr>
			<?php
			if($i) $i=1; else $i=0;
		} ?>

		<?php

		foreach($this->cart->cartData['taxRulesBill'] as $rule){ ?>
			<tr class="sectiontableentry<?php $i ?>">
				<td colspan="4" align="right"><?php echo $rule['calc_name'] ?> </td>
				<?php if ( VmConfig::get('show_tax')) { ?>
				<td align="right"><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'].'Diff','', $this->cart->pricesUnformatted[$rule['virtuemart_calc_id'].'Diff'],false); ?> </td>
				 <?php } ?>
				<td align="right"><?php ?> </td>
				<td align="right"><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'].'Diff','', $this->cart->pricesUnformatted[$rule['virtuemart_calc_id'].'Diff'],false); ?> </td>
			</tr>
			<?php
			if($i) $i=1; else $i=0;
		}

		foreach($this->cart->cartData['DATaxRulesBill'] as $rule){ ?>
			<tr class="sectiontableentry<?php $i ?>">
				<td colspan="4" align="right"><?php echo   $rule['calc_name'] ?> </td>

                                     <?php if ( VmConfig::get('show_tax')) { ?>
				<td align="right"> </td>

                                <?php } ?>
				<td align="right"><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'].'Diff','', $this->cart->pricesUnformatted[$rule['virtuemart_calc_id'].'Diff'],false); ?>  </td>
				<td align="right"><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'].'Diff','', $this->cart->pricesUnformatted[$rule['virtuemart_calc_id'].'Diff'],false); ?> </td>
			</tr>
			<?php
			if($i) $i=1; else $i=0;
		} ?>



		  <tr>
			<td colspan="4">&nbsp;</td>
			<td colspan="<?php echo $colspan ?>"><hr /></td>
		  </tr>
		  <tr class="sectiontableentry2">
			<td colspan="4" align="right"><?php echo JText::_('COM_VIRTUEMART_CART_TOTAL') ?>: </td>

                        <?php if ( VmConfig::get('show_tax')) { ?>
			<td align="right"> <?php echo "<span  class='priceColor2'>".$this->currencyDisplay->createPriceDiv('billTaxAmount','', $this->cart->pricesUnformatted['billTaxAmount'],false)."</span>" ?> </td>
                        <?php } ?>
			<td align="right"> <?php echo "<span  class='priceColor2'>".$this->currencyDisplay->createPriceDiv('billDiscountAmount','', $this->cart->pricesUnformatted['billDiscountAmount'],false)."</span>" ?> </td>
			<td align="right"><strong><?php echo $this->currencyDisplay->createPriceDiv('billTotal','', $this->cart->pricesUnformatted['billTotal'],false); ?></strong></td>
		  </tr>
		    <?php
		    if ( $this->totalInPaymentCurrency) {
			?>

		       <tr class="sectiontableentry2">
					    <td colspan="4" align="right"><?php echo JText::_('COM_VIRTUEMART_CART_TOTAL_PAYMENT') ?>: </td>

					    <?php if ( VmConfig::get('show_tax')) { ?>
					    <td align="right">  </td>
					    <?php } ?>
					    <td align="right">  </td>
					    <td align="right"><strong><?php echo $this->totalInPaymentCurrency;   ?></strong></td>
				      </tr>
				      <?php
		    }
		    ?>


	</table>
</fieldset>
<?php 
if($_SESSION['step'] == 1){
?>
	<a class="next_button" align="middle" href="<?php echo JRoute::_('index.php?option=com_virtuemart&view=cart&step=2')?>" title="<?php echo JText::_('COM_VIRTUEMART_BOX_NEXT')?>"><?php echo JText::_('COM_VIRTUEMART_BOX_NEXT')?></a>
<?php 
}

?>