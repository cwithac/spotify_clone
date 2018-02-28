<?php

include('includes/includedFiles.php');

if(isset($_GET['term'])) {
  $term = urldecode($_GET['term']);
} else {
  $term = '';
}

 ?>

<div class="searchContainer">
  <h4>Search for an Artist, Album, or Song</h4>
  <input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="Start typing...">
</div>
