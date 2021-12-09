<?php
if($this->data['profile_student']['verification_date'] == '0000-00-00 00:00:00'){
?>
  <div class="row">
    <div class="col-sm-12">
        <div class="">
          <p class="font-weight-bold font-size-h5 text-primary text-center">
            <?= $this->lang->line('label_student_verification_header') ?>
          </p>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <div class='col-12 col-sm-12 bg-danger p-10'>
                <p class="text-center mb-10"> <img style="height:55px;" src="<?= base_url() ?>/images/icons/icons_warning.png"> </p>
                <p class="text-white text-center mb-10"> <?= $this->lang->line('label_student_verification_warning_1') ?> </p>
                <p class="text-white text-center mb-10"> <?= $this->lang->line('label_student_verification_warning_2') ?> </p>
                <p class="text-white text-center mb-10"> <?= $this->lang->line('label_student_verification_warning_3') ?> </p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary btn-rounded" type="submit" name="submit"><?= $this->lang->line('action_verification') ?></button>
        </div>
    </div>
  </div>
<?php } else { ?>
  <div class="row">
    <div class="col-sm-12">
      <div class="">
        <p class="font-weight-bold font-size-h5 text-primary text-center">
          <?= $this->lang->line('label_student_verified') ?>
        </p>
        <p class="font-weight-bold font-size-h5 text-primary text-center">
          <?= convert_to_readable_date($this->data['profile_student']['verification_date']) ?>
        </p>
      </div>
    </div>
  </div>
<?php }  ?>