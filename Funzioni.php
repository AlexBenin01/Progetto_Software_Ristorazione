<?php

function scriviSuFile($nomeFile, $info, $mod) {
		$file = fopen($nomeFile, $mod);
		if($file) {
			flock($file, 2);
			fputs($file, $info);
			flock($file, 3);
			fclose($file);
			return true;
		}
		else {
			return false;
		}
	}
	
	
	function ricercaNumeroRiga($nomeFile, $numRiga) {
		if(file_exists($nomeFile) == true) {
			$file = fopen($nomeFile, "r");
			$riga = "";
			for($i=0; $i<$numRiga; $i++)
				$riga = fgets($file);
			fclose($file);
			return $riga;
		}
		return false;
	}
	
function rimuovi($file, $numero, $extra){
	
	$file2 = fopen($file, "r");
	$extra=$extra."csv/temp.csv";
			$temp = fopen($extra, "w");
			$conta=1;
			fgets($file2);
			do {
				$riga = fgets($file2);
				if($conta!=$numero)
					fputs($temp, $riga);
				
				$conta++;
			}while(feof($file2) == false);
			fclose($file2);
			fclose($temp);
			rename($extra, $file);
	
}

function rimuoviID($file, $numero, $extra){
	$conta=0;
	$file2 = fopen($file, "r");
	$extra=$extra."csv/temp.csv";
			$temp = fopen($extra, "w");
			
			fputs($temp, fgets($file2));
			do {
				$riga = fgets($file2);
				$sub = explode("|",$riga);
				if($sub[1]!=$numero)
					fputs($temp, $riga);
				else
				$conta++;
			}while(feof($file2) == false);
			fclose($file2);
			fclose($temp);
			rename($extra, $file);
	return $conta;
}


function leggiDaFile($nomeFile) {
			$vett = array();
			$file = fopen($nomeFile, "r");
			
			do {
				$riga = fgets($file);
				array_push($vett, $riga);
				
			}while(feof($file) == false);
			fclose($file);
			return $vett;
						
	}

function size($file){
	 $n=filesize($file);

	return $n;
}













?>