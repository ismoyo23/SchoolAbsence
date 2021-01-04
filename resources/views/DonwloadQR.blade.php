<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<title>QR Code</title>
</head>
<body>

	<div style="margin-left: auto; margin-right: auto; width:200px ;" id="qrcodeholder"> </div>
	<p align="center" style="font-weight: bold;">Kode Kelas = <?php echo $qr; ?></p>

</body>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="{{ url('jQuery.qrcode-master/src/jquery.qrcode.js') }}"></script>
<script type="text/javascript" src="{{ url('jQuery.qrcode-master/src/qrcode.js') }}"></script>

<script type="text/javascript">
$(document).ready(function(){

jQuery('#qrcodeholder').qrcode("<?php echo $qr; ?>");
window.print();

});
</script>
</html>