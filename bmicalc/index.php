<?php

if(isset($_POST['subdata']) && ($_POST['subdata']) == "Submit"){
	extract($_POST);

	if($unit == 'Standard'){
		$heightsquared = $height * $height;
		$bmicalc = ($weight / $heightsquared) * 703;
		$bmi = number_format($bmicalc, 1);

		echo "<center>";
		echo "Your BMI is $bmi. ";

		if($bmi > '18.5' && $bmi < '25'){
			echo "You are considered within the normal BMI range.<br /><br />";
		}
		elseif($bmi < '18.5'){
			echo "You are considered underweight.<br /><br />";
		}
		elseif($bmi >= '25' and $bmi < '30'){
			echo "You are considered overweight.<br /><br />";
		}
		elseif($bmi >= '30' and $bmi < '40'){
			echo "You are considered obese.<br /><br ?>";
		}
		elseif($bmi >= 40){
			echo "You are considered extremely obese.<br /><br />";
		}
		elseif($bmi == '69'){
			echo "DAAAAAAAAAAANGGGGG BRO.<br /><br />";
		}

		echo "</center>";
	}
	elseif($unit == 'Metric'){
		$heightmet = $height / 100;
		$heightsquared = $heightmet * $heightmet;
		$bmicalc = $weight / $heightsquared;
		$bmi = number_format($bmicalc, 1);

		echo "<center>";
		echo "Your BMI is $bmi. ";

		if($bmi > '18.5' && $bmi < '25'){
			echo "You are considered within the normal BMI range.<br /><br />";
		}
		elseif($bmi < '18.5'){
			echo "You are considered underweight.<br /><br />";
		}
		elseif($bmi >= '25' and $bmi < '30'){
                        echo "You are considered overweight.<br /><br />";
                }       
                elseif($bmi >= '30' and $bmi < '40'){
                        echo "You are considered obese.<br /><br ?>";
                }       
                elseif($bmi >= 40){
                        echo "You are considered extremely obese.<br /><br />";
                }       
                elseif($bmi == '69'){
			echo "DAAAAAAAAAAANGGGGG BRO.<br /><br />";
		}

		echo "</center>";
	}
}

?>

<!doctype=html>
<html>
        <head>
                <title>BMI Calculator</title>
                <link rel="stylesheet" type="text/css" href ="bmicalcstyle.css" />
        </head>

        <body>
                <center><h2> BMI Calculator </h2></center>
                <div id="bmicalc">
                        <b>Please enter your measurements below. </b> <br /><br />
                        <form id="bmicalcform" name="bmicalcform" method="post">
				Unit: <select name="unit">
					<option value="pick">Pick A Unit</option>
					<option value="Standard">Standard</option>
					<option value="Metric">Metric</option>
					</select><br /><br />
                                Weight: <input type="number" name="weight" placeholder="(In lbs or kg)"> <br /><br />
                                Height: <input type="number" name="height" placeholder="(In inches or cm)"> <br /><br />
                                <input type="submit" name="subdata" id="subdata" class="btn" value="Submit"/>
                        </form>
                </div>
        </body>
</html>

