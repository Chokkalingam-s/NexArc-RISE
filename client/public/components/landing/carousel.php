  <?php
  $folder = "assets/carousel/";
  $files = glob("{$folder}*.{jpg,jpeg,png,webp}", GLOB_BRACE);
  ?>

  <?php if (empty($files)): ?>
    <p class="text-red-500">No carousel images found!</p>
  <?php endif; ?>

  <div id="carousel" class="relative w-full h-[70vh] rounded-xl shadow-xl overflow-hidden">
    <div class="absolute inset-0 bg-black/20 rounded-xl z-10"></div>
    <?php foreach ($files as $i => $img): ?>
      <div class="carousel-slide absolute inset-0 w-full h-full bg-center bg-cover transition-opacity duration-1000 <?php echo $i ===
      0
        ? "opacity-100 pointer-events-auto"
        : "opacity-0 pointer-events-none"; ?>"
           style="background-image: url('<?php echo $img; ?>');">
      </div>
    <?php endforeach; ?>

    <div id="dots" class="flex justify-center gap-2 absolute bottom-2 left-1/2 -translate-x-1/2 rounded-full backdrop-blur-sm border-amber-400/20 p-1 border-2 z-20">
      <?php foreach ($files as $i => $_): ?>
        <span class="dot w-2 h-2 rounded-full <?php echo $i === 0
          ? "border-2 border-amber-400"
          : "bg-amber-400"; ?>"></span>
      <?php endforeach; ?>
    </div>
  </div>

  <script>
  const slides = document.querySelectorAll('.carousel-slide');
  const dots = document.querySelectorAll('.dot');
  let current = 0;

  function updateCarousel() {
    slides.forEach((s, i) => {
      s.classList.toggle('opacity-100', i === current);
      s.classList.toggle('opacity-0', i !== current);
    });
    dots.forEach((d, i) => {
      d.classList.toggle('border-2', i === current);
      d.classList.toggle('border-amber-400', i === current);
      d.classList.toggle('bg-amber-400', i !== current);
    });
  }

  setInterval(() => {
    current = (current + 1) % slides.length;
    updateCarousel();
  }, 5000);
</script>
