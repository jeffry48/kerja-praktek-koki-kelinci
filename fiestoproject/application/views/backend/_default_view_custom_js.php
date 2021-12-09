<script>
  $(document).ready(function(){
    var token = "<?= get_active_session()['token'] ?>";
    // GET DATA
    $.ajax({
      url: "<?= $this->config->item('backend_server_url') ?><?= $module?>/get_single_data/",
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
        $('#label_for_<?= $structure['name'] ?>').text(response.<?= $structure['name'] ?>);
        <?php
        }
        ?>
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + ": " + thrownError);
      }
    });
  });
</script>