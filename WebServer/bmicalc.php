<?php
session_start();

if(isset($_POST['subdata']) && ($_POST['subdata']) == "Submit"){
	extract($_POST);

	if($unit != 'pick' && $weight != '' && $height != ''){
		if($unit == 'Standard'){
			$heightsquared = $height * $height;
			$bmicalc = ($weight / $heightsquared) * 703;
			$bmi = number_format($bmicalc, 1);

			$result = "Your BMI is $bmi. ";

			if($bmi > '18.5' && $bmi < '25'){
				$result .= "You are considered within the normal BMI range.";
			}
			elseif($bmi < '18.5'){
				$result .= "You are considered underweight.";
			}
			elseif($bmi >= '25' and $bmi < '30'){
				$result .= "You are considered overweight.";
			}
			elseif($bmi >= '30' and $bmi < '40'){
				$result .= "You are considered obese.";
			}
			elseif($bmi >= 40){
				$result .= "You are considered extremely obese.";
			}
		}
		elseif($unit == 'Metric'){
			$heightmet = $height / 100;
			$heightsquared = $heightmet * $heightmet;
			$bmicalc = $weight / $heightsquared;
			$bmi = number_format($bmicalc, 1);

			$result = "Your BMI is $bmi. ";

			if($bmi > '18.5' && $bmi < '25'){
				$result .= "You are considered within the normal BMI range.";
			}
			elseif($bmi < '18.5'){
				$result .= "You are considered underweight.";
			}
			elseif($bmi >= '25' and $bmi < '30'){
				$result .= "You are considered overweight.";
			}       
			elseif($bmi >= '30' and $bmi < '40'){
				$result .= "You are considered obese.";
			}       
			elseif($bmi >= 40){
				$result .= "You are considered extremely obese.";
			}       
		}
		
		$_SESSION['bmi'] = $result;
	}
	elseif($unit == 'pick' || empty($weight) || empty($height))
	{
		$result = "Please fill out everything.";
		
		unset($_SESSION['bmi']);
	}
}

?>

<!DOCTYPE html>
<html>
        <head>
                <title>BMI Calculator</title>
                <link rel="stylesheet" type="text/css" href="bmicalcstyle.css" />
        </head>

        <body>
                <h2> BMI Calculator </h2>
                <div class="bmicalc">
                        <form id="bmicalcform" name="bmicalcform" method="post">
				Unit: <select name="unit">
					<option value="pick">Pick A Unit</option>
					<option value="Standard">Standard</option>
					<option value="Metric">Metric</option>
					</select><br /><br />
                                Weight: <input type="number" name="weight" placeholder="(In lbs or kg)"> <br /><br />
                                Height: <input type="number" name="height" placeholder="(In inches or cm)"> <br /><br />
				<input type="submit" name="subdata" id="subdata" class="btn" value="Submit"/><br /><br />
				Result: <?php echo $result; sleep(5); header('profilePage.php');?> 
                        </form>
		</div>
        </body>
</html>

