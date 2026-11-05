# Sesión 01 — HTML5, Tailwind y primer servidor PHP

**Duración:** 90 minutos · **Feature:** `feature/s01-ui-foundation` · **PR:** `develop` · **Servidor:** PHP nativo (`php -S`)

**Regla visual:** 100 % utilidades Tailwind CSS. Esta sesión **no requiere ni incluye CSS propio** (`styles.css` eliminado). La tipografía se descarga de Google Fonts por CDN.

> **Antes de comenzar:** sigue [01 — Instalación paso a paso en Windows/Mac y arranque del servidor](01-INSTALACION-MAC-WINDOWS.md). Incluye descargas oficiales, configuración de PHP y diagnóstico de SQLite. Revisa también [13 — Lista completa de CDN](13-RECURSOS-Y-CDN.md).

## 1. Objetivos de aprendizaje

- Comprender HTML5 semántico, etiquetas de navegación y formularios sin lógica.
- Aplicar **exclusivamente utilidades Tailwind** con un CDN y Google Fonts.
- Iniciar y detener el servidor nativo de PHP, incluso para servir HTML estático.
- Crear una rama feature nacida de develop y presentar un Pull Request.

## 2. Agenda de clase (90 minutos)

| Tiempo | Actividad |
|---:|---|
| 15 min | Verificar PHP, Git y servidor local |
| 15 min | Crear master/develop y feature de sesión 01 |
| 40 min | Diseñar catálogo y detalle con HTML5 y Tailwind |
| 10 min | Crear formulario visual y probar navegación |
| 10 min | Commit, Push y PR hacia develop |

## 3. Preparación con PHP, Git y servidor local

### Paso A — Abre la carpeta correcta

Este material incluye `plantillas/sesion-01` como **snapshot completo**. Úsalo para comparar. En el repositorio de prácticas crea los archivos en la raíz de tu **proyecto de trabajo**, NO dentro de `plantillas/`.

Para consultar el snapshot en macOS:

```bash
cd plantillas/sesion-01
pwd
php -v
```

En Windows PowerShell (desde la raíz del material descomprimido):

```powershell
cd .\plantillas\sesion-01
Get-Location
php -v
```

Para trabajar en tu propio Git, vuelve a la **carpeta raíz de tu repositorio de aplicación**; estos dos comandos `cd` son solamente para consultar las plantillas.

### Paso B — Confirma requisitos PHP

```bash
php -v
php --ini
php -r "echo implode(',', PDO::getAvailableDrivers()), PHP_EOL;"
```

**En esta sesión SQLite todavía NO es obligatorio:** basta con PHP instalado y operativo.

### Paso C — Crea la rama correspondiente

Estos comandos se ejecutan **dentro de tu repositorio de aplicación**, con un remoto `origin` ya configurado. En la primera sesión inicializa `master` y `develop` con la [guía Git completa](02-GIT-Y-GITHUB.md).

```bash
git switch develop
git pull --ff-only origin develop
git switch -c feature/s01-ui-foundation
git status
```

### Paso D — URL y comando de arranque

Desde la **raíz de tu aplicación**:

```bash
php -S 127.0.0.1:8000 -t public
```

Página de entrada: **http://127.0.0.1:8000/index.html**. Mantén la terminal abierta mientras pruebas; `Ctrl+C` detiene el servidor. Si el puerto está ocupado cambia 8000 por 8001 también en la URL.

## 4. Construcción paso a paso — archivo por archivo

### Paso 1 — Crear el repositorio y la rama

Crea una carpeta de trabajo nueva (no dentro de `plantillas/`), inicializa `master`/`develop` siguiendo la [guía Git](02-GIT-Y-GITHUB.md), sincroniza `develop` y crea `feature/s01-ui-foundation`. Los snapshots del ZIP son de **consulta**, no se desarrollan directamente sobre ellos.

### Paso 2 — Preparar los archivos de la interfaz

