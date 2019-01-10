<h1>The Home page</h1>
<h2>oh yeh!</h2>
<?php


  // $w = stream_get_wrappers();
  // echo 'openssl: ',  extension_loaded  ('openssl') ? 'yes':'no', "\n";
  // echo 'http wrapper: ', in_array('http', $w) ? 'yes':'no', "\n";
  // echo 'https wrapper: ', in_array('https', $w) ? 'yes':'no', "\n";
  // echo 'wrappers: ', var_export($w);

  $html=file_get_contents('https://www.linkedin.com/in/bill-bowrey-mbe-44332461/');
  echo $html;

?>