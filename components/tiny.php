<?php
$folder = "assets/carousel/";
$files = glob("{$folder}*.{jpg,jpeg,png,webp}", GLOB_BRACE);
?>

<div class="relative overflow-hidden w-full py-10">
  <div class="flex animate-scroll" id="carousel-track">
    <div class="flex shrink-0 gap-x-10" id="carousel">
      <?php foreach ($files as $i => $img): ?>
        <div class="carousel-slide min-w-[150px] h-24 bg-blue-300 rounded-xl flex items-center justify-center text-xl font-bold px-2 absolute inset-0 bg-center bg-cover transition-all duration-1000 <?php echo $i ===
        0
          ? "opacity-100"
          : "opacity-0"; ?>"
          style="background-image: url('<?php echo $img; ?>');">
          <div class="absolute inset-0 bg-gradient-to-br from-blue-900/40 via-transparent to-indigo-900/40"></div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="flex shrink-0 gap-x-10" id="clone">
      <?php foreach ($files as $i => $img): ?>
        <div class="carousel-slide min-w-[150px] h-24 bg-blue-300 rounded-xl flex items-center justify-center text-xl font-bold px-2 absolute inset-0 bg-center bg-cover transition-all duration-1000 <?php echo $i ===
        0
          ? "opacity-100"
          : "opacity-0"; ?>"
          style="background-image: url('<?php echo $img; ?>');">
          <div class="absolute inset-0 bg-gradient-to-br from-blue-900/40 via-transparent to-indigo-900/40"></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<style>
@keyframes scroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

.animate-scroll {
  animation: scroll 40s linear infinite; /* Slowed down */
  width: max-content;
}
</style>
