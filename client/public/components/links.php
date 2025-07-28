<?php
function inline_svg($path, $classes = "")
{
  if (file_exists($path)) {
    return str_replace(
      "<svg",
      "<svg class=\"$classes\"",
      file_get_contents($path),
    );
  }
  return "<!-- Missing icon: $path -->";
} ?>

<div class="contact">
  <div>
    <h2 class="line">Contact Us</h2>
    <div class="flex items-center gap-2">
      <?= inline_svg(
        "assets/images/phone-solid.svg",
        "w-4 h-4 fill-current text-white",
      ) ?>
      <span>+81-80-4842-8090</span>
    </div>
    <div class="flex items-center gap-2">
      <?= inline_svg(
        "assets/images/envelope-solid.svg",
        "w-4 h-4 fill-current text-white",
      ) ?>
      <a href="mailto:nexarcrise@gmail.com">nexarcrise@gmail.com</a>
    </div>
  </div>

  <div>
    <h2 class="line">Follow Us</h2>
    <div class="space-y-4">
      <a href="https://www.instagram.com/nexarc_rise/" target="_blank" class="flex items-center gap-2">
        <?= inline_svg(
          "assets/images/instagram-brands.svg",
          "w-4 h-4 fill-current text-pink-500",
        ) ?>
        Instagram
      </a>
      <a href="https://www.linkedin.com/company/nexarc-rise/" target="_blank" class="flex items-center gap-2">
        <?= inline_svg(
          "assets/images/linkedin-brands-solid.svg",
          "w-4 h-4 fill-current text-blue-400",
        ) ?>
        LinkedIn
      </a>
    </div>
  </div>

  <div>
    <h2 class="line">Quick Links</h2>
    <ul class="space-y-4">
      <li><a href="/privacy-policy">Privacy Policy</a></li>
      <li><a href="/terms-of-service">Terms of Service</a></li>
      <li><a href="/contact">Contact</a></li>
    </ul>
  </div>
</div>
