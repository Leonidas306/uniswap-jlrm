<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      <?= e($pageTitle ?? 'UniSwap GTO') ?> | UniSwap GTO
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    >
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="min-h-screen bg-slate-50 text-slate-800 font-['Plus_Jakarta_Sans']">
    <header class="bg-white border-b border-slate-200">
      <nav class="max-w-6xl mx-auto px-5 py-4 flex flex-wrap gap-4 items-center justify-between">
        <a href="index.php" class="text-2xl font-extrabold tracking-tight text-violet-700">
          UniSwap
          <span class="text-slate-800">
            GTO
          </span>
        </a>
        <div class="flex items-center gap-5 text-sm font-bold">
          <a href="index.php">
            Explorar
          </a>
          <a href="publicar.php" class="inline-flex items-center justify-center rounded-xl bg-violet-700 px-5 py-3 font-bold text-white hover:bg-violet-800">
            + Publicar
          </a>
        </div>
      </nav>
    </header>