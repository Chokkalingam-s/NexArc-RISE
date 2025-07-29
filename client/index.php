<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/style.css">
	<link rel="favicon" href="./assets/images/v3.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
	<title>NexArc RISE</title>
</head>
<body>
  <!-- <script>
  setInterval(()=>{
    location.reload()
  },30000)
  </script> -->
  <?php
  $request = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

  if ($request !== "/") {
    include_once "components/Navbar.php";
  }

  $routes = [
    "/" => "pages/landing.php",
    "/about" => "pages/about.php",
    "/projects" => "pages/projects.php",
    "/contact" => "pages/contact.php",
    "/learning" => "pages/learning.php",
    "/achievements" => "pages/achievements.php",
    "/membership" => "pages/membership.php",
    "/collab" => "pages/collab.php",
  ];

  if (array_key_exists($request, $routes)) {
    require $routes[$request];
  } else {
    http_response_code(404);
    require "pages/404.php";
  }
  ?>
<?php include_once "components/footer.php"; ?>
<!-- <script>
setInterval(() => location.reload(), 30000);
</script> -->
</body>
</html>
