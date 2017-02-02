<?php
  // Text cut - used to reduce custom excerpt for certain limited text spaces of the interface (posts introduction texts)

  // Helper method to get chunks of arrays
  function chunk_arr($arr, $join_separator, $max){
    return join($join_separator, array_slice($arr, 0, $max));
  }

  // Parameters:
  // $text        - the post excerpt
  // $max         - (number) countable
  // $piece_type  - (string) accepts 'words' or 'chars' - defines what will be counted
  // $sufix	      - (string) text to be added to the end of the returned text
  $utils->text_cut = function($text, $max = 55, $piece_type = "words", $sufix = "...")
  {
    // Removing wordpress default sufix
  	$text = str_replace('[...]', '', $text);

  	if ($piece_type == "words" || !$piece_type || empty($piece_type))
  	{
  		$words = split(" ", $text);
      $text  = chunk_arr($words, " ", $max);
  	}
  	else if ($piece_type == "chars")
  	{
      $letters = str_split($text);
      $text    = chunk_arr($letters, "", $max);
  	}

  	$text .= ($text != '') ? $sufix : '';
    return $text;
  }
?>
