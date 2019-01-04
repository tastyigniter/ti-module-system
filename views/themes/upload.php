<?= form_open(current_url(),
    [
        'id' => 'upload-form',
        'role' => 'form',
        'enctype' => 'multipart/form-data',
        'method' => 'PATCH',
    ]
); ?>
<input type="hidden" name="_handler" value="onUpload">

<div class="toolbar">
    <div class="toolbar-action">
        <?= Template::getButtonList(); ?>
    </div>
</div>

<div class="form-fields">
    <div class="form-group field-section span-full">
        <h5 class="section-title"><?= lang('system::lang.themes.text_upload_title'); ?></h5>
    </div>
    <div class="form-group span-left">
        <div class="input-group">
            <input type="text" class="form-control btn-file-input-value" disabled="disabled">
            <span class="input-group-btn">
                <div class="btn btn-default btn-file-input">
                    <i class="fa fa-fw fa-folder-open"></i>&nbsp;&nbsp;
                    <span class="btn-file-input-browse"><?= lang('system::lang.themes.button_choose'); ?></span>
                    <span class="btn-file-input-change hide"><?= lang('system::lang.themes.button_change'); ?></span>
                    <input type="file"
                           name="theme_zip"
                           value="<?= set_value('theme_zip'); ?>"
                           accept="application/zip"
                           onchange="var file = this.files[0]
                            $('.btn-file-input-value').val(file.name)
                            $('.btn-file-input-change').removeClass('hide')
                            $('.btn-file-input-browse').addClass('hide')"
                    />
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-fw fa-upload">&nbsp;&nbsp;</i><?= lang('system::lang.themes.button_upload'); ?>
                </button>
            </span>
        </div>
        <?= form_error('theme_zip', '<span class="text-danger">', '</span>'); ?>
    </div>
</div>
<?= form_close(); ?>
