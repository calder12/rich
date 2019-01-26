<?php

  // Get the Forbes List
  $data = file_get_contents( 'https://www.forbes.com/ajax/list/data?year=2018&uri=billionaires&type=person' );

  $handle = fopen( 'dist/data/forbes.json', 'w' );
  fwrite( $handle, $data );
  fclose( $handle );

  // Get the currency conversion data

  $data = file_get_contents( 'https://api.exchangeratesapi.io/latest?base=USD&symbols=CAD,USD,GBP,AUD,EUR' );

  $handle = fopen( 'dist/data/currency.json', 'w' );
  fwrite( $handle, $data );
  fclose( $handle );