<!-- Modal -->
<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: 300px; margin-top: 70px; margin-left: -150px;">
  <div class="modal-header">
    <h3 id="myModalLabel">Please Login</h3>    
  </div>
  <div class="modal-body">
    <form class="form-signin" action="<?php echo site_url('Login/login');?>" method="POST">
    <input type="text" class="input-block-level" placeholder="Username" name="username" value="" required=""/>
    <input type="password" class="input-block-level" placeholder="Password" name="password" value="" required=""/>
  </div>
  <div class="modal-footer">
    <input type="submit" class="btn btn-primary" value="Log In"/> 
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>      
    </form>
  </div>
</div>