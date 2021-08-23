<?php

require_once "./classes/Megatizze.php";

$megatizze = new Megatizze(10, 10);
$megatizze->gerarJogos();
$megatizze->gerarResultado();
$megatizze->conferirApresentarJogos();
