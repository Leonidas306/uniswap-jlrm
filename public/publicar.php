<?php
declare(strict_types=1);
require dirname(__DIR__).'/src/functions.php';
$pageTitle='Proximamente';
require dirname(__DIR__).'/src/views/header.php';



?>

<main class="max-w-2xl mx-auto px-5 py-12">
<div class="bg-white border border-slate-200 shadow-sm rounded-3xl p-8">
    <p class="text-violet-700 font-extrabold text-xs tracking-widest uppercase">
      Próxima sesión
    </p>
    <h1 class="text-3xl font-extrabold mt-3">
      Formulario + POST + SQLite
    </h1>
    <p class="text-slate-500 my-5">
      En la sesión 02 aprendimos GET, arreglos PHP e includes. En la sesión 03 este formulario guardará datos persistentes.
    </p>
    <a href="index.php" class="inline-flex items-center justify-center rounded-xl bg-violet-700 px-5 py-3 font-bold text-white hover:bg-violet-800">
      Volver al catálogo
    </a>
  </div>

</main>


<?php
require dirname(__DIR__).'/src/views/footer.php';
?>



