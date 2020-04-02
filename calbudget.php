<?php
session_start();


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
                      				$cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                      				$result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
					  }
					  elseif($activitylevel == 'Light'){
						$multbmr = $bmrcalc * 1.375;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";

					  }
					  elseif($activitylevel == 'Moderate'){
                      				$multbmr = $bmrcalc * 1.55;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                      				$result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
					  }
					  elseif($activitylevel == 'Very'){
                      				$multbmr = $bmrcalc * 1.725;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                      				$result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
					  }
					  elseif($activitylevel == 'Extremely'){
                      				$multbmr = $bmrcalc * 1.9;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                      				$result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
					  }

				  }
				  elseif($gender == 'Male'){
					$weightconv = $weight * 0.453592;
                                        $heightconv = $height * 2.54;
                 			$bmrcalc = (10 * $weightconv) + (6.25 * $heightconv) - (5 * $age) + 5;
					
					if($activitylevel == 'Sedentary'){
                      				$multbmr = $bmrcalc * 1.2;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                      				$result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
					}
					elseif($activitylevel == 'Light'){
                      				$multbmr = $bmrcalc * 1.375;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                      				$result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
					}
					elseif($activitylevel == 'Moderate'){
                      				$multbmr = $bmrcalc * 1.55;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                      				$result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
					}
					elseif($activitylevel == 'Very'){
                      				$multbmr = $bmrcalc * 1.725;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                      				$result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
					}
					elseif($activitylevel == 'Extremely'){
                      				$multbmr = $bmrcalc * 1.9;
                      				$bmr = number_format($multbmr, 0);
                      				$cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
						$result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
					}
				  }
			  }
			  elseif($losegain == 'gain'){
				  if($gender == 'Female'){
					  $weightconv = $weight * 0.453592;
					  $heightconv = $height * 2.54;
					  
					  $bmrcalc = (10 * $weightconv) + (6.25 * $heightconv) - (5 * $age) - 161;

                                          if($activitylevel == 'Sedentary'){
                                                $multbmr = $bmrcalc * 1.2;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                          }
                                          elseif($activitylevel == 'Light'){
                                                $multbmr = $bmrcalc * 1.375;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";

                                          }
                                          elseif($activitylevel == 'Moderate'){
                                                $multbmr = $bmrcalc * 1.55;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                          }
                                          elseif($activitylevel == 'Very'){
                                                $multbmr = $bmrcalc * 1.725;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                          }
                                          elseif($activitylevel == 'Extremely'){
                                                $multbmr = $bmrcalc * 1.9;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                          }
                                  }
                                  elseif($gender == 'Male'){
					$weightconv = $weight * 0.453592;
                                        $heightconv = $height * 2.54;  
					  
					$bmrcalc = (10 * $weightconv) + (6.25 * $heightconv) - (5 * $age) + 5;

                                        if($activitylevel == 'Sedentary'){
                                                $multbmr = $bmrcalc * 1.2;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                        }
                                        elseif($activitylevel == 'Light'){
                                                $multbmr = $bmrcalc * 1.375;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                        }
                                        elseif($activitylevel == 'Moderate'){
                                                $multbmr = $bmrcalc * 1.55;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                        }
                                        elseif($activitylevel == 'Very'){
                                                $multbmr = $bmrcalc * 1.725;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                        }
                                        elseif($activitylevel == 'Extremely'){
                                                $multbmr = $bmrcalc * 1.9;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days, your caloric budget would be $cal calories every day.<br /><br />";
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
                                                $cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                          }
                                          elseif($activitylevel == 'Light'){
                                                $multbmr = $bmrcalc * 1.375;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";

                                          }
                                          elseif($activitylevel == 'Moderate'){
                                                $multbmr = $bmrcalc * 1.55;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                          }
                                          elseif($activitylevel == 'Very'){
                                                $multbmr = $bmrcalc * 1.725;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                          }
                                          elseif($activitylevel == 'Extremely'){
                                                $multbmr = $bmrcalc * 1.9;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                          }
                                  }
				  elseif($gender == 'Male'){
					  $bmrcalc = (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
					
					  if($activitylevel == 'Sedentary'){
                                                $multbmr = $bmrcalc * 1.2;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                          }
                                          elseif($activitylevel == 'Light'){
                                                $multbmr = $bmrcalc * 1.375;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days, your caloric budget would be $cal calories every day.<br /><br />";
                                          }
					  elseif($activitylevel == 'Moderate'){
                                                $multbmr = $bmrcalc * 1.55;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                          }
                                          elseif($activitylevel == 'Very'){
                                                $multbmr = $bmrcalc * 1.725;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                          }
                                          elseif($activitylevel == 'Extremely'){
                                                $multbmr = $bmrcalc * 1.9;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr - (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                          }
				  }
			}
			elseif($losegain == 'gain'){
				if($gender == 'Female'){
					$bmrcalc = (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;

                                        if($activitylevel == 'Sedentary'){
                                              	$multbmr = $bmrcalc * 1.2;
                                              	$bmr = number_format($multbmr, 0);
                                              	$cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                              	$result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                        }
                                        elseif($activitylevel == 'Light'){
                                              	$multbmr = $bmrcalc * 1.375;
                                              	$bmr = number_format($multbmr, 0);
                                              	$cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                              	$result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                        }
                                        elseif($activitylevel == 'Moderate'){
                                              	$multbmr = $bmrcalc * 1.55;
                                              	$bmr = number_format($multbmr, 0);
                                              	$cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                              	$result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                        }
                                        elseif($activitylevel == 'Very'){
                                              	$multbmr = $bmrcalc * 1.725;
                                              	$bmr = number_format($multbmr, 0);
                                              	$cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                              	$result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                        }
					elseif($activitylevel == 'Extremely'){
                                              	$multbmr = $bmrcalc * 1.9;
                                              	$bmr = number_format($multbmr, 0);
                                              	$cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                              	$result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                        }
                                  }
				  elseif($gender == 'Male'){
                                        $bmrcalc = (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;

					if($activitylevel == 'Sedentary'){
                                                $multbmr = $bmrcalc * 1.2;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                        }
                                        elseif($activitylevel == 'Light'){
                                                $multbmr = $bmrcalc * 1.375;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                        }
                                        elseif($activitylevel == 'Moderate'){
                                                $multbmr = $bmrcalc * 1.55;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                        }
                                        elseif($activitylevel == 'Very'){
                                                $multbmr = $bmrcalc * 1.725;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                        }
                                        elseif($activitylevel == 'Extremely'){
                                                $multbmr = $bmrcalc * 1.9;
                                                $bmr = number_format($multbmr, 0);
                                                $cal = number_format($multbmr + (((500 / $days) * 7) / $weightchange));
                                                $result = "Your Basal Metabolic Rate is $bmr calories a day. <br /> To $losegain $weightchange pound in $days days, your caloric budget would be $cal calories every day.<br /><br />";
                                        }
                                  }
			}
		  }
		  
		  $_SESSION['bmr'] = $result;
		  $_SESSION['cal'] = $cal;
		  
		  sleep(5);
		  
		  header("profilePage.php");
	  }
	  elseif($unit == 'pick' || $gender == 'pick' || $activitylevel == 'pick' || $losegain == 'pick' || empty($age) || empty($weight) || empty($height)){
          	$result = "Please fill out everything.";
			
			unset($_SESSION['bmr']); 
			unset($_SESSION['cal']);
	  }
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>BMR and Calorie Budget Calculator</title>
		<link rel="stylesheet" type="text/css" href="calbudgetstyle.css" />
	</head>

	<body>
		<h2>BMR and Calorie Budget Calculator</h2>

		<div class="calbudget">
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
			Age: <input type="number" min="1" max="150" name="age" placeholder="Enter your age here"><br /><br />
			Weight: <input type="number" min="1" max="1500" name="weight" placeholder="(lbs or kg)"><br /><br />
			Height: <input type="number" min="1" max="250" name="height" placeholder="(inches or c)m"><br /><br />
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
			How Much Weight: <input type="number" min="0" max="1000" name="weightchange" placeholder="Enter change in weight wanted (lbs or kg)"><br /><br />
			Time Period: <input type="number" min="0" max="3650" name="days" placeholder="Enter the number of days"><br /><br />
			<input type="submit" name="subdata" id="subdata" class="btn" value="Submit"/><br /><br />
			Result: <?php if(!empty($result)){echo $result; sleep(5); header('Location: profilePage.php'); exit;}?>
			</form>
		</div>
	</body>
</html>


