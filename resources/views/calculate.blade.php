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
                float: left;
                margin-top: 55px;
            }

            .m-b-md {
                position: relative;
                margin-bottom: 30px;
                right: 3%;
            }

            .m-b-md2 {
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

            .text {
            	position: relative;
            	top: 0%;
            	left: 0%;
            	float: left;
            	font-size: 18px;
            	color: white;
            	text-align: center;
            	margin-top: 20px;
            }

        </style>
</head>
<body>
    <div class="links">
    	<a href="/">Назад</a>
    </div>
	<div class="content">
        <div class="mini_title m-b-md">
            Расчет стоимости жилья
        </div>
        <!--<div class="micro_title m-b-md">
        	Для рассчета введите данные:
        </div>-->
        <form method="GET" action="<?= $_SERVER['REQUEST_URI'];?>">
	        <fieldset>
	        	<legend class="micro_title m-b-md2"><b>Для расчета введите данные:</b></legend>
	        	<div class="main">
		        	<div class="field">
			        	<label for="adr" class="input_text">Адрес: </label>
			        	<input id="address" name="address" type="text" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.1.1/dist/css/suggestions.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.1.1/dist/js/jquery.suggestions.min.js"></script>

<script>
    $("#address").suggestions({
        token: "a40338c85e3de65741d26a038f8d3a824513fd97",
        type: "ADDRESS",
        /* Вызывается, когда пользователь выбирает одну из подсказок */
        onSelect: function(suggestion) {
            console.log(suggestion);
        }
    });
</script>
			        </div>

			        <div class="field">	
			        	<label for="S" class="input_text">Площадь жилья в м<sup>2</sup>: </label>
			        	<input type="number" id="S" name="S" maxlength="5" required>
			        </div>
			        
			        <div class="field">
			        	<label for="price" class="input_text">Cтоимость 1 м<sup>2</sup> в рублях: </label>
			        	<input type="number" id="price" name="price" maxlength="9" required>
		        	</div>
		        	<br>
		        	<br>
		        	<div>
		        		<input type="submit" name="" value="Рассчитать">
		        	</div>
		        </div>
	        </fieldset>


	        <?php

	        	use Illuminate\Support\Facades\Auth;



	        	class CBRAgent
	        	{
	        		protected $list = array();

	        		public function load()
	        		{
	        			$xml = new DOMDocument();
	        			$url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . date('d.m.Y');

	        			if (@$xml->load($url))
	        			{
	        				$this->list = array();

	        				$root = $xml->documentElement;
	        				$items = $root->getElementsByTagName('Valute');

	        				foreach ($items as $item)
	        				{
	        					$code = $item->getElementsByTagName('CharCode')->item(0)->nodeValue;
	        					$curs = $item->getElementsByTagName('Value')->item(0)->nodeValue;
	        					$this->list[$code] = floatval(str_replace(',', '.', $curs));
	        				}	

	        				return true;
	        			}	
	        			else
	        				return false;	
	        		}

	        		public function get($cur)
	        		{
	        			return isset($this->list[$cur]) ? $this->list[$cur] : 0;
	        		}
	        	}

	        	$cbr = new CBRAgent();
	        	if ($cbr->load()){
	        		$usd_curs = $cbr->get('USD');
	        	}
	        ?>



	        <div class="text">
	        	Стоимость жилья по адресу: 
		        <?php
		        	$address = $_GET['adr'] ?? '';
		        	echo $address.",";
		        ?>
		        составляет:
		        <?php
		        	$square = $_GET['S'] ?? '';
		        	$cost = $_GET['price'] ?? '';

		        	$a = (int)$square * (int)$cost / $usd_curs;
		        	echo round($a, 2).' $';
		        ?>
		        <?php
		        	if (! Auth::check()) {
		        		return view('welcome');
		        	}
		        ?>
	    	</div>
	    </form>
    </div>
</body>
</html>