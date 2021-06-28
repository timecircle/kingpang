function md_hide(md) {
  $(md).modal("hide");
}

function share(url) {
  pre = window.top.document.getElementById("__url").value;
  window.top.location.href = pre + "#bot:share?by=" + url;
}

function if_src(src) {
  $("#if-content").html('<iframe loading="lazy" id="open" src="' + src + '"  class="h-100 w-100"></iframe>');

  $("#modal-if").modal({
    backdrop: 'static',
    show: true,
    focus: true,
  });

}


function modal_src(id, src) {
  $("#" + id + " .modal-dialog").html('<iframe loading="lazy" id="open" src="' + src + '"  class="h-100 w-100"></iframe>');

  $("#" + id).modal({
    backdrop: 'static',
    show: true,
    focus: true,
  });

}

function temp(id) {
  const inp = document.querySelector('#' + id + ' input[type=file]');
  const preview = document.querySelector('#' + id + ' img');
  const btn = document.querySelector('#' + id + ' button');
  const src = preview.src;
  inp.addEventListener('change', (event) => {
    var file = inp.files[0];
    var reader = new FileReader();
    reader.addEventListener("load", function () {
      preview.src = reader.result;
    }, false);
    if (file) {
      reader.readAsDataURL(file);
      btn.style.display = 'block';
    }
  });
  btn.addEventListener('click', (event) => {
    btn.style.display = 'none';
    preview.src = src;
    inp.value = null;

  });
}

function avatarChange(id) {
  const input = document.querySelector('#' + id + ' input[type=file]');
  const preview = document.querySelector('#' + id + ' img');
  const btn = document.querySelector('#' + id + ' button');
  const src = preview.src;
  $('#' + id + ' button').hide();
  $('#' + id + ' input[type=file]').change(function () {
    var file = input.files[0];
    var reader = new FileReader();
    reader.addEventListener("load", function () {
      preview.src = reader.result;
    }, false);
    if (file) {
      reader.readAsDataURL(file);
      $('#' + id + ' button').show();
    }
    else {
      $('#' + id + ' button').hide();
    }
  });

  $('#' + id + ' button').click(function () {
    preview.src = src;
    input.value = null;
    $('#' + id + ' button').hide();
  });
}


function mediaMany(id) {
  const input = document.querySelector('#' + id + ' input[type=file]');
  $('#' + id + ' button').hide();
  $('#' + id + ' input[type=file]').change(function () {
    var files = input.files;
    if (input.value) {
      $('#' + id + ' button').show();
    } else {
      $('#' + id + ' button').hide();
    }

    $('#' + id + ' .preview').empty();
    Array.from(input.files).forEach(
      function (file) {
        var reader = new FileReader();

        reader.addEventListener("load", function () {
          $('#' + id + ' .preview').append('<img style="width:48px;border : 1px solid #e2e8f0" class="mr-1" src="' + reader.result + '" />');
        }, false);

        if (file) {
          reader.readAsDataURL(file);
        }
      }
    );


  });

  $('#' + id + ' button').click(function () {
    $('#' + id + ' .preview').empty();
    input.value = null;
    $('#' + id + ' button').hide();
  });
}

function inputArray(id, name) {

  $('#' + id).keypress(function (event) {
    if (event.keyCode == 13) {
      $('#' + id + ' .add').click();
      return false;

    }
  });
  $('#' + id + ' .add').click(function () {

    var key = $('#' + id + ' .key').val();
    var val = $('#' + id + ' .value').val();
    if (key) {
      var add = '<div class="row mt-1">'
        + '<div class="col-xs-5"><input type="text" name="' + name + '_key[]" value="' + key + '" class="form-control input-sm"/></div>'
        + '<div class="col-xs-7"><div class="input-group"><input type="text" name="' + name + '_val[]" value="' + val + '" class="form-control input-sm"/><span class="input-group-btn">'
        + '<button type="button" onClick="$(this).parent().parent().parent().parent().remove()" class="btn btn-sm btn-danger"> <i class="ft ft-x"></i> </button>'
        + '</span></div></div></div>';

      $('#' + id + ' .preview').append(add);
      $('#' + id + ' .key').val('');
      $('#' + id + ' .value').val('');
      $('#' + id + ' .key').focus();
    }
  });
}

function choice(choice, owner) {
  $(owner).val(choice);
}
