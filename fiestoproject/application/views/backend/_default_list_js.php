<script>
  $(document).ready(function(){
    var token = "<?= get_active_session()['token'] ?>";
    var location = "<?= get_active_location() ?>";
    var num_rows = 0;
    var offset = "<?= $offset ?>";
    var search = "<?= $search == '~' ? '' : $search ?>";
    var module = "<?= $module ?>"

    // GET NUM ROWS
    $.ajax({
      url: "<?= $this->config->item('backend_server_url') ?>"+module+"/get_num_rows/",
      type: "POST",
      headers: {"Authorization": token},
      data: {
        "auth_location": location,
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
      url: "<?= $this->config->item('backend_server_url') ?>"+module+"/get_list_data/",
      type: "POST",
      headers: {"Authorization": token},
      data: {
        "auth_location": location,
        "offset": offset,
        "search": search,
      },
      crossOrigin: true,
      success:function(response){
        response = JSON.parse(response);
        response.data.forEach(function(k){
          var actionCell = "<td>" +
                              "<a href='<?= base_url() ?>"+module+"/view/id/"+k.id+"' title='<?= $this->lang->line('action_view') ?>' class='btn mb-5 btn-secondary btn-sm'> <i class='fa fa-eye'></i> </a> " +
                              "<a href='<?= base_url() ?>"+module+"/edit/id/"+k.id+"' title='<?= $this->lang->line('action_edit') ?>' class='btn mb-5 btn-secondary btn-sm'> <i class='fa fa-pencil'></i> </a> " +
                              "<a row-name='"+k.name+"' row-id='"+k.id+"' title='<?= $this->lang->line('action_delete') ?>' class='btn mb-5 btn-secondary btn-sm btn_delete'> <i class='fa fa-remove'></i> </a> " +
                           "</td>";
          var rowTable = "<tr>" +
                            <?php
                            foreach($columns as $col){
                            ?>
                              "<td>"+k.<?= $col ?>+"</td>" +
                            <?php
                            }
                            ?>
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
        url: "<?= $this->config->item('backend_server_url') ?>"+module+"/delete_data",
        type: "POST",
        headers: {"Authorization": token},
        data:{
          "auth_location": location,
          "id": delete_id,
        },
        crossOrigin: true,
        success:function(response){
          console.log(response);
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