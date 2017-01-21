<?php if ($result) : ?>

<div class="alert alert-success" role="alert">
Your account is ready!

<a href="<?=site_url();?>login">Login and enjoy</a>

</div>

<?php else : ?>

<div class="alert alert-danger" role="alert">

Something went wrong! Here's what you can do:

<ul>
    <li><a href="<?=site_url();?>register">Try again</a></li>
    <li><a href="<?=site_url();?>contact">Contact us for help</a></li>
</div>


</div>

<?php endif; ?>
