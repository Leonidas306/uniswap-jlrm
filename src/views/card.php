<article class="bg-white border border-slate-200 shadow-sm rounded-2xl overflow-hidden">
  <div class="bg-linear-to-br from-violet-100 to-sky-100 h-48 flex items-center justify-center text-7xl" data-category="<?= e($item['category']) ?>">
    <?= emoji_for($item['category']) ?>
  </div>
  <div class="p-5">
    <span class="inline-block rounded-full bg-violet-100 px-3 py-1.5 text-xs font-bold text-violet-700">
      <?= e($item['category']) ?>
    </span>
    <h3 class="font-extrabold text-lg mt-3 mb-1">
      <?= e($item['title']) ?>
    </h3>
    <p class="text-slate-500 text-sm">
      <?= e($item['condition']) ?> · <?= e($item['zone']) ?>
    </p>
    <div class="flex justify-between gap-2 items-center mt-4">
      <strong class="text-xl">
        <?= format_price($item['price_cents']) ?>
      </strong>
      <a class="text-violet-700 font-bold text-sm" href="detalle.php?id=<?= (int) $item['id'] ?>">
        Ver detalle →
      </a>
    </div>
  </div>
</article>



