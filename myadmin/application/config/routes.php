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
|$route['dashboard'] = 'pages/dashboard';
$route['distributer-details/(:any)']="pages/user_rs/$1";
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// ----------------------------------- Admin------------------------------------------------------
$route['admin-login']="Home/admin_login";
$route['update_adds']="Admin/update_adds_f";
$route['reply_email/(:any)']="Admin/show_page/$1";
$route['email_reply']="Admin/get_singlmsg";
$route['create_news']="Admin/create_news";
$route['inbox']="Admin/inbox";
$route['outbox']="Admin/outbox";
$route['compose']="Admin/compose_email";
$route['our-all-users']="Admin/our_users";
$route['update_user_profile/(:any)']="Admin/update_profile/$1";
$route['fund-transfer']="Admin/fundTransfer";
$route['withdrwal-fund-transfer']="Admin/update_fund_request";

$route['payment-transfer']="Admin/fundTransfer";

$route['funds-transfer-history']="Admin/fundstransHistory";
$route['top-up-byadmin']="Admin/topup_admin";
$route['top-up-history-byadmin']="Admin/topup_history_admin";
$route['level_income_all_user_list']="Admin/level_income_alluser";
$route['withdrawal-request_admin']="Admin/withdrawal_request";
$route['withdrawal-history_admin']="Admin/withdrawal_history";
$route['change_password']="Admin/change_passwords";
$route['inr-qr']="Admin/update_inr_qr";
$route['usdt-qr']="Admin/update_usdt_qr";
$route['fund-request_admin']="Admin/fund_request";
$route['commitments-send']="Admin/commitnment_fund_request";
$route['commit_all_link']="Admin/commitnment_provide_get_links";
$route['all_commitments_history']="Admin/commitnment_history";
$route['all_get_help_history']="Admin/commitnment_widthdral_histty";


$route['fund-history_admin']="Admin/fund_request_history";
//

$route['pay_outs']="Admin/transfer_now";
$route['chkk_ip']="Admin/know_ip";
$route['change_status_services']="Admin/Services_block_unblock";
$route['callback']="Callback/index";
$route['auto_global_team']="Admin/increase_user";
$route['invest_statement']="Admin/get_all_funds_wllete_statment";
$route['non-working-statement']="Admin/get_all_non_working_wllete_statment";
//$route['working-statement']="Admin/get_all_working_wllete_statment";
// $route['royalty-list']="Admin/royalty_percent_list";
// $route['bv-matching']="Admin/get_all_bv_match_list";
// $route['send-royalty-details']="Admin/get_send_royalty_done_list";
// $route['bv-royalty']="Admin/get_bv_royalty_list";
// $route['Trade_account_income']="Admin/get_bv_trade_account_list";
// $route['Bot_daily_trdae_income']="Admin/get_bv_daily_trade_list";
// $route['bot_reward_income']="Admin/get_bot_reward_list";
// $route['royal_bot_club_income']="Admin/get_bv_clublelevl_list";
//
$route['daily-growth-history_admin']="Admin/trade_income_fund_request_history";
$route['direct-income-history_admin']="Admin/direct_income_fund_request_history";
$route['level-admin']="Admin/equity_plus_income_fund_request_history";
$route['reward-income-history_admin']="Admin/activation_reward_income_fund_request_history";
//$route['direct-income-history_admin']="Admin/direct_income_fund_request_history";
//$route['level-maintain-income-history_admin']="Admin/level_maintain_income_fund_request_history";
$route['activation-reward-income-history_admin']="Admin/activation_reward_income_fund_request_history";
//$route['fast_track-income-history_admin']="Admin/fast_track_income_fund_request_history";
$route['export']="Admin/export_wthdra";









