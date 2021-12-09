<div class="row">
    <div class="col-md-6 col-sm-12">
        <?php
        foreach($structures as $structure){
          if($structure['name'] == 'password')
            continue;
        ?>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-12">
                <label class="text-primary"><?= $this->lang->line('label_'.$structure['name']) ?></label>
              </div>
              <div class="col-sm-12">
                <label id="label_for_<?= $structure['name'] ?>" class="font-s14"></label>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
    </div>
</div>