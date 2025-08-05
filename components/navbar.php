<?php
$currentPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$navItems = [
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
];
?>
<header class="fixed top-0 w-full z-50 backdrop-blur-sm shadow-md bg-white/80 rounded-xs">
  <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-1 text-blue-800">
    <a href="/" class="flex items-center gap-x-4">
      <img src="assets/icons/v3.png" alt="logo" class="size-10">
      <span class="font-semibold text-xl">NexArc RISE</span>
    </a>

    <button id="menu-toggle" class="md:hidden">
      <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <nav class="hidden md:flex gap-6 font-medium">
      <?php foreach ($navItems as $item): ?>
      <?php $isActive = $currentPath === $item["href"]; ?>
      <a href="<?= $item[
        "href"
      ] ?>" class="flex items-center gap-2 <?= $isActive
  ? "text-amber-500 font-semibold"
  : "" ?>">
          <span class="size-5">
            <?php
            $icon = "assets/icons/{$item["icon"]}";
            echo file_exists($icon)
              ? str_replace(
                "<svg",
                '<svg class="w-full h-full fill-current"',
                file_get_contents($icon),
              )
              : "<!-- Missing icon: {$item["icon"]} -->";
            ?>
          </span>
          <?= $item["label"] ?>
        </a>
      <?php endforeach; ?>
    </nav>
  </div>

  <div id="mobile-menu" class="md:hidden hidden p-4 space-y-2 text-right items-end">
    <?php foreach ($navItems as $item): ?>
      <?php $isActive = $currentPath === $item["href"]; ?>
      <a href="<?= $item[
        "href"
      ] ?>" class="flex flex-row-reverse items-center gap-2 py-2 border-r-2 pr-4 <?= $isActive
  ? "text-amber-500 font-semibold border-amber-500"
  : "border-blue-800" ?>">
        <?= $item["label"] ?>
      </a>
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
