<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
<form method="POST" action="#">
	<label>Number:</label><br>
	<input type="text" name="contact"><br>
	<label>Message:</label><br>
	<textarea name="message" cols="22" rows="5"></textarea><br>
	<button type="submit" name="btnSend"> Send</button>
</form>
</body>
</html>

<?php 

	if(isset($_POST['btnSend'])){
		include('smsgateway.php');

		$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU2MzY0MTA2OSwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjcxODc4LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.1L8SvVoKmlDqpEqa-_4R90-AwxzLqsIf2C1kaMgkqis";

	    $phone_number = $_POST['contact'];
	    $message = $_POST['message'];
	    $deviceID = 123020;
	    $options = [];

	    $smsGateway = new SmsGateway($token);
	    $result = $smsGateway->sendMessageToNumber($phone_number, $message, $deviceID, $options);
	    
	    if($result){
	    	echo 'Success!';
	    	echo print_r($result);
	    }else{
	    	echo 'Error:';
	    	echo print_r($result);
	    }
	}

 ?>