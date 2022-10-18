<?php
	$nome 		=	$_GET['nome'];
	$datanascimento	=	$_GET['datanascimento'];

	$vData 			= new DateTime($datanascimento);
	$datanascimento 		= $vData->format('md');
	$int_datanascimento	= intval( $datanascimento );
	
	$xml = simplexml_load_file('signo.xml');
	
	foreach ($xml->signo as $linha) :

		$int_dataIncio		=	intval($linha->dataInicio);
		$int_dataFim		=	intval($linha->dataFim);

		if 	(
				($int_datanascimento >= $int_dataIncio) and ($int_datanascimento <= $int_dataFim) 
				or 
				(($int_datanascimento <= 120) and ($int_dataFim == 120))
				or 
				(($int_datanascimento >= 1222) and ($int_dataFim == 120))
			)
		{
				echo $nome . ' seu signo é ' . $linha->signoNome;
				echo '<br><br>';
				echo 'Principais caractarísticas:';
				echo $linha->descricao;
		}
	 endforeach;
?>
