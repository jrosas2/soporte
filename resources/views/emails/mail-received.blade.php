<!DOCTYPE html>
<html>
<head>
	<title>Nueva Solicitud</title>
</head>
<body>

	<p>Recibiste un mensaje de: {{ $msg['fname'] }} {{ $msg['lname'] }} - {{ $msg['email'] }} </p>
	<p><strong>Asunto:</strong> {{ $msg['subject'] }} </p>
	<p><strong>Mensaje:</strong> {{ $msg['message'] }} </p>

</body>
</html>