<?php
// Leia um número inteiro que representa um código de DDD
//  para discagem interurbana. Em seguida, informe à qual 
//  cidade o DDD pertence, considerando a tabela abaixo:
//  61 - Brasilia ---------- 32 - Juiz de Fora 
//  71 - Salvador ---------- 19 - Campinas
//  11 - Sao Paulo --------- 27 - Vitoria
//  21 - Rio de Janeiro ---- 31 - Belo Horizinte


$ddd = fgets(STDIN);

if($ddd == 61){
    echo "Brasilia\n";
}else if($ddd == 71){
    echo "Salvador\n";

}else if($ddd == 11){
    echo "Sao Paulo\n";
}else if($ddd == 21){
    echo "Rio de Janeiro\n";
}
else if($ddd == 32){
    echo "Juiz de Fora\n";
}else if($ddd == 19){
    echo "Campinas\n";
}
else if($ddd == 27){
    echo "Vitoria\n";
}else if($ddd == 31){
    echo "Belo Horizonte\n";
}
else{
    echo "DDD nao cadastrado\n";
}