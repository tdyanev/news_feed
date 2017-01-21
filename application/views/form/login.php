<?php if (isset($errors) AND $errors): ?>

<div class="alert alert-danger" role="alert">
<?=$errors;?>
</div>

<?php endif; ?>

<form class="form-horizontal" action="<?=site_url();?>login/submit" method="post">
          <div class="form-group">
            <label for="login-email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-5">
              <input type="email" name="login-email" class="form-control" id="login-email" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="login-password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-5">
              <input type="password" name="login-password" class="form-control" id="login-password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="login-remember" /> Remember me
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
              <button type="submit" class="btn btn-default">Sign in</button>
            </div>
          </div>
        </form>

