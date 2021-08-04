<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>404 Page Not Found</title>
	<style type="text/css">
		@font-face {
			font-family: Vazir;
			src: url("../../assets/fonts/vazir-font/dist/Vazir-Regular.ttf");
		}

		html,
		body {
			height: 100%;
			margin: 0;
			text-align: center;
		}

		html {
			font-size: 62.5%;
		}

		body {
			font-family: "Vazir", sans-serif;
			font-size: 1.5rem;
			color: #293b49;
			background: #b1bdf8;
			direction: rtl;
			overflow-x: hidden;
		}

		a {
			text-decoration: none;
		}

		.center {
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
		}

		.error {
			display: flex;
			flex-direction: row;
			justify-content: space-between;
			align-content: center;
		}

		.number {
			font-weight: 900;
			font-size: 15rem;
			line-height: 1;
		}

		.illustration {
			position: relative;
			width: 12.2rem;
			margin: 0 2.1rem;
		}

		.circle {
			position: absolute;
			bottom: 0;
			left: 0;
			width: 12.2rem;
			height: 11.4rem;
			border-radius: 50%;
			background-color: #293b49;
		}

		.clip {
			position: absolute;
			bottom: 0.3rem;
			left: 50%;
			transform: translateX(-50%);
			overflow: hidden;
			width: 12.5rem;
			height: 13rem;
			border-radius: 0 0 50% 50%;
		}

		.paper {
			position: absolute;
			bottom: -0.3rem;
			left: 50%;
			transform: translateX(-50%);
			width: 9.2rem;
			height: 12.4rem;
			border: 0.3rem solid #293b49;
			background-color: white;
			border-radius: 0.8rem;


		}

		.paper::before {
			content: "";
			position: absolute;
			top: -0.7rem;
			right: -0.7rem;
			width: 1.4rem;
			height: 1rem;
			background-color: #b1bdf8;
			border-bottom: 0.3rem solid #293b49;
			transform: rotate(45deg);
		}

		.face {
			position: relative;
			margin-top: 2.3rem;
		}

		.eyes {
			position: absolute;
			top: 0;
			left: 2.4rem;
			width: 4.6rem;
			height: 0.8rem;
		}

		.eye {
			position: absolute;
			bottom: 0;
			width: 0.8rem;
			height: 0.8rem;
			border-radius: 50%;
			background-color: #293b49;
			animation-name: eye;
			animation-duration: 4s;
			animation-iteration-count: infinite;
			animation-timing-function: ease-in-out;


		}

		.eye-left {
			left: 0;
		}

		.eye-right {
			right: 0;
		}

		@keyframes eye {
			0% {
				height: 0.8rem;
			}

			50% {
				height: 0.8rem;
			}

			52% {
				height: 0.1rem;
			}

			54% {
				height: 0.8rem;
			}

			100% {
				height: 0.8rem;
			}
		}

		.rosyCheeks {
			position: absolute;
			top: 1.6rem;
			width: 1rem;
			height: 0.2rem;
			border-radius: 50%;
			background-color: #fdabaf;
		}

		.rosyCheeks-left {
			left: 1.4rem;
		}

		.rosyCheeks-right {
			right: 1.4rem;
		}

		.mouth {
			position: absolute;
			top: 3.1rem;
			left: 50%;
			width: 1.6rem;
			height: 0.2rem;
			border-radius: 0.1rem;
			transform: translateX(-50%);
			background-color: #293b49;
		}

		.text {
			margin-top: 5rem;
			font-weight: 300;
			color: #293b49;
		}

		.button {
			padding: 1.4rem 2rem;
			border-radius: 1rem;
			background: transparent;
			border: 1px solid #233862;
			font-size: 16px;
			line-height: 16px;
			color: #233862;
			transition: all 0.3s ease;
			margin-top: 2rem;
		}

		.button:hover {
			color: white;
			background-color: #233862;
		}
	</style>
</head>

<body>
	<div id="container">
		<div class="center">
			<div class="error">
				<div class="number">4</div>
				<div class="illustration">
					<div class="circle"></div>
					<div class="clip">
						<div class="paper">
							<div class="face">
								<div class="eyes">
									<div class="eye eye-left"></div>
									<div class="eye eye-right"></div>
								</div>
								<div class="rosyCheeks rosyCheeks-left"></div>
								<div class="rosyCheeks rosyCheeks-right"></div>
								<div class="mouth"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="number">4</div>
			</div>

			<h2 class="text">متاسفانه صفحه مورد نظر یافت نشد.</h2>
			<a class="button" href="/">Back Home</a>
		</div>
	</div>
</body>

</html>