<div class="modal" id="modal-upload" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-crop-dialog" role="document">
    <div class="modal-content modal-crop-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div id="crop_box">
              <div id="photo-crop-display"> </div>
            </div>
          </div>
        </div>
        <div class="modal-footer modal-crop-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal"><?= $this->lang->line('action_cancel') ?></button>
          <button class="btn btn-primary" type="button" id="button-submit-crop"><?= $this->lang->line('action_upload') ?></button>
        </div>
    </div>
  </div>
</div>