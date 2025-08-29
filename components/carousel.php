<!-- carousel.php -->
<?php
$folder = "assets/carousel/";
$files = glob("{$folder}*.{jpg,jpeg,png,webp}", GLOB_BRACE);
?>

<div class="c">
  <div class="w-[98vw]">
    <?php if (empty($files)): ?>
      <div class="aspect-[16/7] bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center">
        <p class="text-red-600 font-medium">No carousel images found!</p>
      </div>
    <?php else: ?>
      <div id="carousel" class="relative w-full aspect-[16/7] md:rounded-3xl rounded-sm shadow-2xl overflow-hidden group">
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
