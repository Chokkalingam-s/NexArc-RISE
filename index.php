<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/style.css">
  <link rel="icon" href="assets/icons/v3.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" />
  <title>NexArc RISE</title>
</head>
<body>
  <div class="fixed top-0 w-full h-screen overflow-hidden">
    <div class="absolute top-0 left-0 w-72 h-72 bg-blue-400/20 rounded-full blur-3xl animate-[blob_10s_ease-in-out_infinite] will-change-transform translate-z-0"></div>

    <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl animate-[blob_10s_ease-in-out_infinite_1s] will-change-transform translate-z-0"></div>

    <div class="absolute bottom-0 right-0 w-80 h-80 bg-blue-500/20 rounded-full blur-3xl animate-[blob_10s_ease-in-out_infinite_2s] will-change-transform translate-z-0"></div>
  </div>

  <style>
  @keyframes blob {
    0%, 100% {
      transform: translate(0px, 0px) scale(1);
    }
    33% {
      transform: translate(60px, -40px) scale(1.05);
    }
    66% {
      transform: translate(-40px, 60px) scale(0.95);
    }
  }
  </style>

  <?php
  define("ROOT", __DIR__);

  $request = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

  if ($request !== "/") {
    include_once ROOT . "/components/navbar.php";
  }

  $routes = [
    "/" => ROOT . "/pages/landing.php",
    "/about" => ROOT . "/pages/about.php",
    "/projects" => ROOT . "/pages/projects.php",
    "/contact" => ROOT . "/pages/contact.php",
    "/learning" => ROOT . "/pages/learning.php",
    "/achievements" => ROOT . "/pages/achievements.php",
    "/membership" => ROOT . "/pages/membership.php",
    "/collab" => ROOT . "/pages/collab.php",
  ];
  if (array_key_exists($request, $routes)) {
    require $routes[$request];
  } else {
    http_response_code(404);
    require ROOT . "/pages/404.php";
  }

  include_once ROOT . "/components/footer.php";
  ?>

  <!-- <script>
  setInterval(()=>{
    location.reload()
  },10000)
  </script> -->
</body>
</html>
