<?php
  // TODO: Refact this method!
  $utils->pagination = function($pages = '', $param = false, $range = 2, $prefixo = '')
  {
  	$showitems = ($range * 2)+1;

  	global $wp_query;
  	global $paged;

  	if(isset($_GET['pg']) && $param == true){
  		$paged = $_GET['pg'];
  	}

  	if(empty($paged)) $paged = 1;

  	if($pages === '')
  	{
  		$pages = $wp_query->max_num_pages;
  		if(!$pages)
  		{
  			$pages = 1;
  		}
  	}

  	function urlWithPrefix($prefixo, $pageNum){
  		if($prefixo){
  			return '?'.$prefixo.'&pg='.$pageNum;
  		} else {
  			return ($pageNum > 1) ? '?pg='.$pageNum : '.';
  		}
  	}

  	if(1 != $pages)
  	{
  	 echo "<div class=\"pagination row-spacing-10\">";

  	 if($paged > 1) {
  		if(!$param && $paged-1 == 1){
  			echo "<a href='.'>&#10094;</a>";
  		} else {
  			echo ($param) ? '<a class="arrow" href="'.urlWithPrefix($prefixo, $paged-1).'">&#10094;</a>' : '<a class="arrow" href="'.get_pagenum_link($paged - 1).'">&#10094;</a>';
  		}
  	 }

  	 for ($i=1; $i <= $pages; $i++)
  	 {
  		 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
  		 {
  			 if($param && $i == 1 && !$prefixo) {
  				echo ($paged == $i) ? "<span>".$i."</span>" : "<a href='.'>".$i."</a>";
  			 } else if($param && $i == 1 && $prefixo) {
  				echo ($paged == $i) ? "<span>".$i."</span>" : "<a href='?".$prefixo."'>".$i."</a>";
  			 } else if($param && $prefixo) {
  				echo ($paged == $i) ? "<span>".$i."</span>" : "<a href='?".$prefixo."&pg=".$i."'>".$i."</a>";
  			 } else if($param) {
  				echo ($paged == $i) ? "<span>".$i."</span>" : "<a href='?pg=".$i."'>".$i."</a>";
  			 } else {
  				echo ($paged == $i) ? "<span>".$i."</span>" : "<a href='".get_pagenum_link($i)."'>".$i."</a>";
  			 }
  		 }
  	 }

  	 if( $paged+$range+2 < $pages ) echo ($param) ? "<a href='".$prefixo."?pg=".($paged + $range + 1)."'>...</a>" : "<a href=\"".get_pagenum_link($paged + $range + 1)."\">...</a>";

  	 if( $paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages ) echo ($param) ? "<a href='".$prefixo."?pg=".($pages)."'>".$pages."</a>" : "<a href=\"".get_pagenum_link($paged + 1)."\">".$pages."</a>";

  	 if($paged < $pages){
  	 	echo ($param) ? '<a class="arrow" href="'.urlWithPrefix($prefixo, $paged+1).'">&#10095;</a>' : '<a class="arrow" href="'.get_pagenum_link($paged + 1).'">&#10095;</a>';
  	 }

  	 echo "</div>\n";
  	}
  }
?>
