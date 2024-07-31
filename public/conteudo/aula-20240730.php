<?php

$nome = 'Chiquim';
$nome = 'Chiquim da Silva';

$nomeCompleto = "Antonio" . $nome;

$numero = 10;

// if ($numero === '10') {
//     echo "Igual";
// }

// for ($i = 10; $i <= 100; $i += 10) {
//     echo $i;
// }



//nova forma
const PASSWORD = 'senha1234';

//forma antiga
// define('PASSWORD', 'senha1234');


// arrays

//forma antiga
$alunos = array('Maria', 'Josefa');

//forma nova (nao tao nova)
$alunos = ['Maria', 'Josefa'];

$alunos[] = 'Jorge';
$alunos[9] = 'Samuel';
$alunos[3] = 'Jaime';
$alunos[10] = 'Rosana'; 
$alunos[8] = 'Samantha';
$alunos[11] = 'Nayara';
$alunos['dez'] = 'Edivan'; 


foreach ($alunos as $posicao => $cada) {
    echo $posicao, ': ', $cada, '<br>';
}


for ($i = 1; $i <= 10000; $i++) {
    echo $i;
}


// echo $alunos[11];

// echo $alunos[10];

// echo $alunos['dez'];

echo '<pre>';
print_r($alunos);

