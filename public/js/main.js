$(function() {
  var $main   = $('#main');
  var SIZE    = 12;
  var $newBox = $('#new-box');

  /*
  function createGrid(rows, cols) {
    var html = '';
    var s = parseInt(SIZE / cols, 10);
    var el = '<div class="box col-xs-' + s + '"></div>';
    var len = rows * cols;
    var i;

    for (i = 0; i < len; i++) {
      html += el;
    };
  
    $main.html(html);
  }
  */

  function watchNumbers() {
    var $rows = $('#rows');
    var $cols = $('#cols');

      console.log('ch');

    function _watch() {
      console.log('ch');
      createGrid(
        parseInt($rows.val(), 10),
        parseInt($cols.val(), 10)
      );
    }

    $rows.bind('keyup mouseup', _watch);
    $cols.bind('keyup mouseup', _watch);

  }

  watchNumbers();

  $newBox.on('click', function() {
    var $box = generateBox();
  
  });

  function generateBox() {
    var $el = $($.parseHTML('<div class="box col-md-4"' +
        '><div class="inner">fooo</div></div>')[0]);

    $main.append($el);

    $main.sortable().disableSelection();
    /*
    $el.resizable({
      aspectRatio: 16 / 9,
      //containment: '#main',
    });
    */
  }


});
