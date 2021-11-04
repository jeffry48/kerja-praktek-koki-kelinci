<div class="modal" id="modal-info" tabindex="-1" role="dialog" aria-labelledby="modal-small" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div id="modal-info-block-header" class="block-header bg-primary-dark">
                    <h3 class="block-title" id="modal-title"></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <p id="modal-message"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-alt-secondary" type="button" data-dismiss="modal"><i class="fa fa-check"></i> <?= $this->lang->line('action_okay') ?></button>
            </div>
        </div>
    </div>
</div>