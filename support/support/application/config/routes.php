<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Support_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*Support Dashboard*/

$route['support_dashboard'] 						= $route['default_controller'].'/index';
$route['new_regsitration'] 							= $route['default_controller'].'/newRegistration';
$route['insert_new_regsitration'] 					= $route['default_controller'].'/insertNewRegiterData';
$route['update_regsitration_data'] 					= $route['default_controller'].'/updateRegiterData';
$route['delete_regsitration_data'] 					= $route['default_controller'].'/deleteRegiterData';
$route['student-details'] 							= $route['default_controller'].'/studentDetails';
$route['support-student-details']           		= $route['default_controller'].'/studentDetails';
$route['support-delete-pushed-scholarship']         = $route['default_controller'].'/supportDeletePushedNotification';
$route['support-push-scholarship/(:any)/(:any)']    = $route['default_controller'].'/pushScholarshipToStudent/$1/$2';
$route['subscription-expired-list']    				= $route['default_controller'].'/getSubscriptionExpiredList';
$route['failed-registrations']    					= $route['default_controller'].'/failedRegistration';
$route['registered-students']    					= $route['default_controller'].'/registered';
$route['registered-students/(:any)']    					= $route['default_controller'].'/registered/$1';
$route['promotional-registered-students']    		= $route['default_controller'].'/promotionRegister';
$route['push-alert-notifications']    				= $route['default_controller'].'/pushAlertNotifications';
$route['add-alert-message']    						= $route['default_controller'].'/addAlertNotifications';
$route['update-alert-message']    					= $route['default_controller'].'/updateAlertNotifications';
$route['delete-alert-message']    					= $route['default_controller'].'/deleteAlertNotifications';
$route['state-wise-registered-students']    					= $route['default_controller'].'/stateRegistered';
$route['youtube-link']    					= $route['default_controller'].'/youtube';
// $route['promotional-registered-students']    		= $route['default_controller'].'/promotionRegister';
$route['support-webinar-registration']          =  $route['default_controller'].'/supportWebinarRegInsert';
$route['most-active-referrers']          =  $route['default_controller'].'/exportFailedReferrals';
$route['active-successful-referrers']          =  $route['default_controller'].'/exportSuccessfulReferrals';
$route['export-excel/(:any)']          =  $route['default_controller'].'/createXLS/$1';
$route['renewal-logs']   							=  $route['default_controller'].'/renewalLogs';
$route['redirect-to-whatsapp'] 							= $route['default_controller'].'/redirectToWhatsApp';
$route['manual']=$route['default_controller'].'/manualregistration';
$route['add-manual-student-details']=$route['default_controller'].'/addManual';
$route['influencer-request']   							=  $route['default_controller'].'/influencerReuests';
$route['influencer-solved-request']   							=  $route['default_controller'].'/influencerReuestSolved';
$route['delete-students']   							=  $route['default_controller'].'/deleteStudents';
$route['roles']=$route['default_controller'].'/roles';
$route['insert-roles']=$route['default_controller'].'/insertRoles';
$route['update-roles']=$route['default_controller'].'/updateRoles';
$route['delete-roles']=$route['default_controller'].'/deleteRoles';
$route['access-authentication/(:any)']=$route['default_controller'].'/access/$1';


