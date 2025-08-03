<main class="relative top-16">
  <?php
  include_once __DIR__ . "/../components/navbar.php";
  include_once __DIR__ . "/../components/about.php";
  include_once __DIR__ . "/../components/carousel.php";
  include_once __DIR__ . "/../components/tiny.php";
  ?>

<!-- ongoing projects -->
<section class="p-8 text-blue-800">
  <div class="flex justify-between items-center mb-4">
    <h2>Ongoing Projects</h2>
    <a href="/projects" class="line">View More</a>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 relative">
    <?php for ($i = 1; $i <= 3; $i++): ?>
      <div class="p-2 rounded-xl shadow-lg bg-cover bg-center h-52 relative" style="background-image: url('https://placehold.co/300');"><span class="absolute bottom-2 right-2 font-medium">
      Project <?= $i ?>
      </span>
      </div>
    <?php endfor; ?>
  </div>
</section>

<!-- Completed Projects -->
<section class="p-8 mb-10 text-blue-800">
  <div class="flex justify-between items-center mb-4">
    <h2>Completed Projects</h2>
    <a href="/projects" class="line">View More</a>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php for ($i = 1; $i <= 3; $i++): ?>
    <div class="p-2 rounded-xl shadow-lg bg-cover bg-center h-52 relative" style="background-image: url('https://placehold.co/300');"><span class="absolute bottom-2 right-2 font-medium">
    Project <?= $i ?>
    </span>
    </div>
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
