﻿
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>CandyMatch3</title>
		
		<!-- Standardised web app manifest -->
		<link rel="manifest" href="app.manifest" />
		
		<!-- Allow fullscreen mode on iOS devices. (These are Apple specific meta tags.) -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<link rel="apple-touch-icon" sizes="256x256" href="icon-256.png" />
		<meta name="HandheldFriendly" content="true" />
		
		<!-- Chrome for Android web app tags -->
		<meta name="mobile-web-app-capable" content="yes" />
		<link rel="shortcut icon" sizes="256x256" href="<?php echo url($path) ?>/icon-256.png" />
		
		<link rel="stylesheet" href="<?php echo url($path) ?>/assets/css/bootstrap.min.css">
    	<link rel="stylesheet" id="css-main" href="<?php echo url($path) ?>/assets/css/oneui.css">
	    <!-- All margins and padding must be zero for the canvas to fill the screen. -->
		<style type="text/css">
			* {
				padding: 0;
				margin: 0;
			}
			html, body {
				background: #000;
				color: #fff;
				overflow: hidden;
				touch-action: none;
				-ms-touch-action: none;
			}
			canvas {
				touch-action-delay: none;
				touch-action: none;
				-ms-touch-action: none;
			}
	    </style>
		

	</head> 
	 
	<body> 
		<main id="main-container">
			<div id="fb-root"></div>
			
			<script>
				// Issue a warning if trying to preview an exported project on disk.
				(function(){
					// Check for running exported on file protocol
					if (window.location.protocol.substr(0, 4) === "file")
					{
						alert("Exported games won't work until you upload them. (When running on the file:/// protocol, browsers block many features from working for security reasons.)");
					}
				})();
			</script>
			
			<!-- The canvas must be inside a div called c2canvasdiv -->
			<div id="c2canvasdiv">
			
				<!-- The canvas the project will render to.  If you change its ID, don't forget to change the
				ID the runtime looks for in the jQuery events above (ready() and cr_sizeCanvas()). -->
				<canvas id="c2canvas" width="720" height="1280">
					<!-- This text is displayed if the visitor's browser does not support HTML5.
					You can change it, but it is a good idea to link to a description of a browser
					and provide some links to download some popular HTML5-compatible browsers. -->
					<h1>Your browser does not appear to support HTML5.  Try upgrading your browser to the latest version.  <a href="http://www.whatbrowser.org">What is a browser?</a>
					<br/><br/><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx">Microsoft Internet Explorer</a><br/>
					<a href="http://www.mozilla.com/firefox/">Mozilla Firefox</a><br/>
					<a href="http://www.google.com/chrome/">Google Chrome</a><br/>
					<a href="http://www.apple.com/safari/download/">Apple Safari</a><br/>
					<a href="http://www.google.com/chromeframe">Google Chrome Frame for Internet Explorer</a><br/></h1>
				</canvas>
				
			</div>
			
			<!-- Pages load faster with scripts at the bottom -->
			
			<!-- Construct 2 exported games require jQuery. -->
			<script src="<?php echo url($path) ?>/jquery-2.1.1.min.js"></script>


			
		    <!-- The runtime script.  You can rename it, but don't forget to rename the reference here as well.
		    This file will have been minified and obfuscated if you enabled "Minify script" during export. -->
			<script src="<?php echo url($path) ?>/c2runtime.js"></script>

		    <script>
				// Size the canvas to fill the browser viewport.
				jQuery(window).resize(function() {
					cr_sizeCanvas(jQuery(window).width(), jQuery(window).height());
				});
				
				// Start the Construct 2 project running on window load.
				jQuery(document).ready(function ()
				{			
					// Create new runtime using the c2canvas
					cr_createRuntime("c2canvas");
				});
				
				// Pause and resume on page becoming visible/invisible
				function onVisibilityChanged() {
					if (document.hidden || document.mozHidden || document.webkitHidden || document.msHidden)
						cr_setSuspended(true);
					else
						cr_setSuspended(false);
				};
				
				document.addEventListener("visibilitychange", onVisibilityChanged, false);
				document.addEventListener("mozvisibilitychange", onVisibilityChanged, false);
				document.addEventListener("webkitvisibilitychange", onVisibilityChanged, false);
				document.addEventListener("msvisibilitychange", onVisibilityChanged, false);
				
		    </script>
		</main>
	    <script src="<?php echo asset('/assets/js/core/jquery.min.js') ?>"></script>
		<script src="<?php echo asset('/assets/js/core/bootstrap.min.js') ?>"></script>
	    <script src="<?php echo asset('/assets/js/core/jquery.slimscroll.min.js') ?>"></script>
	    <script src="<?php echo asset('/assets/js/core/jquery.scrollLock.min.js') ?>"></script>
	    <script src="<?php echo asset('/assets/js/core/jquery.appear.min.js') ?>"></script>
	    <script src="<?php echo asset('/assets/js/core/jquery.countTo.min.js') ?>"></script>
	    <script src="<?php echo asset('/assets/js/core/jquery.placeholder.min.js') ?>"></script>
	    <script src="<?php echo asset('/assets/js/core/js.cookie.min.js') ?>"></script>
	    <script src="<?php echo asset('/assets/js/app.js') ?>"></script>

	    <script>
	       jQuery(function () {

	           App.initHelpers('appear');
	       });
	    </script>
	    <script type="text/javascript">
	        $(document).ready(function(){
	            function resize() {
	            	var heightRecalculated = jQuery(window).height() - $('.ctnLogo').height();
	                var heightRecalculated = heightRecalculated + "px";

	                var widthRecalculated = jQuery(window).width();

	                var height = $(window).height();
					var width = $(window).width(); 

					if(width > height) {
					// Landscape
						$('#c2canvas').css({ height: heightRecalculated});
					} else {
					// Portrait
						
					}
	                
	            }

	            setTimeout(function() { resize(); }, 201);

	           	jQuery( window ).on("orientationchange",function(event){
	           		resize();
	            });
	        });
	    </script>
	</body> 
</html> 