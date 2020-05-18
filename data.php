<?php

  // Get the Forbes List

  $year = date("Y");
  $uri = 'https://www.forbes.com/ajax/list/data?year=' . $year . '&uri=billionaires&type=person';
  $context = stream_context_create(
    array(
      'http' => array(
        'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',
      ),
  ));
  // die($uri);
  $data = file_get_contents( $uri, false, $context );

  $handle = fopen( 'dist/data/forbes.json', 'w' );
  fwrite( $handle, $data );
  fclose( $handle );

  // Get the currency conversion data

  $data = file_get_contents( 'https://api.exchangeratesapi.io/latest?base=USD&symbols=CAD,USD,GBP,AUD,EUR' );


  $handle = fopen( 'dist/data/currency.json', 'w' );
  fwrite( $handle, $data );
  fclose( $handle );