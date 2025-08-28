<!-- carousel.php -->
<?php
$folder = "assets/carousel/";
$files = glob("{$folder}*.{jpg,jpeg,png,webp}", GLOB_BRACE);
?>

<div class="c">
  <div class="w-[98vw]">
    <?php if (empty($files)): ?>
      <div class="aspect-[16/7] rounded-3xl bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center">
        <p class="text-red-600 font-medium">No carousel images found!</p>
      </div>
    <?php else: ?>
      <div id="carousel" class="relative w-full aspect-[16/7] rounded-3xl shadow-2xl overflow-hidden group">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent z-10 pointer-events-none"></div>

        <?php foreach ($files as $i => $img): ?>
          <div class="carousel-slide absolute inset-0 w-full h-full bg-center bg-cover transition-all duration-1000 <?php echo $i ===
          0
            ? "opacity-100"
            : "opacity-0"; ?>"
               style="background-image: url('<?php echo $img; ?>');">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-900/40 via-transparent to-indigo-900/40"></div>
          </div>
        <?php endforeach; ?>

        <!-- Navigation Arrows -->
        <button onclick="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-all duration-300 opacity-0 group-hover:opacity-100">
          <svg class="w-6 h-6" fill="none" stroke="cColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg>
        </button>

        <button onclick="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-all duration-300 opacity-0 group-hover:opacity-100">
          <svg class="w-6 h-6" fill="none" stroke="cColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </button>

        <!-- Dots Indicator -->
        <div id="dots" class="flex justify-center gap-3 absolute bottom-6 left-1/2 -translate-x-1/2 z-20">
          <?php foreach ($files as $i => $_): ?>
            <button onclick="goToSlide(<?= $i ?>)" class= "w-3 h-3 rounded-full transition-all duration-300 <?php echo $i ===
0
  ? "bg-white scale-125"
  : "bg-white/50 hover:bg-white/75"; ?>"></button>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<script>
const s=document.querySelectorAll('.carousel-slide');const dots=document.querySelectorAll('.dot');let c=0;function updateCarousel(){s.forEach((sa,i)=>{sa.classList.toggle('opacity-100',i===c);sa.classList.toggle('opacity-0',i!==c)});dots.forEach((dot,i)=>{if(i===c){dot.classList.add('bg-white','scale-125');dot.classList.remove('bg-white/50')}else{dot.classList.add('bg-white/50');dot.classList.remove('bg-white','scale-125')}})}
function nextSlide(){c=(c+1)%s.length;updateCarousel()}
function prevSlide(){c=(c-1+s.length)%s.length;updateCarousel()}
function goToSlide(i){c=i;updateCarousel()}
setInterval(nextSlide,5000)</script>
