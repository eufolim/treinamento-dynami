<?php

$conteudo = file_get_contents('new.html');

$htmlPronto = str_replace('{nome}','Luiz Padauam', $conteudo);
$htmlPronto = str_replace('{telefone}','999999999', $htmlPronto);

echo $htmlPronto;


