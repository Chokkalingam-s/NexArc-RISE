<?php
function inline_svg($path, $extraClass = "")
{
  if (file_exists($path)) {
    return str_replace(
      "<svg",
      "<svg class=\"size-5 fill-current inline-block mr-2 {$extraClass}\"",
      file_get_contents($path),
    );
  }
  return "<!-- Missing icon: {$path} -->";
}
?>
