<html>
    <head>
	  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
      <title>rfid + facebook | Test Plataform</title>
      <script type="text/javascript" src="js/jquery.js"></script>
      <script src="js/jquery.ui.draggable.js" type="text/javascript"></script> 
	  <script src="js/jquery.alerts.js" type="text/javascript"></script> 
	  <link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" /> 
      <script type="text/javascript">
      function evento(){
		document.write("<h1>EVENTO ACONTECEU ");
      }
       function varrer(){
    	  $.ajax({
			  type: 'POST',
			  url: 'leitor.php',
			  data: 'id=1',
			  beforeSend: function() {
				$("p[id='load-p']").html("Aguardando Cartão");
			  },
			  success: function(msg) {
				  
				if(msg!="0"){
						eval(msg+"();");
				}else{
					setTimeout("varrer();",1000);
					$("p[id='load-p']").html("Erro, recarregue a página");
				}
				
			  }
			});
      }

       
      $(document).ready(function() {
    	  var t=setTimeout("varrer();",1000);
      });
      </script>     
    </head>
    <body style='padding-top:50px; font-size: 40px; font-weight:bold;'>
    
    </body>
 </html>