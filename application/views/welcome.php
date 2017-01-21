<div class="container" id="welcome">
    <div class="row">
        <div class="col-md-12 jumbotron">
        <h1><?=$this->lang->line('news_portal');?></h1>

            <p><?=$this->lang->line('site_description'); ?></p>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <img class="navbar-brand" />
    </div>
  </div>
</nav>

            <p>
                <a class="btn btn-primary btn-lg" href="#" id="show-tabs">
                    <?=$this->lang->line('start_now');?>
                </a>
            </p>
        </div>
    </div>

    <div id="tabs" style="display:none;">
        <ul class="nav nav-tabs">
          <li id="reg-form" role="presentation" class="active"><a href="#">Register</a></li>
          <li id="login-form" role="presentation"><a href="#">Login</a></li>
        </ul>


        <div id="register">
            <?php $this->load->view('form/register');?>
        </div>

        <div id="login" style="display:none;">
            <?php $this->load->view('form/login');?>
        </div>


        </div>



    </div>

</div>

<script type="text/javascript" src="js/welcome.js"></script>
