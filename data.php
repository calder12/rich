<?php
    $data = file_get_contents('https://www.forbes.com/ajax/list/data?year=2018&uri=billionaires&type=person');

    print $data;
  ?>