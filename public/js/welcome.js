$(function() {
  var $showTabsButton = $('#show-tabs');
  var activeClassName = 'active';
  var $tabs           = $('#tabs');
  var $regButton      = $tabs.find('#reg-form');
  var $loginButton    = $tabs.find('#login-form');
  var $register       = $tabs.find('#register');
  var $login          = $tabs.find('#login');

  $showTabsButton.on('click', function() {
    $tabs.slideDown();

    return false;
  });

  $loginButton.on('click', function() {
    $register.hide();
    $login.show();
    toggleClasses();

    return false;
  });

  $regButton.on('click', function() {
    $register.show();
    $login.hide();
    toggleClasses();

    return false;
  });

  function toggleClasses() {
    $regButton.toggleClass(activeClassName);
    $loginButton.toggleClass(activeClassName);
  }



  // Handler for .ready() called.
});
