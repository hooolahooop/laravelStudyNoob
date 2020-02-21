<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Calculate apartment cost</title>

	<!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                /*background-color: #fff;
                color: #636b6f;*/
                background-color: #000000;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            fieldset {
            	width: 32%;
            	height: 35%;
            	border: 8px solid red;


            }

            label {
            	float: left;
            	padding-right: 15px;
            }

            form {
            	position: relative;
            	top: 25%;
            	left: 33%;
            	/*margin-top: 17.5%;
            	margin-left: 16%;*/
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: #000000;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .mini_title {
            	font-size: 44px;
            	color: white;
            }

            .micro_title {
        		font-size: 25px;
        		color: white;
            }

            .input_text {
            	font-size: 18px;
            	color: white;
            	text-align: left;
            }

            .field {
            	clear: both;
            	text-align: right;
            	/*line-height: 25px;*/
            }

            .main {
            	float: left;
            }

        </style>
</head>
<body>	
    <div class="micro_title">
        <?php
        	/*echo htmlspecialchars($_POST['adr']);
        ?>
        Состовляет
        <?php
        	$Price = $_POST['S']*$_POST['price'];
        	echo $Price;*/
        ?>
                    Стоимость жилья по адресу: 
            <?php
                $address = $_GET['adr'] ?? '';
                echo $address;
            ?>
            cоставляет
            <?php
                $square = $_GET['S'] ?? '';
                $cost = $_GET['price'] ?? '';

                $a = (int)$square * (int)$cost;
                echo $a;
            ?>
    </div>
</body>
</html>