<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <base href="<?= rtrim(dirname($_SERVER["PHP_SELF"]), "/") ?>/">
  <link rel="stylesheet" href="style.css">
  <meta name="description" content="NexArc RISE is a nonprofit innovation hub connecting global talent to transform bold ideas into real-world impact through research, mentorship, and international collaboration.">
  <link rel="icon" href="assets/icons/v3.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" />
  <title>NexArc RISE</title>
</head>
<body>
  <div class="fixed top-0 w-full h-screen overflow-hidden pointer-events-none">
    <div class="absolute top-0 left-0 w-60 h-60 bg-blue-200/20 rounded-full blur-2xl animate-slow-bounce"></div>
    <div class="absolute top-1/3 left-1/2 w-72 h-72 bg-blue-400/20 rounded-full blur-2xl animate-slow-bounce delay-500"></div>
    <div class="absolute bottom-0 right-0 size-64 bg-blue-500/20 rounded-full blur-2xl animate-slow-bounce delay-1000"></div>
  </div>

  <style>
  @keyframes slow-bounce {
    0%, 100% {
      transform: translateY(0) scale(1);
    }
    50% {
      transform: translateY(-10px) scale(1.02);
    }
  }

  .animate-slow-bounce {
    animation: slow-bounce 12s ease-in-out infinite;
  }

  .delay-500 {
    animation-delay: 0.5s;
  }

  .delay-1000 {
    animation-delay: 1s;
  }
  </style>

  <?php
  define("ROOT", __DIR__);

  $base = rtrim(dirname($_SERVER["PHP_SELF"]), "/");
  $requestUri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
  $request =
    "/" . ltrim(str_replace($base, "", $requestUri), "/");

  if ($request !== "/") {
    include_once ROOT . "/components/navbar.php";
  }

  $routes = [
    "/" => ROOT . "/pages/landing.php",
    "/NexArc-RISE/" => ROOT . "/pages/landing.php",
    "/NexArc-RISE/about" => ROOT . "/pages/about.php",
    "/NexArc-RISE/projects" => ROOT . "/pages/projects.php",
    "/NexArc-RISE/contact" => ROOT . "/pages/contact.php",
    "/NexArc-RISE/learning" => ROOT . "/pages/learning.php",
    "/NexArc-RISE/achievements" => ROOT . "/pages/achievements.php",
    "/NexArc-RISE/membership" => ROOT . "/pages/membership.php",
    "/NexArc-RISE/collab" => ROOT . "/pages/collab.php",
  ];

  if (array_key_exists($request, $routes)) {
    require $routes[$request];
  } else {
    http_response_code(404);
    require ROOT . "/pages/404.php";
  }

  include_once ROOT . "/components/footer.php";
  ?>
</body>
</html>
