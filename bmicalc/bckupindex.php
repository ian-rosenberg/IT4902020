<?php

if(isset($_POST['givems']) && ($_POST['givems']) == 'Submit'){
	#extract($_POST);
	$weight = $_POST['weight'];
	$height = $_POST['height'];
	$unit = $_POST['unit'];

	if($unit == 'Standard'){
		$adj_weight = $weight * 0.045359237;
		$adj_height = $height * 0.0254;
		$adj_height_final = $adj_height * $adj_height;
		$prep_bmi = $adj_weight / $adj_height_final;
		$bmi = number_format($prep_bmi, 1);

		echo '<center>';
		echo 'Your BMI is $bmi. ';

		if($bmi > '18.5' && $bmi < '25'){
			echo 'You are considered within the normal BMI range.<br /><br />';
		}
		elseif($bmi < '18.5'){
			echo 'You are considered underweight.<br /><br />';
		}
		elseif($bmi >= '25' && $bmi < '30'){
			echo 'You are considered overweight.<br /><br />';
		}
		elseif($bmi >= '30' && $bmi < '40'){
			echo 'You are considered obese.<br /><br ?>';
		}
		elseif($bmi >= 40){
			echo 'You are considered extremely obese.<br /><br />';
		}
		elseif($bmi == '69'){
			echo 'DAAAAAAAAAAANGGGGG BRO.<br /><br />';
		}

		echo '</center>';
	}
	elseif($unit == 'Metric'){
		$adj_height = $height / 100;
		$adj_height_final = $adj_height * $adj_height;
		$prep_bmi = $weight / $adj_height_final;
		$bmi = number_format($prep_bmi, 1);

		echo '<center>';
		echo 'Your BMI is $bmi. ';

		if($bmi > '18.5' && $bmi < '25'){
			echo 'You are considered within the normal BMI range.<br /><br />';
		}
		elseif($bmi < '18.5'){
			echo 'You are considered underweight.<br /><br />';
		}
		elseif($bmi >= '25' && $bmi < '30'){
                        echo 'You are considered overweight.<br /><br />';
                }       
                elseif($bmi >= '30' && $bmi < '40'){
                        echo 'You are considered obese.<br /><br ?>';
                }       
                elseif($bmi >= 40){
                        echo 'You are considered extremely obese.<br /><br />';
                }       
                elseif($bmi = '69'){
			echo 'DAAAAAAAAAAANGGGGG BRO.<br /><br />';
		}

		echo '</center>';
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
                <div id="bmiform">
                        <b>Please enter your measurements below. </b> <br /><br />
                        <form action="index.php" id="bmicalcstyle" name="bmicalcstyle" method="post">
                                Unit: <input type="radio" name="unit" value="Standard" checked> Standard
                                      <input type="radio" name="unit" value="Metric"> Metric <br /><br />
                                Weight: <input type="text" name="weight" placeholder="(In lbs or kg)"> <br /><br />
                                Height: <input type="text" name="height" placeholder="(In inches or cm)"> <br /><br />
                                <input type="submit" name"givems" id="givems" class="btn" value="Submit"/>
                        </form>
                </div>
        </body>
</html>

