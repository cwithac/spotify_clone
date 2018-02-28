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
  <input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="Start typing..." onfocus="var val=this.value; this.value=''; this.value= val;">
</div>

<script type="text/javascript">
$('.searchInput').focus(); //Retains focus on search field, onfocus="this.value" ... keeps cursor at end
  $(function(){
    var timer;
    $('.searchInput').keyup(function() {
      clearTimeout(timer); //Waits until typing has stopped
      timer = setTimeout(function() {
        var val = $('.searchInput').val();
        openPage('search.php?term=' + val);
        console.log(val);
      }, 2000);
    })
  })
</script>
