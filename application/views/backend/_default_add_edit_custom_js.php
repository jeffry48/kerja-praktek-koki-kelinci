<?php
if($mode == 'edit'){
?>
<script>
  $(document).ready(function(){
    var token = "<?= get_active_session()['token'] ?>";
    // GET DATA
    $.ajax({
      url: "<?= $this->config->item('backend_server_url') ?><?= $module ?>/get_single_data/",
      type: "POST",
      headers: {"Authorization": token},
      data: {
        id: "<?= $id ?>",
      },
      crossOrigin: true,
      success:function(response){
        response = JSON.parse(response);
        <?php
        foreach($structures as $structure){
        if($structure['name'] == 'password')
          continue;
        ?>
        $('#<?= $structure['name'] ?>').val(response.<?= $structure['name'] ?>);
        <?php
        }
        ?>
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + ": " + thrownError);
      }
    });

    // POST DATA
    $("#container_form").submit(function(e){
      e.preventDefault();
      $('.alert').remove();
      <?php
      foreach($structures as $structure){
      ?>
      var <?= $structure['name'] ?> = $("#<?= $structure['name'] ?>").val().trim();
      <?php
      }
      ?>
      $.ajax({
        url: "<?= $this->config->item('backend_server_url') ?><?= $module ?>/edit_data",
        type: "POST",
        headers: {"Authorization": token},
        data:{
          auth_location: "<?= get_active_location(); ?>",
          id: <?= $id; ?>,
          <?php
          foreach($structures as $structure){
          ?>
          <?= $structure['name'] ?>:<?= $structure['name'] ?> ,
          <?php
          }
          ?>
        },
        crossOrigin: true,
        success:function(response){
          response = JSON.parse(response);
          window.location='<?= base_url() ?>department/management';
        },
        error: function (xhr, ajaxOptions, thrownError) {
          console.log(xhr.status + ": " + thrownError);
          $('.alert').remove();
        }
      });
    });
  });
</script>
<?php
} else {
?>
  <script>
    $(document).ready(function(){
      var token = "<?= get_active_session()['token'] ?>";
      // POST DATA
      $("#container_form").submit(function(e){
        e.preventDefault();
        $('.alert').remove();
        <?php
        foreach($structures as $structure){
          echo "var ".$structure['name']." = $('#{$structure['name']}').val().trim(); \n";
        }
        ?>
        $("#container_form").trigger("reset");
        $.ajax({
          url: "<?= $this->config->item('backend_server_url') ?><?= $module ?>/add_data",
          type: "POST",
          headers: {"Authorization": token},
          data:{
            auth_location: "<?= get_active_location(); ?>",
            <?php
            foreach($structures as $structure){
              echo $structure['name'].":".$structure['name'].",\n";
            }
            ?>
          },
          crossOrigin: true,
          success:function(response){
            response = JSON.parse(response);
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
<?php
}
?>