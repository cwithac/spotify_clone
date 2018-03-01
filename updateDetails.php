<?php

include('includes/includedFiles.php');

 ?>

 <div class="userDetails">
   <div class="container borderBottom">
     <h2>EMAIL</h2>
     <input type="text" class="email" name="email" placeholder="E-Mail Addres..." value="<?php echo $userLoggedIn->getEmail(); ?>">
     <span class="message"></span>
     <button class="button" onclick="updateEmail('email')">SAVE</button>
   </div>
   <div class="container">
     <h2>PASSWORD</h2>
     <input type="password" class="oldPassword" name="oldPassword" placeholder="Current Password">
     <input type="password" class="newPassword1" name="newPassword1" placeholder="New Password">
     <input type="password" class="newPassword2" name="newPassword2" placeholder="Confirm Password">
     <span class="message"></span>
     <button class="button" onclick="">SAVE</button>
   </div>
 </div>
