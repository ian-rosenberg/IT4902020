<?php

  if(isset($_POST['subdata']) && ($_POST['subdata']) == "Submit"){
	  extract($_POST);

	  if($age != '' && $weight != '' && $height != '' && $activitylevel != 'Pick one') {
		  if($unit == 'Imperical'){
			  if($losegain == 'lose'){
				  if($gender == 'Female'){
					  $weightconv = $weight * 0.453592;
					  $heightconv = $height * 2.54;
					  $bmrcalc = (10 * $weightconv) + (6.25 * $heightconv) - (5 * $age) - 161;
					  
					  if($activitylevel == 'Sedentary'){
                      				$multbmr = $bmrcalc * 1.2;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (500 * $weightchange));
                      				echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.</center><br /><br />";
					  }
					  elseif($activitylevel == 'Light'){
						$multbmr = $bmrcalc * 1.375;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";

					  }
					  elseif($activitylevel == 'Moderate'){
                      				$multbmr = $bmrcalc * 1.55;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (500 * $weightchange));
                      				echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
					  }
					  elseif($activitylevel == 'Very'){
                      				$multbmr = $bmrcalc * 1.725;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (500 * $weightchange));
                      				echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
					  }
					  elseif($activitylevel == 'Extremely'){
                      				$multbmr = $bmrcalc * 1.9;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (500 * $weightchange));
                      				echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
					  }

				  }
				  elseif($gender == 'Male'){
					$weightconv = $weight * 0.453592;
                                        $heightconv = $height * 2.54;
                 			$bmrcalc = (10 * $weightconv) + (6.25 * $heightconv) - (5 * $age) + 5;
					
					if($activitylevel == 'Sedentary'){
                      				$multbmr = $bmrcalc * 1.2;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (500 * $weightchange));
                      				echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
					}
					elseif($activitylevel == 'Light'){
                      				$multbmr = $bmrcalc * 1.375;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (500 * $weightchange));
                      				echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
					}
					elseif($activitylevel == 'Moderate'){
                      				$multbmr = $bmrcalc * 1.55;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (500 * $weightchange));
                      				echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
					}
					elseif($activitylevel == 'Very'){
                      				$multbmr = $bmrcalc * 1.725;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (500 * $weightchange));
                      				echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
					}
					elseif($activitylevel == 'Extremely'){
                      				$multbmr = $bmrcalc * 1.9;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (500 * $weightchange));
						echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
					}
				  }
			  }
			  elseif($loseagain == 'gain'){
				  if($gender == 'Female'){
					  $weightconv = $weight * 0.453592;
					  $heightconv = $height * 2.54;
					  
					  $bmrcalc = (10 * $weightconv) + (6.25 * $heightconv) - (5 * $age) - 161;

                                          if($activitylevel == 'Sedentary'){
                                                $multbmr = $bmrcalc * 1.2;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                          }
                                          elseif($activitylevel == 'Light'){
                                                $multbmr = $bmrcalc * 1.375;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";

                                          }
                                          elseif($activitylevel == 'Moderate'){
                                                $multbmr = $bmrcalc * 1.55;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                          }
                                          elseif($activitylevel == 'Very'){
                                                $multbmr = $bmrcalc * 1.725;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                          }
                                          elseif($activitylevel == 'Extremely'){
                                                $multbmr = $bmrcalc * 1.9;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                          }
                                  }
                                  elseif($gender == 'Male'){
					$weightconv = $weight * 0.453592;
                                        $heightconv = $height * 2.54;  
					  
					$bmrcalc = (10 * $weightconv) + (6.25 * $heightconv) - (5 * $age) + 5;

                                        if($activitylevel == 'Sedentary'){
                                                $multbmr = $bmrcalc * 1.2;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                        }
                                        elseif($activitylevel == 'Light'){
                                                $multbmr = $bmrcalc * 1.375;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                        }
                                        elseif($activitylevel == 'Moderate'){
                                                $multbmr = $bmrcalc * 1.55;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                        }
                                        elseif($activitylevel == 'Very'){
                                                $multbmr = $bmrcalc * 1.725;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                        }
                                        elseif($activitylevel == 'Extremely'){
                                                $multbmr = $bmrcalc * 1.9;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                        }
                                  }
			  }
		  }
		  elseif($unit == 'Metric'){
			  if($losegain == 'lose'){
				  if($gender == 'Female'){
                                          $bmrcalc = (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;

                                          if($activitylevel == 'Sedentary'){
                                                $multbmr = $bmrcalc * 1.2;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                          }
                                          elseif($activitylevel == 'Light'){
                                                $multbmr = $bmrcalc * 1.375;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";

                                          }
                                          elseif($activitylevel == 'Moderate'){
                                                $multbmr = $bmrcalc * 1.55;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                          }
                                          elseif($activitylevel == 'Very'){
                                                $multbmr = $bmrcalc * 1.725;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                          }
                                          elseif($activitylevel == 'Extremely'){
                                                $multbmr = $bmrcalc * 1.9;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                          }
                                  }
				  elseif($gender == 'Male'){
					  $bmrcalc = (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
					
					  if($activitylevel == 'Sedentary'){
                                                $multbmr = $bmrcalc * 1.2;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                          }
                                          elseif($activitylevel == 'Light'){
                                                $multbmr = $bmrcalc * 1.375;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                          }
					  elseif($activitylevel == 'Moderate'){
                                                $multbmr = $bmrcalc * 1.55;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                          }
                                          elseif($activitylevel == 'Very'){
                                                $multbmr = $bmrcalc * 1.725;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                          }
                                          elseif($activitylevel == 'Extremely'){
                                                $multbmr = $bmrcalc * 1.9;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                          }
				  }
			}
			elseif($losegain == 'gain'){
				if($gender == 'Female'){
					$bmrcalc = (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;

                                        if($activitylevel == 'Sedentary'){
                                              	$multbmr = $bmrcalc * 1.2;
                                              	$bmr = number_format($multbmr, 0);
                                              	$cal = number_format($multbmr + (500 * $weightchange));
                                              	echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                        }
                                        elseif($activitylevel == 'Light'){
                                              	$multbmr = $bmrcalc * 1.375;
                                              	$bmr = number_format($multbmr, 0);
                                              	$cal = number_format($multbmr + (500 * $weightchange));
                                              	echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                        }
                                        elseif($activitylevel == 'Moderate'){
                                              	$multbmr = $bmrcalc * 1.55;
                                              	$bmr = number_format($multbmr, 0);
                                              	$cal = number_format($multbmr + (500 * $weightchange));
                                              	echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                        }
                                        elseif($activitylevel == 'Very'){
                                              	$multbmr = $bmrcalc * 1.725;
                                              	$bmr = number_format($multbmr, 0);
                                              	$cal = number_format($multbmr + (500 * $weightchange));
                                              	echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                        }
					elseif($activitylevel == 'Extremely'){
                                              	$multbmr = $bmrcalc * 1.9;
                                              	$bmr = number_format($multbmr, 0);
                                              	$cal = number_format($multbmr + (500 * $weightchange));
                                              	echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                        }
                                  }
				  elseif($gender == 'Male'){
                                        $bmrcalc = (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;

					if($activitylevel == 'Sedentary'){
                                                $multbmr = $bmrcalc * 1.2;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                        }
                                        elseif($activitylevel == 'Light'){
                                                $multbmr = $bmrcalc * 1.375;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                        }
                                        elseif($activitylevel == 'Moderate'){
                                                $multbmr = $bmrcalc * 1.55;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                        }
                                        elseif($activitylevel == 'Very'){
                                                $multbmr = $bmrcalc * 1.725;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                        }
                                        elseif($activitylevel == 'Extremely'){
                                                $multbmr = $bmrcalc * 1.9;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (500 * $weightchange));
                                                echo "<center>Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound a week, your caloric budget would be $cal calories every day.</center><br /><br />";
                                        }
                                  }
			}
		  }
		  elseif($activitylevel == 'Pick one'){
			  echo "Please pick an activity level.";
		  }
		  elseif($age == '' || $weight == '' || $height == ''){
			  echo "Please fill in all fields.";
		  }
	  }
  }
?>

<!doctype html>
<html>
	<head>
		<title>BMR and Calorie Budget Calculator</title>
		<link rel=stylesheet" type="text/css" href="calbudgetstyle.css"/>
	</head>

	<body>
		<center><h3>BMR and Calorie Budget Calculator</h3></center>

		<div id="calbudget">
			<form id="calbudgetform" name="calbudgetform" method="post">
			Select Unit: <select name="unit" id="select">
					<option value="pick" checked>Pick A Unit</option>
					<option value="Imperical">Imperical</option>
					<option value-"Metric">Metric</option>
					</select><br /><br />
			Select Gender: <select  name="gender" id="select">
					<option value="pick" checked>Pick A Gender</option>
                                        <option value="Female">Female</option>
                                        <option value-"Male">Male</option>
					</select><br /><br />
			Age: <input type="number" name="age" placeholder="Enter your age here"><br /><br />
			Weight: <input type="number" name="weight" placeholder="Enter your weight (lbs or kg)"><br /><br />
			Height: <input type="number" name="height" placeholder="Enter your height (inches or cm)"><br /><br />
			Activity Level: <select name="activitylevel" id="select">
					  <option value="pick" checked>Pick An Activity Level</option>
					  <option value="Sedentary">Sedentary</option>
					  <option value="Light">Light</option>
					  <option value="Moderate">Moderate</option>
					  <option value="Very">Very</option>
					  <option value="Extremely">Extremely</option>
					</select><br /><br />
			Lose or Gain Weight: <select name="losegain" id="select">
						<option value="pick" checked>Pick One</option>
						<option value="lose">Lose Weight</option>
						<option value="gain">Gain Weight</option>
						</select><br /><br />
			How Much Weight: <input type="number" name="weightchange" placeholder="Enter change in weight wanted (lbs or kg)"><br /><br />
			<!--Time Period: <input type="number" name="days" placeholder="Enter the number of days"><br /><br />-->
			<input type="submit" name="subdata" id="subdata" class="btn" value="Submit"/>
			</form>
		</div>
	</body>
</html>


