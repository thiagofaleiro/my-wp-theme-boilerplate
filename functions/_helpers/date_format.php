<?php
  $utils->date_format = function($date, $date_format = '%b %Y', $lang = 'pt_BR')
  {
    setlocale(LC_TIME, $lang);
    $date = strftime($date_format, strtotime($date));
    $date = mb_detect_encoding($date, 'UTF-8') ? $date : utf8_encode( $date );
    return $date;
  }
?>