Crea `public/`, añade `.gitignore` y escribe `public/index.html` con `<!doctype html>`, `<head>`, nav y main. Añade el CDN y la fuente **directamente en `<head>`**; no crees archivo CSS ni instales Node.

### Paso 3 — Dibujar las tarjetas del catálogo

Construye la sección hero, el grid responsivo (`grid sm:grid-cols-2 lg:grid-cols-3`) y tarjetas. Cada elemento usa clases Tailwind: `rounded-2xl`, `bg-white`, `shadow-sm`, `text-violet-700`.

### Paso 4 — Agregar navegación

Crea `public/detalle.html` y `public/publicar.html`. Revisa `href="index.html"`, `href="detalle.html"`, `href="publicar.html"`. En sesión 01 el formulario es visual: no habrá base de datos.

### Paso 5 — Ejecutar el servidor PHP

Desde la **raíz del proyecto de trabajo** ejecuta `php -S 127.0.0.1:8000 -t public` y visita las tres URLs. Usa `Ctrl+C` para cerrar; no abras HTML mediante Live Server para mantener el mismo flujo del curso.

### Paso 6 — Publicar tu feature

Ejecuta `git status`, `git add .`, `git commit`, `git push -u origin feature/s01-ui-foundation`; crea el PR con **base develop**. La sesión 02 empieza después de que se integre ese PR.

## 5. CDN incluidos (sin CSS adicional)

**Tailwind y Google Fonts ya están incluidos en los archivos HTML o en `src/views/header.php`:**

```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
```

Para aplicar la fuente utilizamos `font-['Plus_Jakarta_Sans']` en `<body>`; el diseño se logra con clases de Tailwind, sin `<style>` ni `styles.css`. En la sesión 04 se incorpora únicamente un pequeño archivo **JavaScript nativo local** para confirmar borrado; tampoco necesita un CDN adicional.

## 6. Árbol exacto de archivos de la sesión

El siguiente listado representa el estado de la aplicación al terminar la sesión 01. No debes crear las cuatro sesiones dentro del repositorio de trabajo: **cada sesión evoluciona la anterior en su propia feature**.

```text
.gitignore
README.md
public/detalle.html
public/index.html
public/publicar.html
```

## 7. Código fuente COMPLETO para crear cada archivo

**Instrucción:** crea las carpetas si todavía no existen, copia el contenido completo del bloque indicado y guarda el archivo en esa ruta **relativa a la raíz del proyecto de trabajo**. El contenido mostrado coincide exactamente con la plantilla ejecutable incluida en el ZIP.

### Archivo: `.gitignore`

Controla qué archivos NO deben subirse al repositorio (por ejemplo la base SQLite).

```gitignore
.DS_Store
**/.DS_Store
Thumbs.db
.env
*.log
```

### Archivo: `README.md`

Describe cómo ejecutar la versión que corresponde a esta sesión.

````markdown
# UniSwap GTO — Estado al finalizar la sesión 01

Prototipo visual: HTML5 + Tailwind CSS Play CDN (solo desarrollo) + Plus Jakarta Sans.

```bash
php -S 127.0.0.1:8000 -t public
```

Abrir http://127.0.0.1:8000/index.html. No existen base de datos ni servidor PHP de aplicación todavía.

**Entorno:** instala PHP según `../../guias/01-INSTALACION-MAC-WINDOWS.md` (snapshot) o la guía de la raíz; abre el servidor desde ESTA carpeta con `php -S 127.0.0.1:8000 -t public`. **Diseño:** Tailwind Play CDN + Google Fonts, sin archivo CSS propio.
````

### Archivo: `public/detalle.html`

Página visual de detalle de un artículo.

