<!-- navbar -->
<?php
$currentPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if ($currentPath === "/") { ?>
  <?php $navItems = [
    [
      "label" => "Projects",
      "href" => "/projects",
      "icon" => "folder-tree-solid-full.svg",
    ],
    [
      "label" => "Collab",
      "href" => "/collab",
      "icon" => "users-solid-full.svg",
    ],
    [
      "label" => "Membership",
      "href" => "/membership",
      "icon" => "address-card-solid-full.svg",
    ],
    [
      "label" => "Achievements",
      "href" => "/achievements",
      "icon" => "medal-solid-full.svg",
    ],
    [
      "label" => "Contact",
      "href" => "/contact",
      "icon" => "phone-solid-full.svg",
    ],
  ]; ?>

  <header class="fixed top-2 w-[98vw] z-50 bg-blue-900/60 backdrop-blur-sm shadow-lg rounded-2xl py-1">
    <div class="flex justify-between items-center px-2 text-gray-100">
      <!-- Logo -->
      <a href="/" class="flex items-center gap-x-2">
        <img src="assets/images/v3.png" alt="logo" class="size-12 brightness-50">
        <span class="text-amber-400 font-semibold text-xl">NexArc RISE</span>
      </a>

      <!-- Hamburger -->
      <button id="menu-toggle" class="md:hidden focus:outline-none">
        <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>

      <!-- Nav Links (Desktop) -->
      <nav class="hidden md:flex gap-6 font-medium">
        <?php foreach ($navItems as $item): ?>
          <a href="<?= $item[
            "href"
          ] ?>" class="flex items-center gap-2 hover:text-amber-400 transition duration-200">
            <span class="size-6">
              <?= str_replace(
                "<svg",
                '<svg class="w-full h-full fill-current"',
                file_get_contents(
                  "assets/icons/{$item["icon"]}",
                ),
              ) ?>
            </span>
            <?= $item["label"] ?>
          </a>
        <?php endforeach; ?>
      </nav>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden flex-col px-6 pb-4 font-medium text-base bg-blue-950 text-white space-y-2">
      <?php foreach ($navItems as $item): ?>
        <a href="<?= $item[
          "href"
        ] ?>" class="block py-2 px-3 rounded hover:bg-blue-800"><?= $item[
  "label"
] ?></a>
      <?php endforeach; ?>
    </div>
  </header>

  <script>
    const toggleBtn = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    toggleBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>
<?php }
?>

<!-- navbar end -->

<main class="relative top-16">

<?php
include_once "components/about.php";
include_once "components/carousel.php";
include_once "components/tiny.php";
?>

<!-- Quick Links Section -->
<section class="p-8 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
  <?php foreach ($navItems as $item): ?>
    <div class="flex flex-col items-center text-center p-4 rounded-2xl shadow-md hover:bg-amber-50 transition duration-200">
      <div class="w-12 h-12 mb-2">
        <?= str_replace(
          "<svg",
          '<svg class="w-full h-full fill-current text-blue-900"',
          file_get_contents("assets/icons/{$item["icon"]}"),
        ) ?>
      </div>
      <div class="font-semibold text-blue-900"><?= $item[
        "label"
      ] ?></div>
    </div>
  <?php endforeach; ?>
</section>

<!-- ongoing projects -->
<section class="p-8">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-3xl font-bold">Ongoing Projects</h2>
    <a href="/projects">View More</a>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php for ($i = 1; $i <= 3; $i++): ?>
      <div class="p-4 rounded shadow" style="background-image: url('https://placehold.co/300'); background-size: cover; background-position: center; height: 200px;">Project <?= $i ?></div>
    <?php endfor; ?>
  </div>
</section>

<!-- Completed Projects -->
<section class="p-8 mb-10">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-3xl font-bold">Completed Projects</h2>
    <a href="/projects">View More</a>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php for ($i = 1; $i <= 3; $i++): ?>
      <div class="p-4 rounded shadow" style="background-image: url('https://placehold.co/300'); background-size: cover; background-position: center; height: 200px;">Project <?= $i ?></div>
    <?php endfor; ?>
  </div>
</section>

<script>
let index = 0;
function nextCard() {
  index = Math.min(index + 1, 7 - 3);
  document.getElementById('cards').style.transform = `translateX(-${index * 7.5}rem)`;
}
function prevCard() {
  index = Math.max(index - 1, 0);
  document.getElementById('cards').style.transform = `translateX(-${index * 7.5}rem)`;
}
</script>
</main>
