<?php include "template/include/header.php"; ?>
	<form name="?" method="post" action="http://www.bior.com/doku_notify.php" enctype="application/x-www-form-urlencoded">
		<input type="text" name="TRANSIDMERCHANT" value="REG288" class="form-control" maxlength="30" />
		<input type="text" name="RESULTMSG" value="SUCCESS" class="form-control" maxlength="30" />
		<input type="text" name="PAYMENTDATETIME" value="<?php echo date('YmdHis') ?>" class="form-control" maxlength="30" />
		<input type="submit" value="SUBMIT" />
	</form>
<?php include "template/include/footer.php"; ?>