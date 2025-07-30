<?php
function inline_svg($path)
{
  if (file_exists($path)) {
    return str_replace(
      "<svg",
      '<svg class="size-5 fill-current inline-block mr-2"',
      file_get_contents($path),
    );
  }
  return "<!-- Missing icon: $path -->";
} ?>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-blue-800 px-10">
  <!-- Site Info Column -->
  <div class="space-y-2">
    <h1 class="text-2xl font-semibold">NexArc RISE</h1>
    <p class="italic">Igniting innovation,<br>fostering global collaboration.</p>
  </div>

  <!-- Contact Us -->
  <div class="space-y-2">
    <h2 class="font-semibold underline underline-offset-4">Contact Us</h2>
    <div class="flex items-center gap-2">
      <?= inline_svg("assets/icons/phone-solid.svg") ?>
      <span>+81-80-4842-8090</span>
    </div>
    <div class="flex items-center gap-2">
      <?= inline_svg("assets/icons/envelope-solid.svg") ?>
      <a href="mailto:nexarcrise@gmail.com" class="underline">nexarcrise@gmail.com</a>
    </div>
  </div>

  <!-- Follow Us -->
  <div class="space-y-2">
    <h2 class="font-semibold underline underline-offset-4">Follow Us</h2>
    <div class="space-y-1">
      <a href="https://www.instagram.com/nexarc_rise/" target="_blank" class="flex items-center gap-2 hover:underline">
        <?= inline_svg("assets/icons/instagram-brands.svg") ?>
        Instagram
      </a>
      <a href="https://www.linkedin.com/company/nexarc-rise/" target="_blank" class="flex items-center gap-2 hover:underline">
        <?= inline_svg(
          "assets/icons/linkedin-brands-solid.svg",
        ) ?>
        LinkedIn
      </a>
      <a href="https://whatsapp.com/channel/0029Vb6nSRJCcW4oxI2qbA0Y" target="_blank" class="flex items-center gap-2 hover:underline">
        <?= inline_svg("assets/icons/whatsapp.svg") ?>
        Whatsapp
      </a>
    </div>
  </div>

  <!-- Quick Links -->
  <div class="space-y-2">
    <h2 class="font-semibold underline underline-offset-4">Quick Links</h2>
    <ul class="space-y-1">
      <li><a href="/privacy-policy" class="hover:underline">Privacy Policy</a></li>
      <li><a href="/terms-of-service" class="hover:underline">Terms of Service</a></li>
      <li><a href="/contact" class="hover:underline">Contact</a></li>
    </ul>
  </div>
</div>
