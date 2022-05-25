<?php

namespace SRC;

class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int {
        $coefSeculo = ceil($ano / 100);

        if ($coefSeculo % 100 == 0){
            $coefSeculo -= 1;
            echo "passou por aqui";
        }

        return $coefSeculo;
    }

	
	
	
	
	
	
	
	/*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero): int {
        $primoAnterior = $numero - 1;
        $primos = [1, $primoAnterior];
        $divisiveis = [];

        for ($d = 0; $d <= $primoAnterior; $d++){
            $divisiveis = [];
            $primos = [1, $primoAnterior];
            for ($i = 1; $i <= $primoAnterior; $i++){
                if ($primoAnterior % $i === 0){
                    array_push($divisiveis, $i);
                }
            };    

            if ($divisiveis === $primos){
                break;
            };
            $primoAnterior--;
        };
    return $primoAnterior;
        
    }










    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int {
        $arrayUnico = array_merge(... $arr);
        $maiorNumero = 0;
        $segundoMaior = 0;

        for($j = 0; $j < 2; $j++){  //para não perder os numeros que ja passaram na contagem
            for($i = 0; $i < count($arrayUnico); $i++){
                if($arrayUnico[$i] > $maiorNumero){
                    $maiorNumero = $arrayUnico[$i];
                }else if( $arrayUnico[$i] < $maiorNumero && $arrayUnico[$i] > $segundoMaior){
                    $segundoMaior = $arrayUnico[$i];
                };
            };
    }
    

    return $segundoMaior;
    }
	
	
	
	
	
	
	

    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true  
    [1, 2, 1, 2]  false - 
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false - 
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true - 
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false - 
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true - 
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true - 

     * */
    
	public function SequenciaCrescente(array $arr): boolean {
         $arrayWork = $arr;

	    $semRepetidas = [];
	    $contRepetidas = 0;


	    for ($i = 0; $i < count($arrayWork); $i++){
		if (in_array($arrayWork[$i], $semRepetidas)){
		    $contRepetidas++;
		    //array_push($semRepetidas, $arrayWork[$i]);
		}else{
		    array_push($semRepetidas, $arrayWork[$i]);
		}
	    }

	    if ($contRepetidas === 2) {
		return false;
	    }


	    for ($i = 0; $i < count($arrayWork); $i++){
		$arrayTemp = [];
		$crescente = false;
		$contCrescente = 0;
		$contReverse = 0;
		$reverse = false;
		for ($j = 0; $j < count($arrayWork); $j++){
		    if ($j === $i){
			continue;
		    }
		    array_push($arrayTemp, $arrayWork[$j]);

		}

		//para verificar se está crescente 
		for ($j = 0; $j < count($arrayTemp) - 1; $j++){
		    if ($arrayTemp[$j] < $arrayTemp[$j + 1]){
			$contCrescente++;
		    }

		    if ($arrayTemp[$j] < 0){
			$contReverse++;
			//$reverse = true;
		    }

		    if ($contReverse === 1){
			$reverse = true;
		    }else if ($contReverse === 2){$reverse = false;}
		}
		sort($semRepetidas);
		if (count($arrayTemp) < count($semRepetidas)){
		    if($reverse){
			array_shift($semRepetidas);
		    }else{
			array_pop($semRepetidas);
		    }
		}

		if ($contCrescente == count($arrayTemp ) - 1){
		    $crescente = true;
		}

		if ($arrayTemp === $semRepetidas && $crescente){
		    return true;
		}
	    }

	    sort($semRepetidas);

	    return false;
    }
}

//$a = new Funcoes();
//a -> SeculoAno(2000);
