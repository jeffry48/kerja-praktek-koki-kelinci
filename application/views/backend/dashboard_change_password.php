<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_password') ?> <?= $requirement_password['requirement_text'] ?></label>
                </div>
                <div class="col-sm-12">
                    <input class="js-maxlength form-control" 
                           type="password" 
                           maxlength="<?= $requirement_password['max_length'] ?>" 
                           id="password" name="password" 
                           placeholder="<?= $this->lang->line('label_password') ?>"
                           value="<?= $password ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_new_password') ?> <?= $requirement_new_password['requirement_text'] ?></label>
                </div>
                <div class="col-sm-12">
                    <input class="js-maxlength form-control" 
                           type="password" 
                           maxlength="<?= $requirement_new_password['max_length'] ?>" 
                           id="new_password" name="new_password" 
                           placeholder="<?= $this->lang->line('label_new_password') ?>"
                           value="<?= $new_password ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_retype_new_password') ?> <?= $requirement_retype_new_password['requirement_text'] ?></label>
                </div>
                <div class="col-sm-12">
                    <input class="js-maxlength form-control" 
                           type="password" 
                           maxlength="<?= $requirement_retype_new_password['max_length'] ?>" 
                           id="retype_new_password" name="retype_new_password" 
                           placeholder="<?= $this->lang->line('label_retype_new_password') ?>"
                           value="<?= $retype_new_password ?>">
                </div>
            </div>
        </div>
    </div>
</div>