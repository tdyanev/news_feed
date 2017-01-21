(function() {
  var $main   = $('#main');

  var $newBox = $('#new-box');
  var $range = $('#range');
  var size;

  function App(baseURL, size) {
    var boxSelector = '.box';

    size = size || 3;

    $newBox.on('click', function() {
      generateBox();

      return false;
    });

    $range.on('input', function() {
      var value = parseInt(this.value, 10);

      changeSize(value);
    });


    function generateBox() {
      $.ajax({
        dataType: 'html',
        url: baseURL + 'profile/get_box_view',
        success: function(html) {
          var $el;

          $main.append(html)
            .sortable();

          setupBox($main.find(boxSelector).last());
        },
      });
    }

    function setupBox($el) {
      $el.addClass('col-md-' + size);

      $el.find('select').first().on('change', function() {
        $.ajax({
          dataType: 'html',
          method: 'post',
          url: baseURL + 'profile/read',
          data: {
            url: this.value
          },
          success: function(html) {
            $el.find('.setup').hide();
            $el.find('.content').html(html);
          }
        })

      });
    }

    function populate($el, data) {
      console.log(arguments);
    }

    function changeSize(newSize) {
      $main.find(boxSelector)
        .removeClass('col-md-' + size)
        .addClass('col-md-' + newSize)

      size = newSize;
    }


  }
  /*
  function createGrid(rows, cols) {
    var html = '';
    var s = parseInt(SIZE / cols, 10);
    var el = '<div class="box col-md-' + s + '"></div>';
    var len = rows * cols;
    var i;

    for (i = 0; i < len; i++) {
      html += el;
    };

    $main.html(html);
  }

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

  window.App = App;
}());
