<?php
  // Relative time - covers only Months and Years
  $utils->human_time = function( $from, $to = '' ) {
  	if ( empty( $to ) ) {
  		$to = time();
  	}
  	$diff = (int) abs( $to - $from );
  	// Months
  	if ( $diff < YEAR_IN_SECONDS && $diff >= MONTH_IN_SECONDS && $diff / MONTH_IN_SECONDS < 12 ) {
  		$months = round( $diff / MONTH_IN_SECONDS );
  		if ( $months <= 1 )
  			$months = 1;
  		$since = sprintf( _n( '%s month', '%s months', $months ), $months );
  	// Months and years
  	} else {
  		$years = floor($diff / YEAR_IN_SECONDS);
  		if ( $years <= 1 )
  			$years = 1;
  		$months = floor( $diff / MONTH_IN_SECONDS ) - (12 * $years);
  		if ( $months <= 1 )
  			$months = 1;
  		$since_months = ($diff / MONTH_IN_SECONDS > 13) ? ' e '.sprintf( _n( '%s month', '%s months', $months ), $months ) : '';
  		$since = sprintf( _n( '%s year', '%s years', $years ), $years ) . $since_months;
  	}
  	return apply_filters( 'my_human_time', $since, $diff, $from, $to );
  }
?>
