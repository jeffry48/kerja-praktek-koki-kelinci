<script>
  $(document).ready(function(){
    document.getElementById("container_form").reset();

    $("#container_form")[0].reset();
    $("#container_form").submit(function(e){
      e.preventDefault();
      $('.alert').remove();

      var password = $("#password").val().trim();
      var new_password = $("#new_password").val().trim();
      var retype_new_password = $("#retype_new_password").val().trim();
      var token = "<?= get_active_session()['token'] ?>";
      var username = "<?= get_active_session()['username'] ?>";
      $("#container_form")[0].reset();

      if( password != "" && new_password != "" && retype_new_password != ''){
        $.ajax({
          url: "<?= $this->config->item('backend_server_url') ?>user/change_password",
          type: "POST",
          headers: {"Authorization": token},
          data:{
            old_password:password,
            new_password:new_password,
            retype_password:retype_new_password,
            auth_username:username,
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
      }
    });
  });
</script>