<?php if (isset($errors) AND $errors): ?>

<div class="alert alert-danger" role="alert">
<?=$errors;?>
</div>

<?php endif; ?>

<form class="form-horizontal" action="<?=site_url();?>register/submit" method="post">
  <div class="form-group">
    <label for="reg-email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-5">
    <input type="email" class="form-control" id="reg-email" name="reg-email" placeholder="must be a valid email adress" value="<?=set_value('reg-email');?>" />
    </div>
  </div>
  <div class="form-group">
    <label for="reg-password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="reg-password" name="reg-password" placeholder="between 8 & 30 characters">
    </div>
  </div>
  <div class="form-group">
    <label for="reg-passconf" class="col-sm-2 control-label">Confirm Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="reg-passconf" name="reg-passconf" placeholder="must match the password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-5">
      <button type="submit" class="btn btn-default">Register</button>
    </div>
  </div>
</form>
