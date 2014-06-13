<html>
    <head>
	  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
      <title>rfid + facebook | Test Plataform</title>
      <script type="text/javascript" src="js/jquery.js"></script>
      <script src="js/jquery.ui.draggable.js" type="text/javascript"></script> 
	  <script src="js/jquery.alerts.js" type="text/javascript"></script> 
	  <link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" /> 
      <script type="text/javascript">
      
       function setFun(str){
     	  $.ajax({
 			  type: 'POST',
 			  url: 'set.php',
 			  data: 'fun='+str,
 			  success: function(msg) {
 				  alert("setado");
 			  }
 			});
       }

       
      $(document).ready(function() {
    		$("#vaiFun").click(function(){
    			setFun("evento");
        	});
      });
      </script>     
    </head>
    <body style='padding-top:50px; font-size: 40px; font-weight:bold;'>
    <a href="javascript: void(0);" id="vaiFun" >REFRESH REMOTO</a>
    </body>
 </html>