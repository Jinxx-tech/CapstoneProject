<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="initial-scale=1, width=device-width">
    <title>Survey 5</title>
    <style>
       
       body {
        	margin: 0;
        	line-height: normal;
      }
      :root {
        	/* fonts */
        	--m3-label-large: Roboto;
        	--font-montserrat: Montserrat;
        	
        	/* font sizes */
        	--font-size-xl: 20px;
        	--m3-label-large-size: 14px;
        	
        	/* Colors */
        	--schemes-surface-container-low: #f7f2fa;
        	--color-paleturquoise: #a0e9d6;
        	--color-black: #000;
        	
        	/* Paddings */
        	--padding-smi: 13px;
        	--padding-3xs: 10px;
        	--padding-5xl: 24px;
        	
        	/* Border radiuses */
        	--br-81xl: 100px;
        	
        	/* Effects */
        	--m3-elevation-light-2: 0px 1px 2px rgba(0, 0, 0, 0.3), 0px 2px 6px 2px rgba(0, 0, 0, 0.15);
      }
      .do-you-have {
        	position: absolute;
        	top: 351px;
        	left: 529px;
        	letter-spacing: 0.25px;
        	line-height: 20px;
        	display: inline-block;
        	font-family: var(--font-montserrat);
        	width: 394px;
        	height: 30px;
      }
      .image-6-icon {
        	position: absolute;
        	top: 127px;
        	left: 618px;
        	width: 216px;
        	height: 210px;
        	object-fit: cover;
      }
      .label-text {
        	position: relative;
        	letter-spacing: 0.1px;
        	line-height: 20px;
        	font-weight: 500;
      }
      .state-layer {
        	align-self: stretch;
        	flex: 1;
        	background-color: var(--color-paleturquoise);
        	display: flex;
        	flex-direction: row;
        	align-items: center;
        	justify-content: center;
        	padding: var(--padding-3xs) var(--padding-5xl);
      }
      .button {
        	position: absolute;
        	top: 530px;
        	left: 598px;
        	box-shadow: var(--m3-elevation-light-2);
        	border-radius: var(--br-81xl);
        	background-color: var(--schemes-surface-container-low);
        	width: 264px;
        	height: 45px;
        	overflow: hidden;
        	display: flex;
        	flex-direction: column;
        	align-items: center;
        	justify-content: center;
        	font-size: var(--m3-label-large-size);
        	cursor: pointer;
      }
      .button1 {
        	position: absolute;
        	top: 457px;
        	left: 598px;
        	box-shadow: var(--m3-elevation-light-2);
        	border-radius: var(--br-81xl);
        	background-color: var(--schemes-surface-container-low);
        	width: 264px;
        	height: 45px;
        	overflow: hidden;
        	display: flex;
        	flex-direction: column;
        	align-items: center;
        	justify-content: center;
        	text-align: left;
        	font-size: var(--m3-label-large-size);
        	cursor: pointer;
      }
      .back {
        	position: relative;
        	letter-spacing: 0.5px;
        	line-height: 24px;
      }
      .button-navigation-conturi {
        	position: absolute;
        	top: 734px;
        	left: 996px;
        	border-radius: 8px;
        	background-color: #5ee4c2;
        	width: 123px;
        	height: 43px;
        	display: flex;
        	flex-direction: row;
        	align-items: center;
        	justify-content: center;
        	padding: var(--padding-smi) 7px var(--padding-smi) 0px;
        	box-sizing: border-box;
        	cursor: pointer;
        	text-align: left;
        	color: #086100;
      }
      .survey-5 {
        	width: 100%;
        	position: relative;
        	background-color: #fff;
        	height: 832px;
        	overflow: hidden;
        	text-align: center;
        	font-size: var(--font-size-xl);
        	color: var(--color-black);
        	font-family: var(--m3-label-large);
      }
    </style>
</head>
    </style>
        </head>
<body>
<div class="survey-5">
<b class="do-you-have"> Do you have a mortgage?</b>
<img class="image-6-icon" alt="" src="images/image 6.png">
<div class="button-navigation-conturi" id="buttonNavigationConturiContainer">
<div class="back">Back</div>
</div>
<!-- "Yes" button -->
<div class="button" onclick="window.location.href='survey6.php';">
      			<div class="state-layer">
        				<div class="label-text">Yes</div>
      			</div>
    		</div>
    		
    		<!-- "No, my house is paid off" button -->
    		<div class="button1" onclick="window.location.href='survey6.php';">
      			<div class="state-layer">
        				<div class="label-text">No, my house is paid off</div>
      			</div>
</div>
</div>
<script>
    		var buttonNavigationConturiContainer = document.getElementById("buttonNavigationConturiContainer");
    		if(buttonNavigationConturiContainer) {
      			buttonNavigationConturiContainer.addEventListener("click", function (e) {
        				window.history.back();
      			});
    		}
    </script>

</body>
</html>