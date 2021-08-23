<?php

use JetBrains\PhpStorm\ArrayShape;

class Megatizze
{
  private $quantidadeDezenas;
  private $resultado;
  private $totalJogos;
  private $jogos;

  public function __construct(Int $quantidadeDezenas, Int $totalJogos)
  {
    $this->checarQuantidadeDezenas($quantidadeDezenas);

    $this->quantidadeDezenas = $quantidadeDezenas;
    $this->totalJogos = $totalJogos;
  }

  private function checarQuantidadeDezenas(Int $quantidadeDezenas)
  {
    $quantidadeDezenasAceitas = [6, 7, 8, 9, 10];

    if (!in_array($quantidadeDezenas, $quantidadeDezenasAceitas)) {
      echo 'Quantidade de dezenas não permitida';
      exit;
    }
  }

  public function __get($atributo)
  {
    return $this->$atributo;
  }

  public function __set($atributo, $valor)
  {
    $this->$atributo = $valor;
  }

  private function novoJogo() : Array
  {
    $dezenas = $this->gerarDezenas($this->quantidadeDezenas);
    sort($dezenas, SORT_NUMERIC);
    
    return $dezenas;
  }

  public function gerarJogos()
  {
    for ($i = 1; $i <= $this->totalJogos; $i++)
      $this->jogos[] = $this->novoJogo();
  }

  public function gerarResultado() : Void
  {
    $this->resultado = $this->gerarDezenas(6);
    sort($this->resultado, SORT_NUMERIC);
  }

  public function conferirApresentarJogos()
  {
    $quantidadeDezenasSorteadas = [];

    foreach ($this->jogos as $jogo)
      $quantidadeDezenasSorteadas[] = count(
        array_intersect($jogo, $this->resultado)
      );

    require_once "./views/resultado.php";
  }

  private function gerarDezenas(Int $quantidadeDezenas) : Array
  {
    $dezenas = [];

    for ($i = 1; $i <= $quantidadeDezenas; $i++) {
      $dezenaGerada = str_pad(rand(1, 60), 2, '0', STR_PAD_LEFT);

      if (!in_array($dezenaGerada, $dezenas))
        $dezenas[] = $dezenaGerada;
      else
        $i--;
    }

    return $dezenas;
  }
}