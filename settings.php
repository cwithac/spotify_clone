<?php

include('includes/includedFiles.php');

 ?>

<div class="entityInfo">
  <div class="centerSection">
    <div class="userInfo">
      <h1><?php echo $userLoggedIn->getFirstAndLastName(); ?></h1>
    </div>
  </div>
  <div class="buttonItems">
    <button class="button">User Info</button>
    <button class="button">Logout</button>
  </div>
</div>
