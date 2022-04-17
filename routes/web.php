<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::prefix('/')->group(function(){
    Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('homepage');
});*/
Route::get('/', function(){
    return redirect()->route('register');
});

Route::get('/authenticate', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginScreen'])->name('authenticate');
Route::post('/authenticate', [App\Http\Controllers\Auth\LoginController::class, 'loginAdmin']);

Auth::routes();
Route::post('/e-registration', [App\Http\Controllers\Auth\RegisterController::class, 'eRegistration'])->name('e-registration');
Route::get('/e-registration/{token}', [App\Http\Controllers\Auth\RegisterController::class, 'verifyERegistration'])->name('verify-e-registration');
Route::post('/register/subscriber', [App\Http\Controllers\Auth\RegisterController::class, 'registerSubscriber'])->name('register-subscriber');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*
 * Human Resource Routes
 */
Route::prefix('/human-resource')->group(function (){
    Route::get('/', [App\Http\Controllers\HumanResourceController::class, 'index'])->name('all-employees');
    Route::get('/add-new-employee', [App\Http\Controllers\HumanResourceController::class, 'showNewEmployeeForm'])->name('add-new-employee');
    Route::post('/add-new-employee', [App\Http\Controllers\HumanResourceController::class, 'storeNewEmployee']);
    Route::get('/employee/profile/{slug}', [App\Http\Controllers\HumanResourceController::class, 'viewEmployeeProfile'])->name('view-employee-profile');
    Route::get('/manage-permissions', [App\Http\Controllers\HumanResourceController::class, 'managePermissions'])->name('manage-permissions');
    Route::post('/create-permission', [App\Http\Controllers\HumanResourceController::class, 'createPermission'])->name('create-permission');

    #Recruitment routes
    Route::get('/post-job', [App\Http\Controllers\RecruitmentController::class, 'showPostJobForm'])->name('post-job');
    Route::post('/post-job', [App\Http\Controllers\RecruitmentController::class, 'postJob']);
    Route::get('/all-jobs', [App\Http\Controllers\RecruitmentController::class, 'index'])->name('all-jobs');
    Route::get('/view-job/{slug}', [App\Http\Controllers\RecruitmentController::class, 'viewJob'])->name('view-job');
    Route::get('/edit-job/{slug}', [App\Http\Controllers\RecruitmentController::class, 'showEditJobForm'])->name('edit-job');
    Route::post('/update-job', [App\Http\Controllers\RecruitmentController::class, 'updateJob'])->name('update-job');

    #Settings
    Route::get('/settings', [App\Http\Controllers\HumanResourceController::class, 'showHumanResourceSettings'])->name('human-resource-settings');
    Route::post('/department', [App\Http\Controllers\HumanResourceController::class, 'storeDepartment'])->name('add-new-department');
    Route::post('/update-department', [App\Http\Controllers\HumanResourceController::class, 'updateDepartment'])->name('update-department');
    Route::post('/add-new-job-role', [App\Http\Controllers\HumanResourceController::class, 'storeJobRole'])->name('add-new-job-role');
    Route::post('/update-job-role', [App\Http\Controllers\HumanResourceController::class, 'updateJobRole'])->name('update-job-role');
    Route::post('/assign-section-head', [App\Http\Controllers\HumanResourceController::class, 'assignSectionHead'])->name('assign-section-head');
});

Route::prefix('/admin-dashboard')->group(function(){
    Route::get('/',[App\Http\Controllers\NewsfeedController::class, 'index'])->name('admin-dashboard');
});

Route::prefix('/account')->group(function(){
    Route::post('/change-password',[App\Http\Controllers\UserController::class, 'changePassword'])->name('change-password');
    Route::post('/add-emergency-contact',[App\Http\Controllers\UserController::class, 'addNewEmergencyContact'])->name('add-emergency-contact');
});

Route::prefix('/publications')->group(function(){
    Route::get('/manage-publications', [App\Http\Controllers\PublicationController::class, 'managePublications'])->name('manage-publications');
    Route::get('/manage-publication-categories', [App\Http\Controllers\PublicationController::class, 'managePublicationCategories'])->name('manage-publication-categories');
    Route::post('/manage-publication-categories', [App\Http\Controllers\PublicationController::class, 'storePublicationCategory']);
    Route::post('/update-publication-category', [App\Http\Controllers\PublicationController::class, 'updatePublicationCategory'])->name('update-publication-category');
});

Route::prefix('/file-management')->group(function(){
    Route::get('/', [App\Http\Controllers\FileManagementController::class, 'manageFiles'])->name('manage-files');
    Route::post('/manage-files', [App\Http\Controllers\FileManagementController::class, 'storeFiles'] )->name('upload-files');
    Route::post('/create-folder', [App\Http\Controllers\FileManagementController::class, 'createFolder'] )->name('create-folder');
    Route::get('/folder/{slug}', [App\Http\Controllers\FileManagementController::class, 'openFolder'] )->name('open-folder');
    Route::get('/download/{slug}', [App\Http\Controllers\FileManagementController::class, 'downloadAttachment'] )->name('download-attachment');
    Route::post('/delete-file', [App\Http\Controllers\FileManagementController::class, 'deleteAttachment'])->name('delete-file');
    Route::post('/delete-folder', [App\Http\Controllers\FileManagementController::class, 'deleteFolder'])->name('delete-folder');
});

Route::prefix('/bulk-sms')->group(function(){
    Route::get('/phone-group',[App\Http\Controllers\SMSController::class, 'showPhoneGroupForm'])->name('phone-group');
    Route::post('/phone-group',[App\Http\Controllers\SMSController::class, 'setNewPhoneGroup']);
    Route::get('/top-up',[App\Http\Controllers\SMSController::class, 'showTopUpForm'])->name('top-up');
    Route::post('/top-up',[App\Http\Controllers\SMSController::class, 'processTopUpRequest']);
    Route::get('/compose-message',[App\Http\Controllers\SMSController::class, 'showComposeMessageForm'])->name('compose-message');
    Route::get('/preview-message',[App\Http\Controllers\SMSController::class, 'previewMessage'])->name('preview-message');
    Route::post('/send-text-message',[App\Http\Controllers\SMSController::class, 'sendTextMessage'])->name('send-text-message');
    Route::get('/bulk-messages',[App\Http\Controllers\SMSController::class, 'getBulkMessages'])->name('bulk-messages');
    Route::get('/bulk-messages/{slug}',[App\Http\Controllers\SMSController::class, 'viewBulkMessage'])->name('view-bulk-message');
    Route::post('/bulk-messages/settings/compose',[App\Http\Controllers\SMSController::class, 'appDefaultSmsSettings'])->name('app-sms-settings');
});

Route::prefix('/company')->group(function (){
    Route::get('/dashboard', [App\Http\Controllers\CompanyController::class, 'dashboard'])->name('dashboard');
    Route::get('/company-profile', [App\Http\Controllers\CompanyController::class, 'getCompanyProfile'])->name('company-profile');
    Route::post('/update-company-profile', [App\Http\Controllers\CompanyController::class, 'updateCompanyProfile'])->name('update-company-profile');

    Route::get('/licence-certificates', [App\Http\Controllers\CompanyController::class, 'licenceCertificates'])->name('licence-certificates');
    Route::get('/new-licence-application', [App\Http\Controllers\CompanyController::class, 'showNewLicenceApplicationForm'])->name('new-licence-application');
    Route::get('/preview-letter', [App\Http\Controllers\CompanyController::class, 'previewLetter'])->name('preview-letter');
    Route::post('/submit-letter', [App\Http\Controllers\CompanyController::class, 'submitLetter'])->name('submit-letter');
    Route::get('/add-new-device-equipment', [App\Http\Controllers\CompanyController::class, 'showNewEquipmentForm'])->name('add-new-device-equipment');
    Route::get('/memo/{slug}', [App\Http\Controllers\CompanyController::class, 'viewMemo'])->name('view-memo');

    Route::get('/directors', [App\Http\Controllers\CompanyController::class, 'showDirectors'])->name('show-directors');
    Route::post('/directors', [App\Http\Controllers\CompanyController::class, 'addDirector']);
    Route::post('/edit-director-record', [App\Http\Controllers\CompanyController::class, 'updateDirector'])->name('edit-director-record');

    Route::get('/contact-persons', [App\Http\Controllers\CompanyController::class, 'showContactPersons'])->name('show-contact-persons');
    Route::post('/contact-persons', [App\Http\Controllers\CompanyController::class, 'addContactPersons']);
    Route::post('/edit-person-record', [App\Http\Controllers\CompanyController::class, 'updateContactPersons'])->name('edit-person-record');

    Route::get('/radio-work-station', [App\Http\Controllers\CompanyController::class, 'showRadioWorkStation'])->name('radio-work-station');
    Route::post('/radio-work-station', [App\Http\Controllers\CompanyController::class, 'addRadioWorkStation']);
    Route::post('/edit-radio-work-station', [App\Http\Controllers\CompanyController::class, 'updateRadioWorkStation'])->name('edit-radio-work-station');
    Route::get('/edit/radio-work-station/{slug}', [App\Http\Controllers\CompanyController::class, 'viewRadioWorkStation'])->name('view-radio-work-station');

    Route::get('/view-message/{slug}', [App\Http\Controllers\CompanyController::class, 'viewMessage'])->name('view-message');
    Route::get('/view-invoice/{slug}', [App\Http\Controllers\CompanyController::class, 'viewInvoice'])->name('view-invoice');
    Route::get('/transactions', [App\Http\Controllers\CompanyController::class, 'transactions'])->name('transactions');
    Route::get('/make-payment/{slug}', [App\Http\Controllers\CompanyController::class, 'showMakePaymentForm'])->name('make-payment');
    Route::post('/transaction-payment-handler', [App\Http\Controllers\CompanyController::class, 'transactionPaymentHandler'])->name('transaction-payment-handler');
    Route::post('/verify-rrr-payment', [App\Http\Controllers\CompanyController::class, 'verifyRRRPayment'])->name('verify-rrr-payment');


    Route::get('/my-assigned-frequencies', [App\Http\Controllers\CompanyController::class, 'myAssignedFrequencies'])->name('my-assigned-frequencies');
    Route::get('/my-assigned-frequencies/{id}', [App\Http\Controllers\CompanyController::class, 'filterMyAssignedFrequencies'])->name('filter-my-assigned-frequencies');
    Route::get('/frequencies/{id}', [App\Http\Controllers\CompanyController::class, 'viewFrequency'])->name('view-frequencies');
    Route::get('/frequently-asked-questions', [App\Http\Controllers\CompanyController::class, 'showFaqs'])->name('frequently-asked-questions');
});

Route::prefix('/radio')->group(function(){
    Route::get('/all-radio-license-applications', [App\Http\Controllers\RadioLicenseController::class, 'showAllMyRadioLicenseApplications'])->name('all-radio-license-applications');
    Route::get('/new-radio-license-application', [App\Http\Controllers\RadioLicenseController::class, 'showRadioLicenseApplicationForm'])->name('new-radio-license-application');
    Route::post('/new-radio-license-application', [App\Http\Controllers\RadioLicenseController::class, 'addRadioLicenseApplication']);
    Route::get('/{slug}', [App\Http\Controllers\RadioLicenseController::class, 'showRadioLicenseApplication'])->name('view-radio-license-application');
});
Route::prefix('/workflow')->group(function(){
    Route::get('/settings', [App\Http\Controllers\WorkflowController::class, 'showWorkflowSettings'])->name('workflow-settings');
    Route::post('/settings', [App\Http\Controllers\WorkflowController::class, 'appDefaultSettings']);
    Route::get('/read-radio-license-application/{slug}', [App\Http\Controllers\WorkflowController::class, 'readRadioLicenseApplication'])->name('read-radio-license-application');
    Route::get('/', [App\Http\Controllers\WorkflowController::class, 'workflow'])->name('workflow');
    Route::post('/process-radio-license-application', [App\Http\Controllers\WorkflowController::class, 'processRadioLicenseApplication'])->name('process-radio-license-application');
    Route::get('/assign-frequency/{slug}/{invoice_slug}', [App\Http\Controllers\WorkflowController::class, 'showAssignFrequencyForm'])->name('assign-frequency');
    Route::post('/process-frequency-assignment', [App\Http\Controllers\WorkflowController::class, 'assignRadioFrequency'])->name('process-frequency-assignment');
    Route::get('/frequency-assignment', [App\Http\Controllers\WorkflowController::class, 'loadQueuedFrequencyAssignments'])->name('queued-frequency-assignment');
    Route::get('/assigned-frequencies', [App\Http\Controllers\WorkflowController::class, 'assignedFrequencies'])->name('assigned-frequencies');
    Route::get('/expired-frequencies', [App\Http\Controllers\WorkflowController::class, 'expiredFrequencies'])->name('expired-frequencies');
    Route::get('/expired-frequency/notification', [App\Http\Controllers\WorkflowController::class, 'expiredFrequencyNotification'])->name('expired-frequency-notification');
    Route::get('/frequencies/{id}', [App\Http\Controllers\WorkflowController::class, 'readFrequency'])->name('read-frequencies');

    Route::get('/transaction-report', [App\Http\Controllers\WorkflowController::class, 'showTransactionReportForm'])->name('transaction-report');
    Route::get('/generate-report', [App\Http\Controllers\WorkflowController::class, 'generateTransactionReport'])->name('generate-report');
    Route::get('/audit-trail', [App\Http\Controllers\WorkflowController::class, 'showAuditTrailForm'])->name('audit-trail');
    Route::get('/filter-audit-trail', [App\Http\Controllers\WorkflowController::class, 'auditTrail'])->name('filter-audit-trail');
    Route::post('/update-radio-status', [App\Http\Controllers\WorkflowController::class, 'updateRadioStatus'])->name('update-radio-status');
});

Route::prefix('customer-support')->group(function(){
    Route::get('/message/customer/{customer}', [App\Http\Controllers\CustomerController::class, 'showMessageCustomerForm'])->name('message-customer');
    Route::post('/message/customer/send', [App\Http\Controllers\CustomerController::class, 'messageCustomer'])->name('send-customer-message');
    Route::get('/message/customer/read/{slug}', [App\Http\Controllers\CustomerController::class, 'readMessage'])->name('read-message');
    Route::get('/messages', [App\Http\Controllers\CustomerController::class, 'messages'])->name('messages');

    Route::get('/invoice-customer/{slug}/{appSlug}', [App\Http\Controllers\CustomerController::class, 'invoiceCustomer'])->name('invoice-customer');
    Route::post('/invoice-customer', [App\Http\Controllers\CustomerController::class, 'storeNewInvoice'])->name('store-invoice');
    Route::get('/manage-transactions', [App\Http\Controllers\CustomerController::class, 'manageTransactions'])->name('manage-transactions');
    Route::get('/read-invoice/{slug}', [App\Http\Controllers\CustomerController::class, 'readInvoice'])->name('read-invoice');
    Route::post('/update-invoice-status', [App\Http\Controllers\CustomerController::class, 'updateInvoiceStatus'])->name('update-invoice-status');
    Route::get('/compose-message', [App\Http\Controllers\CustomerController::class, 'showComposeMessageForm'])->name('compose-message');
    Route::post('/notify-customer', [App\Http\Controllers\CustomerController::class, 'notifyCustomer'])->name('notify-customer');

    Route::get('/companies', [App\Http\Controllers\CustomerController::class, 'showCompanies'])->name('companies');
    Route::get('/companies/{slug}', [App\Http\Controllers\CustomerController::class, 'readCompanyProfile'])->name('read-company-profile');
    Route::get('/faqs', [App\Http\Controllers\CustomerController::class, 'showFaqs'])->name('faqs');
    Route::post('/faqs', [App\Http\Controllers\CustomerController::class, 'postFaq']);
    Route::post('/edit-faq', [App\Http\Controllers\CustomerController::class, 'editFaq'])->name('edit-faq');
});


#Paystack callback
Route::get('/process/payment', [App\Http\Controllers\PaymentController::class, 'processOnlinePayment']);



Route::post('/load-local-governments', [App\Http\Controllers\ShareResourceController::class, 'loadLocalGovernments']);
Route::post('/load-departments', [App\Http\Controllers\ShareResourceController::class, 'loadDepartments']);
Route::post('/load-job-roles', [App\Http\Controllers\ShareResourceController::class, 'loadJobRoles']);
