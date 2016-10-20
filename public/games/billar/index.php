﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
	
	<!-- This ensures the canvas works on IE9+.  Don't remove it! -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
	<!-- Standardised web app manifest -->
	<link rel="manifest" href="app.manifest" />
	
	<title>Billiards</title>
	<!-- Note: running this exported project from disk may not work exactly like preview, since browsers block some features on the file:// protocol.  Once you've uploaded it to a server, it should work OK. -->
	
    <!-- This outlines the canvas with a black border and makes the page background black. -->
	<style type="text/css">
		body { background-color: black; color: white; }
		canvas { -ms-touch-action: none; }
        header{
        	position: relative;
        }
    </style>
</head> 
 
<body> 
	<div id="fb-root"></div>
	<div style="text-align: center;">

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
		<div id="c2canvasdiv" style="margin: 0 auto; width: 100%; height: 100%;">
		
			<!-- The canvas the project will render to.  If you change its ID, don't forget to change the
			ID the runtime looks for in the jQuery ready event (above). -->
			<canvas id="c2canvas" style="width: 100%; height: 100%;">
				<!-- This text is displayed if the visitor's browser does not support HTML5.
				You can change it, but it is a good idea to link to a description of a browser
				and provide some links to download some popular HTML5-compatible browsers. -->
				Your browser does not appear to support HTML5.  Try upgrading your browser to the latest version.  <a href="http://www.whatbrowser.org">What is a browser?</a>
				<br/><br/><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx">Microsoft Internet Explorer</a><br/>
				<a href="http://www.mozilla.com/firefox/">Mozilla Firefox</a><br/>
				<a href="http://www.google.com/chrome/">Google Chrome</a><br/>
				<a href="http://www.apple.com/safari/download/">Apple Safari</a><br/>
				<a href="http://www.google.com/chromeframe">Google Chrome Frame for Internet Explorer</a><br/>
			</canvas>
			
		</div>

        <br />
		

	</div>
	
	<!-- Pages load faster with scripts at the bottom -->
	
	<!-- Construct 2 exported games require jQuery. -->
	<script src="<?php echo url($path) ?>/jquery-2.0.0.min.js"></script>


	
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
    <script>
    	function checkOrientation(){
    		if(window.innerHeight > window.innerWidth){
    			$("#c2canvas").remove();
    			$("#c2canvasdiv").remove();
    		}else{
    			$("#c2canvas").css('display','initial');
    		}
    	} 

    	$(window).resize(function(){
			location.reload();
		});

    	$(document).ready(function() {
    		checkOrientation();
    		
    		var heightRecalculated = jQuery(window).height() - $('header').height();
    		var heightRecalculated = heightRecalculated + "px";

    		var widthRecalculated = jQuery(window).width() + "px";

    		function resize() {
    		    $('#c2canvas').css({"height": heightRecalculated, "width": widthRecalculated});
    		    $('#c2canvasdiv').css({"height": heightRecalculated, "width": widthRecalculated});
    		}

    		setTimeout(function() { resize(); }, 201);
    	});
    </script>
</body> 
</html> 