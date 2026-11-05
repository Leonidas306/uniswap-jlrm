<?php
declare(strict_types=1);
require dirname(__DIR__).'/src/functions.php';
$items=require dirname(__DIR__).'/src/data.php';
$id=filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
$item=null;

foreach($items as $candidate){
    if($candidate['id']===$id){
        $item=$candidate;
        break;
    }
}
if($item===null){
    http_response_code(404);
    echo 'Artículo no encontrado';
    exit;
}
$pageTitle=$item['title'];
require dirname(__DIR__).'/src/views/header.php';

?>

<main class="max-w-5xl mx-auto px-5 py-10">
    <a href="index.php" class="font-bold text-violet-700">
    ← Volver al catálogo
  </a>
  <section class="bg-white border border-slate-200 shadow-sm rounded-3xl overflow-hidden grid md:grid-cols-2 mt-6">
    <div
      class="bg-linear-to-br from-violet-100 to-sky-100 min-h-80 flex items-center justify-center text-9xl"
      data-category="<?= e($item['category']) ?>"
    >
      <?= emoji_for($item['category']) ?>
    </div>
    <div class="p-8">
      <span class="inline-block rounded-full bg-violet-100 px-3 py-1.5 text-xs font-bold text-violet-700">
        <?= e($item['category']) ?>
      </span>
      <h1 class="text-3xl font-extrabold my-3">
        <?= e($item['title']) ?>
      </h1>
      <strong class="text-3xl text-violet-700">
        <?= format_price($item['price_cents']) ?>
      </strong>
      <p class="my-6 text-slate-500 leading-relaxed">
        <?= nl2br(e($item['description'])) ?>
      </p>
      <div class="border-t pt-4 space-y-2">
        <p>
          <strong>
            Condición:
          </strong>
          <?= e($item['condition']) ?>
        </p>
        <p>
          <strong>
            Alias:
          </strong>
          <?= e($item['seller']) ?>
        </p>
        <p>
          <strong>
            Zona:
          </strong>
          <?= e($item['zone']) ?>
        </p>
      </div>
    </div>
  </section>
</main>

<?php
require dirname(__DIR__).'/src/views/footer.php';

?>