```html
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      Detalle | UniSwap GTO
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
      <nav class="max-w-6xl mx-auto px-5 py-4 flex justify-between items-center">
        <a href="index.html" class="text-2xl font-extrabold text-violet-700">
          UniSwap GTO
        </a>
        <a href="publicar.html" class="inline-flex items-center justify-center rounded-xl bg-violet-700 px-5 py-3 font-bold text-white hover:bg-violet-800">
          Publicar
        </a>
      </nav>
    </header>
    <main class="max-w-5xl mx-auto px-5 py-10">
      <a href="index.html" class="text-violet-700 font-bold">
        ← Volver al catálogo
      </a>
      <div class="bg-white border border-slate-200 shadow-sm rounded-3xl overflow-hidden mt-6 grid md:grid-cols-2">
        <div class="bg-linear-to-br from-violet-100 to-sky-100 min-h-80 flex items-center justify-center text-9xl" data-category="Libros">
          📚
        </div>
        <div class="p-8">
          <span class="inline-block rounded-full bg-violet-100 px-3 py-1.5 text-xs font-bold text-violet-700">
            Libros
          </span>
          <h1 class="text-3xl font-extrabold my-3">
            Cálculo diferencial
          </h1>
          <p class="text-3xl font-extrabold text-violet-700">
            $180 MXN
          </p>
          <p class="text-slate-500 mt-5">
            Libro en buen estado, perfecto para comenzar el semestre. Publicación de demostración.
          </p>
          <div class="mt-6 border-t pt-5">
            <p>
              <strong>
                Condición:
              </strong>
              Buen estado
            </p>
            <p>
              <strong>
                Vendedor:
              </strong>
              Estudiante demo
            </p>
            <p>
              <strong>
                Zona:
              </strong>
              DICIS
            </p>
          </div>
          <a href="index.html" class="inline-flex items-center justify-center rounded-xl bg-violet-700 px-5 py-3 font-bold text-white hover:bg-violet-800 mt-7">
            Volver a explorar
          </a>
        </div>
      </div>
    </main>
  </body>
</html>
```

### Archivo: `public/index.html`

Página principal estática del catálogo.

