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
  <?php
  define("ROOT", __DIR__);

  $request = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

  if ($request !== "/") {
    include_once ROOT . "/Navbar.php";
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

  include_once ROOT . "/footer.php";
  ?>

  <!-- <script>
  setInterval(()=>{
    location.reload()
  },10000)
  </script> -->
</body>
</html>
