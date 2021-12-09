<script>
  $(document).ready(function(){
    var token = "<?= get_active_session()['token'] ?>";
    var num_rows = 0;
    var offset = 1;
    var search = "<?= $search == '~' ? '' : $search ?>";
    var search_role = "<?= $search_role ?>";

    // GET DATA SEARCH ROLE OPTION
    $.ajax({
      url: "<?= $this->config->item('backend_server_url') ?>user/get_roles/",
      type: "GET",
      headers: {"Authorization": token},
      crossOrigin: true,
      success:function(response){
        response = JSON.parse(response);

        response.forEach(function(k){
          var data = {
            id: k.id,
            text: k.name
          };
          var newOption = new Option(data.text, data.id, false, false);
          $('#search_role').append(newOption).trigger('change');
          if(search_role > 0){
            $('#search_role').val(search_role).trigger('change');
          }
        });
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + ": " + thrownError);
      }
    });

    // GET NUM ROWS
    $.ajax({
      url: "<?= $this->config->item('backend_server_url') ?>user/get_num_rows/",
      type: "POST",
      headers: {"Authorization": token},
      data: {
        "auth_location": "<?= get_active_location() ?>",
      },
      crossOrigin: true,
      success:function(response){
        response = JSON.parse(response);
        num_rows = parseInt(response);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + ": " + thrownError);
      }
    });

    // GET DATA LIST DATA
    $.ajax({
      url: "<?= $this->config->item('backend_server_url') ?>user/get_list_data/",
      type: "POST",
      headers: {"Authorization": token},
      data: {
        "auth_location": "<?= get_active_location() ?>",
        "offset": offset,
        "search": search,
        "search_role": search_role,
      },
      crossOrigin: true,
      success:function(response){
        response = JSON.parse(response);
        response.data.forEach(function(k){
          var actionCell = "<td>" +
                              "<a href='<?= base_url() ?>user/view/id/"+k.id+"' title='<?= $this->lang->line('action_view') ?>' class='btn mb-5 btn-secondary btn-sm'> <i class='fa fa-eye'></i> </a> " +
                              "<a href='<?= base_url() ?>user/edit/id/"+k.id+"' title='<?= $this->lang->line('action_edit') ?>' class='btn mb-5 btn-secondary btn-sm'> <i class='fa fa-pencil'></i> </a> " +
                              "<a row-name='"+k.name+"' row-id='"+k.id+"' title='<?= $this->lang->line('action_delete') ?>' class='btn mb-5 btn-secondary btn-sm btn_delete'> <i class='fa fa-remove'></i> </a> " +
                           "</td>";
          var rowTable = "<tr>" +
                            "<td>"+k.username.toUpperCase()+"</td>" +
                            "<td>"+k.name+"</td>" +
                            "<td>"+k.role_name+"</td>" +
                             actionCell +
                         "</tr>";
          $('#stacktable tr:last').after(rowTable);
        });
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + ": " + thrownError);
      }
    });

    // POST DATA
    $(".form_delete").submit(function(e){
      e.preventDefault();
      $('.alert').remove();

      var delete_id = $("#delete_id").val().trim();

      $.ajax({
        url: "<?= $this->config->item('backend_server_url') ?>user/delete_user",
        type: "POST",
        headers: {"Authorization": token},
        data:{
          "auth_location": "<?= get_active_location() ?>",
          "delete_id": delete_id,
        },
        crossOrigin: true,
        success:function(response){
          $('#modal-delete').modal('toggle');
          response = JSON.parse(response);
          $("#stacktable").find(`[row-id='${delete_id}']`).parent().parent().remove();
          msg = "<div class='alert alert-"+response.notification+" alert-dismissable'>\n" +
              "  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>\n" +
              "  <span id='response_message'>"+response.message+"</span>\n" +
              "</div>";
          $(".block-content").prepend(msg);
        },
        error: function (xhr, ajaxOptions, thrownError) {
          console.log(xhr.status + ": " + thrownError);
          $('.alert').remove();
        }
      });
    });
  });
</script>