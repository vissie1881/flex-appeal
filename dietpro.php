<?php
session_start();
error_reporting(0);
include 'include/config.php';
$uid = $_SESSION['uid'];

if (isset($_POST['submit'])) {
	$pid = $_POST['pid'];


	$sql = "INSERT INTO tblbooking (package_id,userid) Values(:pid,:uid)";

	$query = $dbh->prepare($sql);
	$query->bindParam(':pid', $pid, PDO::PARAM_STR);
	$query->bindParam(':uid', $uid, PDO::PARAM_STR);
	$query->execute();
	echo "<script>alert('Package has been booked.');</script>";
	echo "<script>window.location.href='booking-history.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Gym Management System</title>
	<meta charset="UTF-8">
	<meta name="description" content="Ahana Yoga HTML Template">
	<meta name="keywords" content="yoga, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/owl.carousel.min.css" />
	<link rel="stylesheet" href="css/nice-select.css" />
	<link rel="stylesheet" href="css/magnific-popup.css" />
	<link rel="stylesheet" href="css/slicknav.min.css" />
	<link rel="stylesheet" href="css/animate.css" />

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css" />


	<style>
		/* Hide the default radio buttons */
		input[type="radio"] {
			display: none;
		}

		/* Style the label as an image button */
		label.image-button {
			display: inline-block;
			cursor: pointer;
		}

		/* Style the label when selected */
		input[type="radio"]:checked+label.image-button {
			border: 2px solid blue;
			/* Example border style */
		}
	</style>

</head>

<body>
	<!-- Page Preloder -->


	<!-- Header Section -->
	<?php include 'include/header.php'; ?>
	<!-- Header Section end -->




	<!-- Page top Section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<h2 class="main_text">DietPro™ </h2>
					<h4 class="main_text">An advanced BOT to predict your diet need</h4>
				</div>
			</div>
		</div>
	</section>



	<section class="pricing-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-6">
					<form id="questions-form" method="post">
						<div id="question1">
							<label>Are you obese?</label>
							<input type="radio" id="obs-yes" name="obese" value="yes">
							<label for="option1" class="image-button">
								<img src="img/questions/obese-yes.png" alt="YES">
								YES
							</label>

							<input type="radio" id="obs-no" name="obese" value="no">
							<label for="option2" class="image-button">
								<img src="img/questions/obese-no.png" alt="NO">
								NO
							</label>
							<input type="button" value="Next" onclick="viewquestion2()">
						</div>

						<div id="question2" style="display: none;">
							<label for="age">Select your age:</label>
							<input type="range" id="age" name="age" min="0" max="100" step="1" value="18">
							<output for="age" id="ageOutput">18</output> years old

							<input type="button" value="Next" onclick="viewquestion3()">
						</div>

						<div id="question3" style="display: none;">
							<label for="height">Height (cm):</label>
							<input type="number" id="height" name="height" min="0" max="100" step="1">

							<label for="weight">Weight (kg):</label>
							<input type="number" id="weight" name="weight" min="0" max="500" step="0.1">

							<input type="submit" name="submit" value="Submit">
						</div>
					</form>








					<script>
						var ageSlider = document.getElementById("age");
						var ageOutput = document.getElementById("ageOutput");

						// Update the age output when the slider value changes
						ageSlider.addEventListener("input", function() {
							ageOutput.textContent = ageSlider.value;
						});

						function viewquestion2() {
							var ques1 = document.getElementById('question1');
							var ques2 = document.getElementById('question2');

							ques1.style.display = "none";
							ques2.style.display = "block";
						}

						function viewquestion3() {
							var ques2 = document.getElementById('question2');
							var ques3 = document.getElementById('question3');

							ques2.style.display = "none";
							ques3.style.display = "block";
						}
					</script>












				</div>
			</div>
		</div>
	</section>

	<!-- Footer Section -->
	<?php include 'include/footer.php'; ?>
	<!-- Footer Section end -->

	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

	<!-- Search model end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>