<?php
$folder = "assets/mini/";
$files = glob("{$folder}*.{jpg,jpeg,png,webp}", GLOB_BRACE);
?>

<div class="relative overflow-hidden w-full py-10">
  <div class="animate-scroll gap-x-4" id="carousel-track">
    <div class="flex shrink-0 gap-x-4" id="carousel">
      <?php foreach ($files as $img): ?>
        <div class="carousel-slide min-w-[150px] h-24 rounded-xl flex items-center justify-center text-xl font-bold px-2 bg-center bg-cover relative"
          style="background-image: url('<?php echo $img; ?>');">
          <div class="absolute inset-0 bg-gradient-to-br from-blue-900/40 via-transparent to-indigo-900/40 rounded-xl"></div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="flex shrink-0 gap-x-4" id="clone">
      <?php foreach ($files as $img): ?>
        <div class="carousel-slide min-w-[150px] h-24 rounded-xl flex items-center justify-center text-xl font-bold px-2 bg-center bg-cover relative"
          style="background-image: url('<?php echo $img; ?>');">
          <div class="absolute inset-0 bg-gradient-to-br from-blue-900/40 via-transparent to-indigo-900/40 rounded-xl"></div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="flex shrink-0 gap-x-4" id="clone">
      <?php foreach ($files as $img): ?>
        <div class="carousel-slide min-w-[150px] h-24 rounded-xl flex items-center justify-center text-xl font-bold px-2 bg-center bg-cover relative"
          style="background-image: url('<?php echo $img; ?>');">
          <div class="absolute inset-0 bg-gradient-to-br from-blue-900/40 via-transparent to-indigo-900/40 rounded-xl"></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<style>
@keyframes scroll {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-50%); } /* only move half, since we doubled */
}

.animate-scroll {
  display: flex;
  width: max-content;
  animation: scroll 40s linear infinite;
}

.carousel-slide {
  flex-shrink: 0;
}
</style>