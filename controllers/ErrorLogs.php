<?php namespace System\Controllers;

use AdminAuth;
use File;
use Igniter\Flame\Support\LogViewer;
use Log;
use Template;
use AdminMenu;

class ErrorLogs extends \Admin\Classes\AdminController
{
    protected $requiredPermissions = 'Admin.ErrorLogs';

    protected $logFile = 'system.';

    public function index()
    {
        AdminMenu::setContext('error_logs', 'system');

        Template::setTitle(lang('system::error_logs.text_title'));
        Template::setHeading(lang('system::error_logs.text_heading'));
        Template::setButton(lang('system::error_logs.text_clear_logs'), ['class' => 'btn btn-danger', 'data-request-form' => '#list-form', 'data-request' => 'onClearLogs']);

        LogViewer::setFile(storage_path('logs/system.log'));

        $this->vars['logs'] = LogViewer::all();
    }

    public function index_onClearLogs()
    {
        AdminAuth::restrict('Admin.ErrorLogs.Delete');

        if (File::isWritable(storage_path('logs/system.log'))) {
            File::put(storage_path('logs/system.log'), "");

            flash()->set('success', sprintf(lang('admin::default.alert_success'), 'Logs Cleared '));
        }

        return $this->redirectBack();
    }
}