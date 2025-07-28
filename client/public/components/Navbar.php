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
    "label" => "Learning",
    "href" => "/learning",
    "icon" => "medal-solid-full.svg",
  ],
  [
    "label" => "Contact",
    "href" => "/contact",
    "icon" => "phone-solid-full.svg",
  ],
];
?>

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

      <!-- Desktop Nav Links -->
      <nav class="hidden md:flex gap-6 font-medium">
        <?php foreach ($navItems as $item): ?>
          <a href="<?php echo $item[
            "href"
          ]; ?>" class="flex items-center gap-2 hover:text-amber-400 transition duration-200">
            <span class="size-6">
              <?php
              $iconPath = "assets/icons/{$item["icon"]}";
              if (file_exists($iconPath)) {
                echo str_replace(
                  "<svg",
                  '<svg class="w-full h-full fill-current"',
                  file_get_contents($iconPath),
                );
              } else {
                echo "<!-- Missing icon: {$item["icon"]} -->";
              }
              ?>
            </span>
            <?php echo $item["label"]; ?>
          </a>
        <?php endforeach; ?>
      </nav>
    </div>

    <div id="mobile-menu" class="md:hidden hidden flex-col px-6 pb-4 font-medium text-base bg-blue-950 space-y-2">
      <?php foreach ($navItems as $item): ?>
        <a href="<?php echo $item[
          "href"
        ]; ?>" class="block py-2 rounded hover:bg-blue-800">
          <?php echo $item["label"]; ?>
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
