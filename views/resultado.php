<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado Megatizze</title>

  <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
  <div class="container">
    <h1 class='titulo-megatizze'>Megatizze</h1>

    <div id="jogos">
      <table>
        <thead>
          <th>Jogo</th>
          <th>Nº de dezenas sorteadas</th>
        </thead>
        <tbody>
          <?php foreach($this->jogos as $index => $jogo): ?>
            <tr>
              <td>
                <?=implode(' - ', $jogo); ?>
              </td>
              <td>
                <?=$quantidadeDezenasSorteadas[$index]; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>