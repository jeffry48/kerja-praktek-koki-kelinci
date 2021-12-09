<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_name') ?></label>
                </div>
                <div class="col-sm-12">
                    <label class="font-s14"><?= $user_webmember['name'] ?></label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_address') ?></label>
                </div>
                <div class="col-sm-12">
                    <label class="font-s14"><?= $user_webmember['address'] ?></label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_phone') ?></label>
                </div>
                <div class="col-sm-12">
                    <label class="font-s14"><?= $user_webmember['phone'] ?></label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_email') ?></label>
                </div>
                <div class="col-sm-12">
                    <label class="font-s14"><?= $user_webmember['email'] ?></label>
                </div>
            </div>
        </div>
        <?php
        if ($user_webmember['birthdate'] == $this->config->item('default_blank_date')) {
            $birthdate = "";
        } else {
            $birthdate = inv_date_format_view($user_webmember['birthdate']);
        }
        ?>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_birthdate') ?></label>
                </div>
                <div class="col-sm-12">
                    <label class="font-s14"><?= $birthdate ?></label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_username') ?></label>
                </div>
                <div class="col-sm-12">
                    <label class="font-s14"><?= $user_webmember['username'] ?></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_role') ?></label>
                </div>
                <div class="col-sm-12">
                    <label class="font-s14"><?= $user_webmember['role_name'] ?></label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_notes') ?></label>
                </div>
                <div class="col-sm-12">
                    <label class="font-s14"><?= $user_webmember['notes'] ?></label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_photo') ?></label>
                </div>
                <?php
                if (!isset($user_webmember['photo'])) {
                    $photo = "";
                } else {
                    $photo = $user_webmember['photo'];
                }
                $image_path = $this->config->item('default_' . $module . '_image_url') . $photo;
                $image_realpath = realpath($image_path);
                $default_image = base_url() . $image_path;
                if (!is_file($image_realpath)) {
                    $default_image = base_url() . 'images/noimage_small.png';
                }
                ?>
                <img class="img-fluid" 
                     id="photo_preview" 
                     src="<?= $default_image ?>?<?= inv_get_current_datetime_stamp_no_miliseconds() ?>" alt="<?= $default_image ?>" />
            </div>
        </div>
    </div>
</div>