/* Webinar Controller */
$route['webinar_controller'] = 'Webinar_controller';
$route['webinar'] 											= $route['webinar_controller'].'/webinars';
$route['webinar-registrations'] 							= $route['webinar_controller'].'/webinarRegister';
$route['webinar-registrations-form'] 						= $route['webinar_controller'].'/WebinarRegistationForm';
$route['add-webinar-registration'] 							= $route['webinar_controller'].'/addWebinarRegistation';
$route['update-webinar-registration/(:any)'] 				= $route['webinar_controller'].'/updateWebinarRegistationForm/$1';
$route['delete-links/(:any)'] 								= $route['webinar_controller'].'/deleteLinks/$1';
$route['delete-webinar-registration'] 						= $route['webinar_controller'].'/deleteWebinarRegistration';
$route['update-links/(:any)'] 								= $route['webinar_controller'].'/updateLinks/$1';
$route['update-webinar-details-for-institutions/(:any)'] 	= $route['webinar_controller'].'/updateDetailsOfWebinar/$1';
$route['get-webinar-names'] 								= $route['webinar_controller'].'/getWebinarName';
$route['generate-links/(:any)'] 							= $route['webinar_controller'].'/generateLinks/$1';
$route['generate-links-for-each-institutions/(:any)'] 		= $route['webinar_controller'].'/generateLinksForEachInstitution/$1';
$route['webinar-registered-student-list']					= $route['webinar_controller'].'/webinarRegisteredStudentList';
$route['web/(:any)']=$route['webinar_controller'].'/supportWebinarRegistration/$1';

$route['renew-requests']          					=  $route['default_controller'].'/renewRequest';
$route['bank-requests']          					=  $route['default_controller'].'/bankRequest';
$route['registered-account-request']          		=  $route['default_controller'].'/registeredRequest';
$route['solved-redeem-request']          			=  $route['default_controller'].'/solvedRedeemRequest';
$route['redeem-request']   					=  $route['default_controller'].'/redeemRequest';
$route['delete-webinar-link']=$route['webinar_controller'].'/deleteWebinarLink';
$route['upload-student-data-for-certificate'] 							= $route['webinar_controller'].'/uploadStudentsData';
$route['store-certificate'] 							= $route['webinar_controller'].'/insertCertificateData';

/* Scholarship Controller */
$route['scholarship_controller'] = 'Scholarship_controller';
$route['scholarship']					=$route['scholarship_controller'].'/scholarshipPage';
$route['redirect-me-to/(:any)']					=$route['scholarship_controller'].'/redirectTo/$1';
$route['live-scholarships']				=$route['scholarship_controller'].'/liveScholarships';
$route['add-scholarship']				=$route['scholarship_controller'].'/addScholarship';
$route['scholarship-form']				=$route['scholarship_controller'].'/scholarshipForm';
$route['scholarship-list']				=$route['scholarship_controller'].'/viewScholarship';
$route['update-scholarship/(:any)']		=$route['scholarship_controller'].'/updateScholarship/$1';
$route['edit-scholarship/(:any)']		=$route['scholarship_controller'].'/editScholarship/$1';
$route['view-more-scholarship/(:any)']	=$route['scholarship_controller'].'/viewMoreScholarship/$1';
$route['get-particular-course-list']	=$route['scholarship_controller'].'/getParticularCourse';
$route['delete-scholarship']			=$route['scholarship_controller'].'/deleteScholarship';
$route['get-special-talent-list']		=$route['scholarship_controller'].'/getSpecialTalentList';
$route['scholarship-notifications']    	=$route['scholarship_controller'].'/scholarship_alert_students';
$route['add-scholarship-to-freemium-db/(:any)'] =$route['scholarship_controller'].'/addScholarshipToFreemiumDB/$1';


$route['delete-scholarship']		=$route['scholarship_controller'].'/deleteScholarship';
$route['send-scholarship/(:any)']	=$route['scholarship_controller'].'/sendScholarship/$1';
//$route['send-scholarship/(:any)']	=$route['scholarship_controller'].'/sendScholarship/$1';
$route['push-scholarship/(:any)']	=$route['scholarship_controller'].'/pushScholarship/$1';
$route['institution-scholarship']   =$route['scholarship_controller'].'/institutionScholarshipForm';
$route['add-institutional-scholarship'] =$route['scholarship_controller'].'/addInstitutionalScholarship';
$route['view-institution-scholarship-list'] =$route['scholarship_controller'].'/viewInstitutionScholarshipList';
$route['view-institute-scholarship-details/(:any)']=$route['scholarship_controller'].'/viewInstituteScholarshipDetails/$1';
$route['webiste-visiblity-status/(:any)/(:any)']= $route['scholarship_controller'].'/websiteVisibility/$1/$2';