```html
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      UniSwap GTO | Encuentra algo genial
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
      <nav class="mx-auto max-w-6xl px-5 py-4 flex flex-wrap items-center justify-between gap-4">
        <a href="index.html" class="text-2xl font-extrabold tracking-tight text-violet-700">
          UniSwap
          <span class="text-slate-800">
            GTO
          </span>
        </a>
        <div class="flex items-center gap-5 text-sm font-bold">
          <a href="index.html" class="text-violet-700">
            Explorar
          </a>
          <a href="publicar.html" class="inline-flex items-center justify-center rounded-xl bg-violet-700 px-5 py-3 font-bold text-white hover:bg-violet-800">
            + Publicar
          </a>
        </div>
      </nav>
    </header>
    <main class="max-w-6xl mx-auto px-5 py-8">
      <section class="bg-linear-to-r from-violet-800 via-violet-600 to-teal-600 rounded-3xl p-8 md:p-12 text-white mb-10">
        <span class="inline-block rounded-full bg-white/20 px-4 py-2 text-xs font-bold mb-5">
          ♻️ Dale otra oportunidad a tus cosas
        </span>
        <h1 class="text-4xl md:text-5xl font-extrabold max-w-xl leading-tight">
          Lo que ya no usas puede ser justo lo que alguien necesita.
        </h1>
        <p class="text-violet-100 mt-4 mb-7 max-w-lg">
          Compra, vende o intercambia artículos entre estudiantes. Proyecto académico demostrativo.
        </p>
        <a href="publicar.html" class="inline-block rounded-xl bg-white text-violet-700 px-6 py-3 font-extrabold">
          Publicar artículo →
        </a>
      </section>
      <section class="mb-5 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
        <div>
          <p class="text-xs font-bold text-violet-600 uppercase tracking-widest">
            Explora el catálogo
          </p>
          <h2 class="text-3xl font-extrabold mt-1">
            Encuentra tu próximo hallazgo
          </h2>
        </div>
        <div class="flex flex-wrap gap-2">
          <span class="inline-block rounded-full bg-violet-100 px-3 py-1.5 text-xs font-bold text-violet-700">
            Todos
          </span>
          <span class="inline-block rounded-full bg-violet-100 px-3 py-1.5 text-xs font-bold text-violet-700">
            Libros
          </span>
          <span class="inline-block rounded-full bg-violet-100 px-3 py-1.5 text-xs font-bold text-violet-700">
            Tecnología
          </span>
          <span class="inline-block rounded-full bg-violet-100 px-3 py-1.5 text-xs font-bold text-violet-700">
            Accesorios
          </span>
        </div>
      </section>
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
        <article class="bg-white border border-slate-200 shadow-sm rounded-2xl overflow-hidden">
          <div class="bg-linear-to-br from-violet-100 to-sky-100 h-48 flex items-center justify-center text-7xl" data-category="Libros">
            📚
          </div>
          <div class="p-5">
            <span class="inline-block rounded-full bg-violet-100 px-3 py-1.5 text-xs font-bold text-violet-700">
              Libros
            </span>
            <h3 class="font-extrabold text-lg mt-3">
              Cálculo diferencial
            </h3>
            <p class="text-slate-500 text-sm">
              Buen estado · DICIS
            </p>
            <div class="flex justify-between items-center mt-4">
              <strong class="text-2xl">
                $180 MXN
              </strong>
              <a class="text-violet-700 font-bold text-sm" href="detalle.html">
                Ver detalle →
              </a>
            </div>
          </div>
        </article>
        <article class="bg-white border border-slate-200 shadow-sm rounded-2xl overflow-hidden">
          <div class="bg-linear-to-br from-violet-100 to-sky-100 h-48 flex items-center justify-center text-7xl" data-category="Tecnología">
            💻
          </div>
          <div class="p-5">
            <span class="inline-block rounded-full bg-violet-100 px-3 py-1.5 text-xs font-bold text-violet-700">
              Tecnología
            </span>
            <h3 class="font-extrabold text-lg mt-3">
              Teclado mecánico
            </h3>
            <p class="text-slate-500 text-sm">
              Nuevo · Salamanca
            </p>
            <div class="flex justify-between items-center mt-4">
              <strong class="text-2xl">
                $450 MXN
              </strong>
              <a class="text-violet-700 font-bold text-sm" href="detalle.html">
                Ver detalle →
              </a>
            </div>
          </div>
        </article>
        <article class="bg-white border border-slate-200 shadow-sm rounded-2xl overflow-hidden">
          <div class="bg-linear-to-br from-violet-100 to-sky-100 h-48 flex items-center justify-center text-7xl" data-category="Accesorios">
            🎧
          </div>
          <div class="p-5">
            <span class="inline-block rounded-full bg-violet-100 px-3 py-1.5 text-xs font-bold text-violet-700">
              Accesorios
            </span>
            <h3 class="font-extrabold text-lg mt-3">
              Audífonos inalámbricos
            </h3>
            <p class="text-slate-500 text-sm">
              Buen estado · Irapuato
            </p>
            <div class="flex justify-between items-center mt-4">
              <strong class="text-2xl">
                $320 MXN
              </strong>
              <a class="text-violet-700 font-bold text-sm" href="detalle.html">
                Ver detalle →
              </a>
            </div>
          </div>
        </article>
      </div>
    </main>
    <footer class="text-center p-8 text-slate-500 text-sm">
      UniSwap GTO · Aplicación educativa · Sesión 01 (prototipo estático)
    </footer>
  </body>
</html>
```

### Archivo: `public/publicar.html`

Formulario visual sin guardar datos.

