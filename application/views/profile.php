<nav class="navbar navbar-default">
<div class="container-fluid">
    <ul class="nav navbar-nav navbar-left">
    <li><a id="new-box" href="#">New Container</a></li>
    <li><a id="save" href="#">Save layout</a></li>
  </ul>

 <form class="navbar-form navbar-left">
        <div class="form-group">
          Adjust size
          <input type="range" id="range" value="3" min="2" max="12" step="1" class="form-control" />
        </div>
      </form>
    <ul class="nav navbar-nav navbar-right">
    <!--<li><a id="new-box" href="<?=base_url();?>profile/usage">How to use</a></li>-->
    <li><a id="new-box" href="<?=base_url();?>profile/logout">Logout</a></li>
  </ul>
</div>
</nav>


<div class="container-fluid">
    <div class="row" id="flash"></div>
    <div class="row" id="main"></div>
</div>

<script type="text/javascript" src="<?=base_url();?>vendor/jquery-ui/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?=base_url();?>js/main.js">
</script>

<script type="text/javascript">
var app = new App('<?=base_url();?>', '<?=$user->settings;?>');
</script>
