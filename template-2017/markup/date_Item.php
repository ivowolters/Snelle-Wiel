
<button type="button" value="<?php echo $value; ?>" onclick="window.location.href = '<?php echo BaseClass::$oVariables->sDomainOnly . "ritten-dag/" . $value; ?>'"><?php echo date("Y-m-d", $value); ?></button>
<br/>