$route['edit-institution-schloarship-details/(:any)']=$route['scholarship_controller'].'/editInstitutionSchloarshipDetails/$1';
$route['update-institutional-scholarship-details']=$route['scholarship_controller'].'/updateInstitutionScholarshipDetails';
$route['update-scholarship-document']=$route['scholarship_controller'].'/updateScholarshipDocument';
$route['permanent-delete-scholarship']		=$route['scholarship_controller'].'/deleteScholarshipPermanently';
$route['get-cities-list']			=$route['scholarship_controller'].'/getParticularCities';

$route['requested-callback-list']				=$route['default_controller'].'/getRequestedCallBackList';
$route['change-status-to-contacted/(:any)'] 	=$route['default_controller'].'/changeStatusToContacted/$1';
$route['change-status-to-not-contacted/(:any)'] =$route['default_controller'].'/changeStatusToNotContacted/$1';
$route['candidate-feedback']					=$route['default_controller'].'/getCandidateFeedback';

$route['support-login']				=$route['default_controller'].'/supportLoginPage';
$route['verify-support-login']		=$route['default_controller'].'/verifyLogin';
$route['support-logout']			=$route['default_controller'].'/sessionDestroy';
$route['support-forgot-password']	=$route['default_controller'].'/supportForgotPassword';
$route['send-reset-password-link']	=$route['default_controller'].'/supportPasswordRecovery';
$route['reset-password-link/(:any)']=$route['default_controller'].'/verifyResetPasswordLink/$1';
$route['new-password']				=$route['default_controller'].'/newPassword';

$route['support-profile-page']		=$route['default_controller'].'/profilePage';
$route['update-support-profile']	=$route['default_controller'].'/updateProfile';


$route['support-admin-login']		=$route['default_controller'].'/supportAdminLoginPage';
$route['verify-support-admin-login']	=$route['default_controller'].'/verifySupportAdminLogin';
$route['support-admin-profile']		=$route['default_controller'].'/supportAdminProfilePage';
$route['update-support-admin-profile'] =$route['default_controller'].'/updateSupportAdminProfile';
$route['support-admin-logout']		=$route['default_controller'].'/supportAdminLogout';



$route['other-details']				=$route['default_controller'].'/otherDetails';
$route['religion']					=$route['default_controller'].'/addreligionForm';
$route['insert-regligion-name']		=$route['default_controller'].'/insertRegligionName';
$route['update-religion-name']		=$route['default_controller'].'/updateReligionName';
$route['qualification']				=$route['default_controller'].'/qualificationForm';
$route['insert-qualificaiton-name']	=$route['default_controller'].'/insertQualificationName';
$route['update-qualification-name'] =$route['default_controller'].'/updateQualificationName';
$route['course']				    =$route['default_controller'].'/courseForm';
$route['insert-course-name']		=$route['default_controller'].'/insertCourseName';
$route['update-course-name']			=$route['default_controller'].'/updateCourseName';
$route['category-form']				=$route['default_controller'].'/categoryForm';
$route['insert-category-name']		=$route['default_controller'].'/insertCategoryName';
$route['update-category-name']		=$route['default_controller'].'/updateCategoryName';
$route['disability']				=$route['default_controller'].'/disabilityForm';
$route['insert-disability-name']	=$route['default_controller'].'/insertDisabilityName';
$route['update-disability-name']		=$route['default_controller'].'/updateDisabilityName';
$route['activity-type']				=$route['default_controller'].'/activityTypeForm';
$route['insert-activity-type-name']	=$route['default_controller'].'/insertActivityTypeName';
$route['update-activity-type']		=$route['default_controller'].'/updateActivityType';
$route['activity-name']				=$route['default_controller'].'/activityNameForm';
$route['insert-activity-name']		=$route['default_controller'].'/insertActivityName';
$route['update-activity-name']		=$route['default_controller'].'/updateActivityName';
$route['response-status/(:any)/(:any)']		=$route['default_controller'].'/responseStatus/$1/$2';