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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home/sign_in';
//$route['default_controller'] = 'Home/sign_in';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['about-us'] = 'Home/about_us';
$route['causes'] = 'Home/causes';
$route['faq'] = 'Home/faq_s';
$route['contact-us'] = 'Home/contact_us';

                                     
                                     
                                     
$route['signup/(:any)'] = 'Home/sign_up/$1';
$route['signin'] = 'Home/sign_in';
$route['user-logout']='Home/user_logout';
$route['godirect/(:any)/(:any)']="Home/directLogin/$1/$2";
//---------
$route['home'] = 'home';
$route['table'] = 'Home/mytable';
$route['form']='Home/myform';
// $route['blog-details'] = 'Home/blog_details';
 $route['forgot-password']='Home/forget_password';
// $route['signin'] = 'Home/sign_in';
// $route['user-logout']='Home/user_logout';
// $route['godirect/(:any)/(:any)']="Home/directLogin/$1/$2";
// $route['signup/(:any)'] = 'Home/sign_up/$1';
// User----------------
$route['dashboard']='User/index';
$route['profile']="User/profile";
$route['change-password']="User/change_pwd";
$route['change-txn-password']="User/change_Txnpwd";
$route['update-bank']="User/update_bankDetails";
$route['update-usdt']="User/update_usdt";
$route['commitments']="User/commitments";
$route['commitments-history']="User/commitments_history";
$route['get-help']="User/get_help";
$route['provide-help']="User/provide_help";
$route['myrefrral']="User/getdirect";
//  $route['binary-tree'] = 'user/bin_show';
  $route['level-team'] = 'user/getlevel';
// $route['top-up']="User/mytopup";
  $route['activation-history']="User/mytop_history";
// $route['compound-system']="User/compund_invest";
// $route['top_up/(:any)']="User/mytop_uppop_up/$1";
// $route['top-up-history']="User/mytop_history";
// $route['fund-transfer-recieve-details']="User/transfer_receive_fund";
// $route['fund_transfer_active']="User/fundsTransfer_usrs";
// $route['main_funds_transfers']="User/toactive_wllaete";
// $route['funds-request']="User/my_fund_request";
// $route['get-fund']="User/get_funds";
$route['fund-request-history']="User/fundrequest_history";
$route['fund_get_history']='User/get_fund_history';
// $route['non-working-wallete']="User/non_workin_wallete";
// $route['working-wallete']="User/workin_wallete";
// //$route['withdrawal']="User/withdrawal";

$route['withdrawal']="User/withdrawal";
$route['withdrawal-request']="User/withdrawal_request";
$route['widthrawal-history']="User/my_withdrawl_history";
// $route['update-bank']="User/update_bankDetails";
// $route['delemail/(:any)'] = 'User/hide_mail/$1';
$route['mail/(:any)'] = "User/mail_page/$1";
$route['support-inbox'] = "User/supportInbox";
$route['support-outbox'] = "User/supportOutbox";
$route['support-email'] = "User/supportEmail";
// $route['email-verification/(:any)'] = "Home/email_veri_fication/$1";
 $route['statement']="User/all_statement";
//  $route['myrefrral_grid']="User/getdirect_grid";
//  $route['income']="User/myincome";
//  $route['buy-bv']="Robot_con/buy_bv";
//  $route['bot-history']="Robot_con/bot_history";
//  $route['bv-reward-income-history']="Robot_con/bv_reward__history";
//  $route['bv-trade-income-history']="Robot_con/bv_trade_income__history";
//  $route['bv-trade-history']="Robot_con/bv_trade_history";
//  $route['bv-matching-history']="Robot_con/bv_matching_history";
//   $route['bv-matching-royalty-income-history']="Robot_con/bv_royal_matching_incom_history";
//  //////////////////////////////////////////////////////////////// 
$route['daily-growth']="User/roi_history";
 $route['direct-income']="User/direct_income_history";
$route['level-income']="User/level_income_history";
$route['reward-income']="User/reward_income_history";
// $route['level-maintain-bounus']="User/level_maintain_income_history";
// $route['fast-track-bonus']="User/fast_track_income_history";

// $route['add_fund-bonus']="User/fundsincome_history";


 