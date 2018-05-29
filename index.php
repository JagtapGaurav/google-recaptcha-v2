<script src='https://www.google.com/recaptcha/api.js'></script>

   <form action="mail/test.php" method="post" >
         <input name="name" type="text" value="<?php '$name' ?>" />
         <div class="g-recaptcha" data-sitekey="--------site key -------"></div>
         <input type="submit" name="subbtn"  />
   </form>