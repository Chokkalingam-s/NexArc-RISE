<?php function inline_svg($path)
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

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 max-w-7xl mx-auto p-8 rounded-xl">
  <!-- Site Info Column -->
  <div class="space-y-6">
    <div class="space-y-4">
      <h1 class="text-3xl font-bold gradient-text">
        NexArc RISE
      </h1>
      <p class="leading-relaxed gradient-text">
        Igniting innovation,<br>
        fostering global collaboration.
      </p>
    </div>
    <div class="flex gap-4">
      <div class="w-12 h-1 grad_secondary rounded-full"></div>
      <div class="w-8 h-1 grad_secondary rounded-full"></div>
      <div class="w-4 h-1 grad_secondary rounded-full"></div>
    </div>
  </div>

  <!-- Contact Us -->
  <div class="space-y-6">
    <h2 class="text-xl font-bold relative gradient-text">
      Contact Us
      <div class="absolute bottom-0 left-0 w-12 h-0.5 grad_secondary mt-2"></div>
    </h2>
    <div class="space-y-4">
      <div class="flex items-center gap-3">
        <?= inline_svg("assets/icons/phone-solid.svg") ?>
        <span class="gradient-text">+81-80-4842-8090</span>
      </div>
      <div class="flex items-center gap-3">
        <?= inline_svg("assets/icons/envelope-solid.svg") ?>
        <a href="mailto:nexarcrise@gmail.com" class="hover:underline gradient-text">nexarcrise@gmail.com</a>
      </div>
    </div>
  </div>

  <!-- Follow Us -->
  <div class="space-y-6">
    <h2 class="text-xl font-bold relative gradient-text">
      Follow Us
      <div class="absolute bottom-0 left-0 w-12 h-0.5 grad_secondary mt-2"></div>
    </h2>
    <div class="space-y-3">
      <a href="https://www.instagram.com/nexarc_rise/" target="_blank"
         class="flex items-center gap-3">
           <?= inline_svg("assets/icons/instagram-brands.svg") ?>
        <span class="group-hover:underline gradient-text">Instagram</span>
      </a>
      <a href="https://www.linkedin.com/company/nexarc-rise/" target="_blank"
         class="flex items-center gap-3">
           <?= inline_svg(
             "assets/icons/linkedin-brands-solid.svg",
           ) ?>
        <span class="group-hover:underline gradient-text">LinkedIn</span>
      </a>
      <a href="https://whatsapp.com/channel/0029Vb6nSRJCcW4oxI2qbA0Y" target="_blank"
         class="flex items-center gap-3">
           <?= inline_svg("assets/icons/whatsapp.svg") ?>
        <span class="group-hover:underline gradient-text">WhatsApp</span>
      </a>
    </div>
  </div>

  <!-- Quick Links -->
  <div class="space-y-6">
    <h2 class="text-xl font-bold relative gradient-text">
      Quick Links
      <div class="absolute bottom-0 left-0 w-12 h-0.5 grad_secondary mt-2"></div>
    </h2>
    <ul class="space-y-3">
      <li>
        <a href="/privacy-policy" class="flex items-center gap-2">
          <div class="dot"></div>
          <span class="group-hover:underline gradient-text">Privacy Policy</span>
        </a>
      </li>
      <li>
        <a href="/terms-of-service" class="flex items-center gap-2">
          <div class="dot"></div>
          <span class="group-hover:underline gradient-text">Terms of Service</span>
        </a>
      </li>
      <li>
        <a href="/contact" class="flex items-center gap-2">
          <div class="dot"></div>
          <span class="group-hover:underline gradient-text">Contact</span>
        </a>
      </li>
    </ul>
  </div>
</div>
