<?php
/**
 * Processamento dos resumos de 2019.
 * Exemplo de uso:
 *  $ cd SBPqO
 *  $ php src/proc.php -x etapa01a
 */

include(__DIR__."/lib.php");

/* estranho depois rever como usar
$cmd = array_pop($io_options_cmd); // ignora demais se houver mais de um
if (!$cmd)
	die( "\nERRO, SEM COMANDO\n" );
elseif (count($io_options_cmd)) {
	die("\nERRO, MAIS DE UM COMANDO, SÓ PODE UM\n");
}
if ($cmd == 'help')
	die($io_usage);
elseif ($cmd=='version')
	die(" lib.php version $LIBVERS\n");
*/

$cmd=$MODO='';

if (isset($argv[0])) {
	// TERMINAL:
	array_shift($argv);
	for($i=0; $i<$argc; $i++) if (isset($argv[$i]) && substr($argv[$i],0,1)=='-') {
		$MODO = strtolower( substr($argv[$i],1) );
		array_splice($argv, $i, 1);
		break;
	}
	if (empty($argv)) $cmd='';
	else $cmd=$argv[0];
} else echo "\nERRO: nao parece terminal";


$dir_recebido = "$io_baseDir/recebidoOriginal";
$dir_entrega = "$io_baseDir/entrega";
$debug =1;
$allNodes = [];
$nodeNames = [];

switch ($cmd) {
    case "etapa01":
    case "etapa01a":
	echo "\n -- etapa01a - Lendo XMLs originais, conferindo e gravando como UTF8 -- ";
	foreach( glob("$dir_recebido/*.xml") as $f0 ) {
		$f=realpath($f0);
		$pinfo = pathinfo($f);
		$xml = file_get_contents($f);
		$sxml_resumos = new SimpleXMLElement($xml);
		print "\n-- {$pinfo['basename']}: "
		   .$sxml_resumos->Resumo[0]->Sigla ." .. ". $sxml_resumos->Resumo[$sxml_resumos->count() -1]->Sigla;
		$dom = dom_import_simplexml($sxml_resumos);
		$enc = $dom->ownerDocument->encoding;
		if ($enc=='iso-8859-1') {
			$fupath = realpath("{$pinfo['dirname']}/../entregas/etc");
			$fu = str_replace('.xml',".xml",$pinfo['basename']);
			$dom2 = new DOMDocument();
			$dom2->loadXML($xml);
			$dom2->encoding = 'utf-8'; // convert document encoding to UTF8
            		$xml = $dom2->saveXML(); // return valid, utf8-encoded XML 
			$sxml2 = simplexml_load_string($xml,'SimpleXMLElement', LIBXML_NOCDATA);
			$f2 = "$dir_recebido/$fu";
			$xml = $sxml2->asXML(); //  
			file_put_contents( $f2, $xml );
		}
		$dit = new RecursiveIteratorIterator(
			    new RecursiveDOMIterator($dom),
			    RecursiveIteratorIterator::SELF_FIRST);
		foreach($dit as $node) {
		    if($node->nodeType === XML_ELEMENT_NODE) {
			$x = preg_replace('/\[\d+\]/su','[]', $node->getNodePath() );
			if (isset($allNodes[$x]))  $allNodes[$x]++; else $allNodes[$x]=1;
			$nodeNames[$node->nodeName]=1;
		    }
		}
	} // all files
	$nodePaths = array_keys($allNodes);
	$nodeNames = array_keys($nodeNames);
	$numItems = $allNodes[$nodePaths[0]];
	$is_allSame = array_reduce(
		array_values($allNodes), 
		function ($c,$i) use ($numItems) { $c = $c && ($i==$numItems); return $c; },
		1
	);
	if (!$is_allSame) print(PHP_EOL."!Erro, confira inconsitências:\n".json_encode($allNodes,$jsonOpts));
	print "\nNode paths: ".join($nodePaths,"; ");
	print "\nNode names: ".join($nodeNames,"; ");
        break; // etapa01a

    case "etapa01b":
	echo "\n -- etapa01b - Convertendo residuos XHTML do CDATA -- ";
	foreach( glob("$dir_recebido/*.xml") as $f0 ) {
		$f=realpath($f0);
		$pinfo = pathinfo($f);
		$xml = file_get_contents($f);
		$sxml_resumos = new SimpleXMLElement($xml);
		print "\n-- {$pinfo['basename']}: "
		   .$sxml_resumos->Resumo[0]->Sigla ." .. ". $sxml_resumos->Resumo[$sxml_resumos->count() -1]->Sigla;
		$dom = dom_import_simplexml($sxml_resumos);
		$enc = $dom->ownerDocument->encoding;
		if ($enc!='utf-8') die("\nERRO: UTF8 esperado nos XMLs.");
		
		$xml = preg_replace('~&lt;(/)?(i|sub|sup|b|strong)&gt;~s','<$1i>',$xml);
		$xml = preg_replace('/&amp;#(\d+);/s','&#$1;',$xml);
		file_put_contents( "$dir_recebido/{$pinfo['basename']}", $xml );
		//$sxml_resumos = new SimpleXMLElement($xml); die(PHP_EOL.$sxml_resumos->asXML());
		// já poderia fazer mb_chr ( int $cp [, string $encoding ] ) e conferir tabela de símbolos.
		// mb_convert_encoding($profile, 'HTML-ENTITIES', 'UTF-8'));
	} // all files

        break; // etapa01b


    default:
	print_r($io_options_cmd);
        echo "$cmd INVALIDO";
}

print "\n";

