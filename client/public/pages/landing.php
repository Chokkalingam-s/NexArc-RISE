<main class="relative top-16">

  <?php
  include_once "components/navbar.php";
  include_once "components/landing/about.php";
  include_once "components/landing/carousel.php";
  include_once "components/landing/tiny.php";
  ?>

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
