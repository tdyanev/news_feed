(function() {
  var $main   = $('#main');
  var $save   = $('#save');
  var $newBox = $('#new-box');
  var $range = $('#range');
  var $flash = $('#flash');
  var size = 3;

  function parallel(fns, done) {
    var len = fns.length;
    var left = len;
    var i;

    function iterDown() {
      if (--left <= 0) {
        done();
      }
    }

    for (i = 0; i < len; i++) {
      fns[i](iterDown);
    }

  }

  function App(baseURL, savedStatus) {
    var boxSelector = '.box';

    if (!!savedStatus) {
      restoreSettings(savedStatus, setup);
    } else {
      setup();
    }

    function restoreSettings(savedStatus, done) {
      var data = JSON.parse(savedStatus);

      function prepareBlocks() {
        var len = data.ids.length;
        var fns = [];
        var i;

        for (i = 0; i < len; i++) {
          fns[i] = function(done) {
            generateBox(done);
          };
        }

        return fns;
      }

      function prepareSources() {
        var $boxes = $(boxSelector);
        var len = data.ids.length;
        var fns = [];
        var j = 0;
        var i;

        for (i = 0; i < len; i++) {
          console.log(i);
          fns[i] = function(done) {
            loadSource($boxes.eq(j), data.ids[j], done);
            j++;
          };
        }

        return fns;
      }

      $range.val(data.size);
      setSize(data.size);

      parallel(prepareBlocks(), function() {
        parallel(prepareSources(), done);
      });


    }

    function setup() {
      $newBox.on('click', function() {
        generateBox();

        return false;
      });

      $save.on('click', function() {
        var $boxes = $(boxSelector);
        var settings = {
          size : size,
          ids  : [],
        };

        $boxes.each(function(i, box) {
          var id = parseInt($(box).data('source_id'));

          if (id) {
            settings.ids.push(id);
          }
        });

        $.ajax({
          dataType: 'html',
          method: 'post',
          url: baseURL + 'profile/save',
          data: {
            settings: JSON.stringify(settings),
          },
          success: function(html) {
            $flash.hide().fadeIn('slow').html(html);
          }
        });
      });


      $range.on('input', function() {
        var value = parseInt(this.value, 10);

        setSize(value);
      });

    }


    function generateBox(done) {
      $.ajax({
        dataType: 'html',
        url: baseURL + 'profile/get_box_view',
        success: function(html) {
          var $el;

          $main.append(html)
            .sortable();

          setupBox($main.find(boxSelector).last());
          (done || function() {})();
        },
      });
    }

    function setupBox($el) {
      $el.addClass('col-md-' + size);

      $el.find('select').first().on('change', function() {
        loadSource($el, this.value);
      });
    }

    function loadSource($el, value, done) {
      var $loading = $el.find('.loading').first();

      $el.find('.setup').hide();
      $loading.show();

      $.ajax({
        dataType: 'html',
        method: 'post',
        url: baseURL + 'profile/read',
        data: {
          id: value
        },
        success: function(html) {
          //setTimeout(function() {
          $loading.hide();
          $el.find('.content').html(html);
          $el.data('source_id', value);

          $el.find('.reload').click(function() {
            loadSource($el, value);

            return false;
          });

          $el.find('.dismiss .close').click(function() {
            $el.remove();
          });

          (done || function() {})();

          //}, 2000);
        }
      });

    }

    function populate($el, data) {
      console.log(arguments);
    }

    function setSize(newSize) {
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
