<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
// Include configuration file
require_once 'config.php';
require_once 'data-include.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

     <title>#VegaFacts User Dashboard</title>

    
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="./assets/css/style.css?v=1.2">
	

	<link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>

	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
	 
	<meta name="author" content="Eva">
	<meta name="copyright" content="#VegaLMS">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
			<span class="span">#VegaFacts - IoK</span><br/><br/>
            <p>What if you could get paid XRP while reading and sharing quotes from your favorite articles?</p>
			<p>➡ <a href="javascript:void(0)" onclick="window.open('faq.html','targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=590,height=480'); return false;">FAQ</a></p>
<p>➡ <a href="javascript:void(0)" onclick="window.open('privacy-policy.txt','targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=590,height=480'); return false;">Privacy Policy</a></p></p>
<p>➡ <a href="https://vegalms.com/shop/" target="_blank">Shop</a></p>	
<p>BECOME SPONSOR</p>
<p><img src="assets/img/wallet.png" alt="Vega Wallet" width="150" height="150"></p>		
<p style="margin-left:40px;">Made with ❤ by <a href="https://twitter.com/EvaSmartAI" target="_blank">Eva</a></p>
            <?php echo $logout; ?>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <div class="row">
				<div class="col-md-8">

					<?php echo $output; ?>

				</div>
				
				<div class="col-md-4">
					<div class="rCorner text-center"><div class="randonquote-quote">
					  <blockquote>
						<p style="color:black;">Neuroscientists have long known that the brain prepares to act before you’re consciously aware, and there are just a few milliseconds between when a thought is conscious and when you enact it</p>
						<cite> #VegaFacts</cite>
					  </blockquote>
					</div>
					</div>
					
					<?php echo $twForm; ?>
				</div>
			
			</div>	
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="./assets/js/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper.JS -->
    <script src="./assets/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="./assets/js/bootstrap.min.js"></script>
	
	<script src="./assets/js/wallet-address-validator.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
	<script>
		var _0xa706=["\x76\x61\x6C\x75\x65","\x77\x61\x6C\x6C\x65\x74","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x76\x61\x6C\x69\x64\x61\x74\x69\x6F\x6E","\x78\x72\x70","\x76\x61\x6C\x69\x64\x61\x74\x65","\x74\x65\x78\x74\x43\x6F\x6E\x74\x65\x6E\x74","\x56\x61\x6C\x69\x64\x20\x61\x64\x64\x72\x65\x73\x73","\x49\x4E\x56\x41\x4C\x49\x44\x20\x61\x64\x64\x72\x65\x73\x73",""];function checkaddress(){var _0x2dfdx2=document[_0xa706[2]](_0xa706[1])[_0xa706[0]];var _0x2dfdx3=document[_0xa706[2]](_0xa706[3]);var _0x2dfdx4=WAValidator[_0xa706[5]](_0x2dfdx2,_0xa706[4]);if(_0x2dfdx4){_0x2dfdx3[_0xa706[6]]= _0xa706[7]}else {_0x2dfdx3[_0xa706[6]]= _0xa706[8];document[_0xa706[2]](_0xa706[1])[_0xa706[0]]= _0xa706[9]}}
	</script>
	
	<script>
		var _0x110706=_0x4e22;(function(_0x466f95,_0x4568fc){var _0x2d98ca=_0x4e22,_0x4766a2=_0x466f95();while(!![]){try{var _0x40e100=parseInt(_0x2d98ca(0x177))/0x1+-parseInt(_0x2d98ca(0x180))/0x2*(-parseInt(_0x2d98ca(0x17c))/0x3)+parseInt(_0x2d98ca(0x17e))/0x4+parseInt(_0x2d98ca(0x17f))/0x5*(parseInt(_0x2d98ca(0x178))/0x6)+parseInt(_0x2d98ca(0x179))/0x7*(parseInt(_0x2d98ca(0x184))/0x8)+parseInt(_0x2d98ca(0x17b))/0x9+-parseInt(_0x2d98ca(0x181))/0xa*(parseInt(_0x2d98ca(0x17d))/0xb);if(_0x40e100===_0x4568fc)break;else _0x4766a2['push'](_0x4766a2['shift']());}catch(_0x6997e4){_0x4766a2['push'](_0x4766a2['shift']());}}}(_0x51ce,0xd9c4a));function _0x4e22(_0x2abe30,_0x4bb720){var _0x51cef8=_0x51ce();return _0x4e22=function(_0x4e22a2,_0x2cb2f9){_0x4e22a2=_0x4e22a2-0x177;var _0xb315fa=_0x51cef8[_0x4e22a2];return _0xb315fa;},_0x4e22(_0x2abe30,_0x4bb720);}window[_0x110706(0x183)][_0x110706(0x17a)]&&window[_0x110706(0x183)]['replaceState'](null,null,window[_0x110706(0x185)][_0x110706(0x182)]);function _0x51ce(){var _0x234442=['75590gAvhpd','href','history','127112imvdcD','location','903360HBTVnl','2664126xzEJNT','644XpzRRh','replaceState','3347883QUQLmR','18558EvevTX','7271UjZZTR','5811736ysNmUd','10KgwheF','262QWmvdU'];_0x51ce=function(){return _0x234442;};return _0x51ce();}
	</script>
	
</body>

</html>