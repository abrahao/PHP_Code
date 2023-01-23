<?php

// Com o objetivo de ver quanto os seus funcionários vendem, 
// um empresário te contratou para desenvolver um programa que leia: 
// o nome do vendedor, seu salário fixo, e o total de vendas que ele efetuou no mês, 
// sendo este valor em dinheiro.
// Um vendedor da loja ganha 15% de comissão sobre o valor das suas vendas, 
// sendo assim, descubra quanto esse funcionário vai receber no final do mês, 
// com duas casas decimais.

$nome = fgets(STDIN);
$salario = fgets(STDIN);
$totalVendas = fgets(STDIN);

$porcentagem = $totalVendas * (15/100);
$comissao = $salario + $porcentagem;

if ($comissao > 1000) {
    $comFormatado = number_format($comissao, 2, '.', '');
    echo "TOTAL = R$ " . $comFormatado;
}else{
    $comFormatado = number_format(floor(($comissao*100))/100, 2, '.', '');  
    echo "TOTAL = R$ " . $comFormatado;
}



