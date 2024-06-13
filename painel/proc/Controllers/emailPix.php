<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF8");
require_once "suporte.php";
require_once __DIR__ .'/email.php';

if(!empty($_POST)){
	$exec  = new Processo;
	$dados = $_POST;

    $retorno  = $exec->getDadosComposto('id,nome,email,dataEvent,hostType', 'tb_cadastro', array('id'=>$dados['id']), array ('order by'=>'nome asc'));

    if(!empty($retorno)){
    	if(!empty($retorno[0]['hostType'])){

		$hostType = explode('|',$retorno[0]['hostType']);
		$tipo = $hostType[0]; 
		$hospedagem = str_replace(',','',substr($hostType[1], 3)); 

		$curl = curl_init();

		$array = json_encode(array('name'=>'Convencao2023Mercedes-Benz','correlationID'=>'CMA-'.$dados['id'],'value'=>$hospedagem,'comment'=>'Pagamento de '.$tipo,'identifier'=>'Pusuid'.$dados['id'],'expiresIn'=>'864000'));

		curl_setopt_array($curl, [
		  CURLOPT_URL => "https://api.openpix.com.br/api/openpix/v1/charge?return_existing=true",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $array,
		  CURLOPT_HTTPHEADER => [
		    "Authorization: Q2xpZW50X0lkXzJmZGExNDNjLTE3MDQtNGZmNS04NGJkLTA4ODAyYzRiMThkYzpDbGllbnRfU2VjcmV0X0lBa3MwQUJRcUcwYnN0SmFKcW5vMlp0V1IzeDlwTDdOUytUNWJIL0tldW89",
		    "content-type: application/json"
		  ],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  $volta = json_decode($response);
		
		  $img = $volta->charge->qrCodeImage;
		  $link = $volta->charge->paymentLinkUrl;
		  $barra = $volta->charge->brCode;
		}


		$html =
			   '<html>
			   <body>
				   <table border="1" width="600">
					   <tr>
						   <td align="center" bgcolor="#FFF"><img src="http://convencao2023mercedes-benz.com.br/proc/Controllers/function/banner-email.jpg" alt="" width="100%"></td>
					   </tr>
					   <tr>
						   <td>
							   <font face="arial" color="#000" style="text-align: center;">
							   <br>
							   <h2><center><font face="arial" color="#000">RESERVA APROVADA</font></center></h2>
												   <p>&nbsp;&nbsp;<font face="arial" color="#000">Olá, '.$retorno[0]['nome'].'!
												   <br><br>Seu cadastro de reserva foi APROVADO!
												   <br>Utilize o link abaixo para realizar o pagamento e garantir sua reserva.
												   <br><b>ATENÇÃO</b>: O link para pagamento expira em três dias corridos.
												   <br>Caso expire, 
												   favor entrar em contato com a nossa equipe de atendimento.
												   <br>O pagamento será realizado apenas através do link.</font></p>
												   <p>&nbsp;&nbsp;<b>Link</b> : <font face="arial" color="#000"><a href="'.$link.'" target="_blank">'.$link.'</a></font> </p> 
												   <p>&nbsp;&nbsp; Em caso de dúvidas, entre em contato pelo e-mail <a href="mailto:contato@convencao2023mercedes-benz.com.br">contato@convecao2023mercedes-benz.com.br</a> ou
												   <br> através do nosso WhatsApp (11) 91591-6360.
												   <p>&nbsp;&nbsp;<b>Horário de Atendimento</b> : <font face="arial" color="#000">Seg a sex das 9h às 18h.</font> </p> 
												   <br>
							   </font>
						   </td>
					   </tr>
				   </table>
			   </body>
			   </html>';
			 
			$nr = 'Convencão 2023 Mercedes-Benz';
			$eo = 'noreply@convencao2023mercedes-benz.com.br';
			$nd = $retorno[0]['nome'];
			$ed = $retorno[0]['email'];
			$as = 'Convenção 2023 Mercedes-Benz';
			$ms = $html;

			$resposta = enviaEmail($nr,$eo,$nd,$ed,$as,$ms);
			echo 'sucesso';
			$exec->setDados(array('pagamento'=>'AGRD','linkPagamento'=>$link,'dataEnvioPagamento'=>date('Y-m-d H:i:s')),'tb_cadastro', $dados['id']);
			// $exec->setDados(array('pagamento'=>'AGRD'),'tb_cadastro', $dados['id']);
		}else{
			echo 'erro 401';
		}
    }else{
		echo 'erro 402';
    }
}else{
	echo 'erro 403';
}

?>

