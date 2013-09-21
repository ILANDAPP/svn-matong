<?php

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

?>

<form method="post" id="paymentForm" name="choosePaymentRate" action="<?php echo JRoute::_('index.php'); ?>" class="form-validate">
<?php
	echo "<h2>".JText::_('COM_VIRTUEMART_CART_SELECT_PAYMENT_SHIPMENT')."</h2>";
?>
    <div class="width50 floatleft">
	<?php
     if ($this->found_payment_method) {


    echo "<fieldset>";
		foreach ($this->paymentplugins_payments as $paymentplugin_payments) {
		    if (is_array($paymentplugin_payments)) {
			foreach ($paymentplugin_payments as $paymentplugin_payment) {
			    echo $paymentplugin_payment.'<br />';
			}
		    }
		}
    echo "</fieldset>";

    } else {
	 echo "<h1>".$this->payment_not_found_text."</h1>";
    }


    ?>
    </div>
    <div class="width50 floatright">
	<?php
    if ($this->found_shipment_method) {


	   echo "<fieldset>\n";
	// if only one Shipment , should be checked by default
	    foreach ($this->shipments_shipment_rates as $shipment_shipment_rates) {
		if (is_array($shipment_shipment_rates)) {
		    foreach ($shipment_shipment_rates as $shipment_shipment_rate) {
			echo $shipment_shipment_rate."<br />\n";
		    }
		}
	    }
	    echo "</fieldset>\n";
    } else {
	 echo "<h1>".$this->shipment_not_found_text."</h1>";
    }

    ?>
    </div>
    <div class="clear"></div>
    <input type="submit" class="pre_button" name="pre_button" title="" align="middle" value="<?php echo JText::_('COM_VIRTUEMART_BOX_PREVIOUS')?>"/>
	<input type="submit" class="next_button" name="next_button" title="" align="middle" value="<?php echo JText::_('COM_VIRTUEMART_BOX_NEXT')?>"/>
    
    <input type="hidden" name="option" value="com_virtuemart" />
    <input type="hidden" name="view" value="cart" />
    <input type="hidden" name="task" value="set_payment_shipment" />
    <input type="hidden" name="controller" value="cart" />
</form>