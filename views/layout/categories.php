<link rel="stylesheet" type="text/css" href="../css/catlist.css" />

<div id="contenedor">
    <ul class="catlist">
      <?php
      require_once '../models/categorias.php';
      $cat = new Categorias;
  		$categorias = $cat->getCategorias();
      //crea categorias
        $i =0;
        while(isset($categorias[$i])){
          echo '<li><a class="catitem" href="/views/masIdeas.php?cat=';
          echo $i+1;
          echo '">';
          echo $categorias[$i];
          echo '</a></li>';
          $i++;
        }

        ?>
    </ul>
  </div>
