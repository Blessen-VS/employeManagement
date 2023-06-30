<?php require("partials/headers.php")?> 
  <?php require("partials/nav.php")?>
  <?php require("partials/banner.php")?>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
   <?php foreach ($notes as $note) : ?>

    <li><?= $note['bodynote'] ?></li>
    <?php endforeach; ?>
    </div>
  </main>
  <?php require("partials/footers.php")?>