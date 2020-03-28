<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">	
	<meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>Logg inn</title>
    <link rel="stylesheet" href="CSS/stylesheet.css">
    <link rel="stylesheet" href="CSS/Logginn.css">
</head>

<body>
    <form action="server.php" method="POST" name="form1">
        <div class="content">
            <h1>LOGO</h1>
                <input type="text" placeholder="email" name="email" class=""><br>
            <br>
                <input type="password" placeholder="password" name="password" class=""><br>
            <br>
<!-- /* https://getbootstrap.com/docs/4.0/components/buttons/#button-tags */ -->
                <input type="submit" id="login" name="loginbtn" class="btn primary" value="Logg inn">
            </div>
            </form>
</body>
</html>

