<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_name') ?> <?= $requirement_name['requirement_text'] ?></label>
                </div>
                <div class="col-sm-12">
                    <input class="js-maxlength form-control"
                           type="text"
                           maxlength="<?= $requirement_name['max_length'] ?>"
                           id="name" name="name"
                           placeholder="<?= $this->lang->line('label_name') ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_address') ?> <?= $requirement_address['requirement_text'] ?></label>
                </div>
                <div class="col-sm-12">
                    <input class="js-maxlength form-control"
                           type="text"
                           maxlength="<?= $requirement_address['max_length'] ?>"
                           id="address" name="address"
                           placeholder="<?= $this->lang->line('label_address') ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_phone') ?> <?= $requirement_phone['requirement_text'] ?></label>
                </div>
                <div class="col-sm-12">
                    <input class="js-maxlength form-control"
                           type="text"
                           maxlength="<?= $requirement_phone['max_length'] ?>"
                           id="phone" name="phone"
                           placeholder="<?= $this->lang->line('label_phone') ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_email') ?> <?= $requirement_email['requirement_text'] ?></label>
                </div>
                <div class="col-sm-12">
                    <input class="js-maxlength form-control"
                           type="text"
                           maxlength="<?= $requirement_email['max_length'] ?>"
                           id="email" name="email"
                           placeholder="<?= $this->lang->line('label_email') ?>">
                </div>
            </div>
        </div>
    </div>
</div>
