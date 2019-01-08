<h1>Hello Cloudreach!</h1>
<h4>Attempting MySQL connection from php...</h4>
<p id="place"></p>
<?php

require '../php/query.php';

?>

<script type="text/javascript">
  const items = <?php echo $table; ?>;
  console.log(items);

  var place = document.getElementById('place');
  place.innerHTML = items;
</script>