<script>
  $(document).ready(function(){
    var token = "<?= get_active_session()['token'] ?>";
    // GET DATA
    $.ajax({
      url: "<?= $this->config->item('backend_server_url') ?>user/get_profile_by_username/<?= get_active_session()['username'] ?>",
      type: "GET",
      headers: {"Authorization": token},
      crossOrigin: true,
      success:function(response){
        response = JSON.parse(response);
        $('#name').val(response.data.name);
        $('#address').val(response.data.address);
        $('#phone').val(response.data.phone);
        $('#email').val(response.data.email);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + ": " + thrownError);
      }
    });

    // POST DATA
    $("#container_form").submit(function(e){
      e.preventDefault();
      $('.alert').remove();

      var name = $("#name").val().trim();
      var address = $("#address").val().trim();
      var phone = $("#phone").val().trim();
      var email = $("#email").val().trim();
      var username = "<?= get_active_session()['username'] ?>";

      $.ajax({
        url: "<?= $this->config->item('backend_server_url') ?>user/update_profile",
        type: "POST",
        headers: {"Authorization": token},
        data:{
          name:name,
          address:address,
          phone:phone,
          email:email,
          username:username,
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