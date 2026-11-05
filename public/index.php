<?php
declare(strict_types=1);
require dirname(__DIR__).'/src/functions.php';
$items=require dirname(__DIR__).'/src/data.php';
$qInput=$_GET['q']??'';
$q=is_string($qInput)?trim($qInput):'';
$categoryInput=$_GET['category']??'';
$category=is_string($categoryInput)?trim($categoryInput):'';
$filtered=array_values(array_filter($items,static function(array $item)use($q,$category):bool{
    $byCategory=$category===''||$item['category']===$category;
    $byText=$q===''||stripos($item['title'].''.$item['description'],$q)!==false;
    return $byCategory&&$byText;
}));
$pageTitle='Explorar';
require dirname(__DIR__).'/src/views/header.php';


?>

<main class="max-w-6xl mx-auto px-5 py-8">
<section class="bg-linear-to-r from-violet-800 via-violet-600 to-teal-600 rounded-3xl p-8 md:p-12 text-white mb-10">
    <span class="inline-block rounded-full bg-white/20 px-4 py-2 text-xs font-bold mb-5">
      ♻️ Comunidad estudiantil
    </span>
    <h1 class="text-4xl md:text-5xl font-extrabold max-w-xl leading-tight">
      Tu próximo hallazgo está aquí.
    </h1>
    <p class="text-violet-100 mt-4 mb-7">
      Intercambia y reutiliza. Hoy el catálogo se genera desde arreglos PHP.
    </p>
    <a href="publicar.php" class="inline-block rounded-xl bg-white text-violet-700 px-6 py-3 font-extrabold">
      Publicar artículo →
    </a>
  </section>
  <div class="flex flex-wrap items-end justify-between gap-4 mb-5">
    <div>
      <p class="text-violet-700 font-extrabold text-xs tracking-widest uppercase">
        Catálogo dinámico
      </p>
      <h2 class="text-3xl font-extrabold mt-1">
        Explorar artículos
      </h2>
    </div>
    <p class="text-slate-500 font-bold">
      <?= count($filtered) ?> resultados
    </p>
  </div>
  <form method="get" class="bg-white border border-slate-200 shadow-sm rounded-2xl p-4 mb-6 flex flex-col md:flex-row gap-3">
    <input
      class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-violet-600 focus:ring-2 focus:ring-violet-200 flex-1"
      type="search"
      name="q"
      value="<?= e($q) ?>"
      placeholder="Buscar artículos..."
      aria-label="Buscar"
    >
    <select class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-violet-600 focus:ring-2 focus:ring-violet-200 md:max-w-56" name="category" aria-label="Filtrar categoría">
      <option value="">
        Todas las categorías
      </option>
      <?php foreach (categories() as $cat): ?>
        <option value="<?= e($cat) ?>" <?= $category === $cat ? 'selected' : '' ?>>
          <?= e($cat) ?>
        </option>
      <?php endforeach; ?>
    </select>
    <button class="inline-flex items-center justify-center rounded-xl bg-violet-700 px-5 py-3 font-bold text-white hover:bg-violet-800">
      Buscar
    </button>
  </form>
  <?php if ($filtered === []): ?>
    <p class="bg-white border border-slate-200 shadow-sm rounded-2xl p-8 text-slate-500">
      No se encontraron artículos.
    </p>
  <?php else: ?>
    <section class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php foreach ($filtered as $item) { require dirname(__DIR__) . '/src/views/card.php'; } ?>
    </section>
  <?php endif; ?>
</main>


<?php
require dirname(__DIR__).'/src/views/footer.php';


?>


