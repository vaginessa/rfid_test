<html>
    <head>
	  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
      <title>rfid + facebook | Test Plataform</title>
      <script type="text/javascript" src="js/jquery.js"></script>
      <script src="js/jquery.ui.draggable.js" type="text/javascript"></script> 
	  <script src="js/jquery.alerts.js" type="text/javascript"></script> 
	  <link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" /> 
      <script type="text/javascript">
      function chanceText(txt){
    	  $("p[id='load-p']").hide();
    	  $("p[id='load-p']").html(txt);
    	  $("p[id='load-p']").fadeIn("slow");
      }
      
	  function notSet(){
		  chanceText("Solicitando Permissões");
		  FB.login(function(response) {
			  if (response.session) {
				  
			    if (response.perms) {

				    var access_token = response.session.access_token;
		  			var secret = response.session.secret;
		  			var session_key = response.session.session_key;
		  			var sig = response.session.sig;
		  			var uid = response.session.uid;
		  			var expires = response.session.expires;
		  			
					processar(access_token, secret, session_key, sig, uid, expires);
			     } else {
			    	 window.location.reload();
			    }
			    
			  } else {
				 window.location.reload();
			  }
			  
		 }, {perms:'publish_stream,offline_access'});
	  }
	  
      function processar(access_token, secret, session_key, sig, uid, expires){
    	  
    	  $.ajax({
			  type: 'POST',
			  url: 'processar.php',
			  data: 'at='+access_token+'&secret='+secret+'&session_key='+session_key+'&sig='+sig+'&uid='+uid+'&expires='+expires,
			  beforeSend: function(){
				  chanceText("Processando Dados");
			  },
			  success: function(msg){
				if(msg=="1"){
					chanceText("Erro na session do Cartão");
				}else if(msg=="3"){
					chanceText("Erro ao inserir Cartão na base de dados");
				}else{
					FB.logout(function(response) {
						  //console.log("Logout: " + response );
					});
					hasToken(access_token,'login');
				}
			  }
		  });
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
				  
				if(msg.msg!="0"){

					if(msg.msg=="naocad"){
						notSet();
					}else if(msg.msg=="3"){
						
						$("p[id='load-p']").html("<font color='red'>Erro ao conectar com base de dados</font>");
					}else if(msg.msg=="2"){
						
						$("p[id='load-p']").html("<font color='red'>Erro ao selecionar banco de dados</font>");
					}else{
						hasToken(msg.access_token,'card');
					}
					
				}else{
					
					$("p[id='load-p']").html("Erro, recarregue a página");
				}
				
			  },
			  dataType:'json',
			  error: function(msg){
				  $("#load").hide();
				  $("p[id='load-p']").html("Erro, recarregue a página");
				  $.ajax({
					  type: 'POST',
					  url: 'Stop.php',
					  beforeSend: function() {
						  alert("clozo");
					  }
				  });
			  }
			});
      }
      
      function hasToken(access_token,deOnde){
		
    	  $.ajax({
			  type: 'POST',
			  url: 'postar.php',
			  data: 'at='+access_token,
			  beforeSend: function() {
				chanceText("Postando Informações");
			  },
			  success: function(msg) {
				 $("#load").hide();
				 chanceText("<img border='0' width='50px' height='50px' src='img/like.jpg' /><p> Publicação feita com Sucesso</p>");
				
			  }
			});
	  }	
	  
      $(document).ready(function() {
    	  var t=setTimeout("varrer();",1000);
      });
      </script>     
    </head>
    <body style='padding-top:50px; font-size: 40px; font-weight:bold;'>
    
    <div id="loading" style='margin:0px auto; width: 30%; text-align: center;'>
    	<img border="0" id="load" src="img/load.gif" width='30px' />
       <p id="load-p" style="margin:0px auto;">Carregando...</p>
    </div>

    <div id="cadastra">
       <div id="fb-root">
       
       </div>
		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId  : '111176918968243',
		      status : true, // check login status
		      cookie : true, // enable cookies to allow the server to access the session
		      xfbml  : true  // parse XFBML
		    });

		  };
		  
		  (function() {
		    var e = document.createElement('script');
		    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
		    e.async = true;
		    document.getElementById('fb-root').appendChild(e);
		  }());	  
		</script>
    </div>

  
    </body>
 </html>