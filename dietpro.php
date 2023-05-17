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
		/* HIDE RADIO */
		[type=radio] {
			position: absolute;
			opacity: 0;
			width: 0;
			height: 0;
		}

		/* IMAGE STYLES */
		[type=radio]+img {
			width: 100%;
			height: 50vh;
			cursor: pointer;
		}

		/* CHECKED STYLES */
		[type=radio]:checked+img {
			outline: 2px solid #fff;
			border: 2px solid #fff;
			border-radius: 25px;
		}


		#question1,
		#question2,
		#question3 {
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			justify-content: center;
			width: 100%;
			height: 20%;
		}

		.row {
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			justify-content: center;

		}

		.qcontainer {
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			justify-content: center;
			margin: auto;
			width: 45%;
			height: auto;
			position: relative;
		}

		form {
			display: flex;
			width: 100%;
			height: auto;
		}

		label {
			color: #fff;
			text-align: center;
		}


		.buttonrst {

			display: inline-block;
			width: 100px;
			outline: none;
			cursor: pointer;
			font-size: 14px;
			line-height: 1;
			border-radius: 500px;
			transition-property: background-color, border-color, color, box-shadow, filter;
			transition-duration: .3s;
			border: 1px solid transparent;
			letter-spacing: 2px;
			text-transform: uppercase;
			white-space: normal;
			font-weight: 700;
			text-align: center;
			padding: 16px 14px 18px;
			color: #e6e8eb;
			box-shadow: inset 0 0 0 2px #616467;
			background-color: transparent;
			height: 48px;
		}

		.buttonrst:hover {
			color: #616467;
			background-color: #e6e8eb;
		}

		.range {
			width: 400px;
			height: 15px;
			-webkit-appearance: none;
			background: #111;
			outline: none;
			border-radius: 15px;
			overflow: hidden;
			box-shadow: inset 0 0 5px rgba(0, 0, 0, 1);
		}

		.range::-webkit-slider-thumb {
			-webkit-appearance: none;
			width: 15px;
			height: 15px;
			border-radius: 50%;
			background: #fff;
			cursor: pointer;
			border: 4px solid #333;
			box-shadow: -407px 0 0 400px #fff;
		}

		output {
			color: #fff;
			font-size: 2vw;
		}


		.outp {
			padding-top: 2vh;
			font-size: 2vw;
			padding-bottom: 2vh;
			color: #fff;
			width: 100%;
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			justify-content: center;
			margin: auto;
		}

		input[type=number] {
			width: 10%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			background-color: #f8f8f8;
			font-size: 16px;
			color: #555;
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
				<form id="questions-form" method="post">
					<div id="question1">
						<label style="width: 100%; font-size: 4vw;">Are you obese?</label>
						<div class="qcontainer">
							<label for="obs-yes" class="image-button">
								<input type="radio" id="obs-yes" name="obese" value="yes">
								<img src="img/questions/obese-yes.png" class="imgq" alt="YES">
								YES
							</label>

						</div>
						<div class="qcontainer">
							<label for="obs-no" class="image-button">
								<input type="radio" id="obs-no" name="obese" value="no">
								<img src="img/questions/obese-no.png" class="imgq" alt="NO">
								NO
							</label>
						</div>
						<input type="button" class="buttonrst" value="Next" onclick="viewquestion2()" style="width: 30%">
					</div>

					<div id="question2" style="display: none;">
						<label style="width: 100%; font-size: 4vw; padding-bottom:2vh" for="age">Select your age:</label>
						<div class="qcontainer" style="width: 100%;">
							<input type="range" class="range" id="age" name="age" min="0" max="100" step="1" value="18" style="width: 30%;">
							<div class="outp">
								<output for="age" id="ageOutput">18</output> years old
							</div>
						</div>

						<input type="button" class="buttonrst" value="Previous" onclick="prev1()" style="width: 30%">
						<input type="button" class="buttonrst" value="Next" onclick="viewquestion3()" style="width: 30%">
					</div>

					<div id="question3" style="display: none;">
						<label style="width: 100%; font-size: 4vw; padding-bottom:2vh" for="height">Height (cm):</label>
						<div class="qcontainer" style="width: 100%;">
							<input type="number" id="height" name="height" min="0" max="100" step="1">
						</div>
						<label style="width: 100%; font-size: 4vw; padding-bottom:2vh" for="weight">Weight (kg):</label>
						<div class="qcontainer" style="width: 100%; padding-bottom:5vh">
							<input type="number" id="weight" name="weight" min="0" max="500" step="0.1">
						</div>

						<input type="button" class="buttonrst" value="Previous" onclick="prev2()" style="width: 30%">
						<input type="submit" class="buttonrst" name="submit" value="Submit" style="width: 30%">
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
						ques2.style.display = "flex";
					}

					function viewquestion3() {
						var ques2 = document.getElementById('question2');
						var ques3 = document.getElementById('question3');

						ques2.style.display = "none";
						ques3.style.display = "flex";
					}

					function prev1() {
						var ques2 = document.getElementById('question2');
						var ques1 = document.getElementById('question1');

						ques2.style.display = "none";
						ques1.style.display = "flex";
					}

					function prev2() {
						var ques2 = document.getElementById('question2');
						var ques3 = document.getElementById('question3');

						ques3.style.display = "none";
						ques2.style.display = "flex";
					}
				</script>


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