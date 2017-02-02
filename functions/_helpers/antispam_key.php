<?php
  // Generate antispam key
  $utils->antispam_key = function()
  {
    $key = substr(md5(microtime()),rand(0,26),12);
    $_SESSION["antispam"] = $key;
    return $key;
  };
?>