```html
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      Publicar | UniSwap GTO
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
      <nav class="max-w-4xl mx-auto px-5 py-4 flex justify-between items-center">
        <a href="index.html" class="text-2xl font-extrabold text-violet-700">
          UniSwap GTO
        </a>
        <a href="index.html" class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 font-bold text-slate-800 hover:border-violet-400 hover:text-violet-700">
          ← Catálogo
        </a>
      </nav>
    </header>
    <main class="max-w-2xl mx-auto px-5 py-10">
      <p class="text-violet-700 font-bold text-xs tracking-widest uppercase">
        Prototipo UI · Sesión 01
      </p>
      <h1 class="text-3xl font-extrabold mt-2 mb-2">
        Publica un artículo
      </h1>
      <p class="text-slate-500 mb-7">
        Este formulario todavía no envía información. Conectaremos PHP en la sesión 03.
      </p>
      <form
        class="bg-white border border-slate-200 shadow-sm rounded-3xl p-7 space-y-5"
        onsubmit="event.preventDefault(); alert('¡Interfaz lista! En la sesión 03 implementaremos POST + SQLite.');"
      >
        <label class="block font-bold text-sm">
          Título
          <input class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-violet-600 focus:ring-2 focus:ring-violet-200 mt-2" name="title" placeholder="Ej. Libro de cálculo" required>
        </label>
        <div class="grid sm:grid-cols-2 gap-4">
          <label class="block font-bold text-sm">
            Categoría
            <select class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-violet-600 focus:ring-2 focus:ring-violet-200 mt-2" name="category">
              <option>
                Libros
              </option>
              <option>
                Tecnología
              </option>
              <option>
                Accesorios
              </option>
              <option>
                Hogar
              </option>
              <option>
                Otros
              </option>
            </select>
          </label>
          <label class="block font-bold text-sm">
            Precio (MXN)
            <input class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-violet-600 focus:ring-2 focus:ring-violet-200 mt-2" name="price" type="number" min="1" step="0.01" required>
          </label>
        </div>
        <label class="block font-bold text-sm">
          DescripciónUNISWAP_RAW_00000_TOKEN
        </label>
        <label class="block font-bold text-sm">
          Nombre público (alias)
          <input class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-violet-600 focus:ring-2 focus:ring-violet-200 mt-2" name="seller" required>
        </label>
        <button class="inline-flex items-center justify-center rounded-xl bg-violet-700 px-5 py-3 font-bold text-white hover:bg-violet-800 w-full" type="submit">
          Vista previa: publicar
        </button>
      </form>
    </main>
  </body>
</html>
```

## 8. Cómo probar que la sesión realmente funciona

1. Inicia el servidor en la raíz con `php -S 127.0.0.1:8000 -t public` (o ejecuta antes `php scripts/init-db.php` si corresponde).
2. Copia las siguientes URL en el navegador y comprueba la respuesta:

   - http://127.0.0.1:8000/index.html
   - http://127.0.0.1:8000/detalle.html
   - http://127.0.0.1:8000/publicar.html

3. Abre herramientas de desarrollo → Network y verifica que Tailwind y la fuente Google Fonts carguen (internet obligatorio para los estilos).
4. Revisa en la terminal del servidor las peticiones HTTP y posibles errores PHP.
5. Detén el servidor con `Ctrl+C`; no cierres Git ni elimines archivos de la base por error.

### Verificación de sintaxis PHP

Desde el proyecto puedes probar de manera individual cada archivo `.php` con `php -l ruta/del/archivo.php`; por ejemplo:

```bash
php -v
git status
```

## 9. Criterios de aceptación

- [ ] Se visualiza catálogo en móvil y escritorio.
- [ ] Los enlaces llevan a las tres páginas sin 404.
- [ ] Tailwind y Google Fonts cargan desde los enlaces indicados.
- [ ] El PR tiene como destino `develop` y no `master`.

## 10. Cierre de sesión: Git/GitHub

Asegúrate de que `git status` no incluya bases de datos, contraseñas ni carpetas temporales.

```bash
git status
git diff --check
git add .
git commit -m "feat(uniswap): completar sesion 01"
git push -u origin feature/s01-ui-foundation
```

En GitHub abre **Pull Request**: `base: develop` ← `compare: feature/s01-ui-foundation`. Después de fusionarlo actualiza `develop` antes de iniciar la siguiente sesión.

> **Límite de seguridad:** la administración es una demo académica sin cuentas ni autorización. No despliegues esta versión públicamente. El CDN de Tailwind es solo para desarrollo.

 