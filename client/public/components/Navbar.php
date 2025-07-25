<?php

$navLinks = [
  "/" => "Home",
  "/projects" => "Projects",
  "/collab" => "Collab",
  "/membership" => "Membership",
  "/achievements" => "Achievements",
  "/contact" => "Contact",
];

// Get current path
$currentPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// Remove the current path from nav links
unset($navLinks[$currentPath]);
?>

<header class="fixed top-0 z-30 w-full flex justify-between items-center px-4 py-3 bg-white/80 backdrop-blur-sm shadow-xl rounded-b-xl">
  <a href="/" class="flex items-center gap-2">
    <img src="assets/images/v3.png" alt="logo" class="w-10 h-10">
    <p class="text-sm md:text-base leading-tight flex flex-col">
      <span class="text-amber-400 font-semibold">NexArc</span>
      <span class="text-blue-700 font-bold">RISE</span>
    </p>
  </a>
  <button id="menu-btn" class="md:hidden text-gray-800 focus:outline-none">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
    </svg>
  </button>
  <nav class="hidden md:flex items-center gap-6 text-gray-800 font-medium text-sm md:text-base">
    <?php foreach ($navLinks as $href => $label): ?>
      <a href="<?= $href ?>" class="hover:text-blue-700"><?= $label ?></a>
    <?php endforeach; ?>
  </nav>
</header>

<div id="sidebar" class="fixed top-0 left-0 w-64 h-full bg-white shadow-lg z-40 -translate-x-full transition-transform duration-300 ease-in-out">
  <div class="p-6 space-y-4 text-gray-800 font-medium">
    <?php foreach ($navLinks as $href => $label): ?>
      <a href="<?= $href ?>" class="hover:text-blue-700"><?= $label ?></a>
    <?php endforeach; ?>
  </div>
</div>

<script>
  const menuBtn = document.getElementById('menu-btn');
  const sidebar = document.getElementById('sidebar');

  menuBtn.addEventListener('click', () => {
    sidebar.classList.toggle('-translate-x-full');
  });
</script>
