<?php
if (!defined('_MKTBIZASK_')) exit; // 개별 페이지 접근 불가 

// 자신만의 코드를 넣어주세요.
if(!isset($_SESSION)){ session_start(); }
$MBM_COM_CORPORATE_REGISTRATION_NUMBER = isset($_POST['MBM_COM_CORPORATE_REGISTRATION_NUMBER']) ? trim($_POST['MBM_COM_CORPORATE_REGISTRATION_NUMBER']) : ''; // 공급사일때 사업자 번호
$MBM_MASTER_CODE = isset($_POST['MBM_MASTER_CODE']) ? trim($_POST['MBM_MASTER_CODE']) : ''; // 관리자일때 마스터코드
$MBM_PART    = isset($_POST['MBM_PART']) ? trim($_POST['MBM_PART']) : ''; // 회원구분

if (!$MBM_COM_CORPORATE_REGISTRATION_NUMBER){ 
    $strQueryComCorporate = '';
    $MBM_COM_CORPORATE_REGISTRATION_NUMBER = '';
}else{
    $strQueryComCorporate = "AND MBM_COM_CORPORATE_REGISTRATION_NUMBER = '".$MBM_COM_CORPORATE_REGISTRATION_NUMBER."'";
}
if (!$MBM_MASTER_CODE){
    $strQueryMasterCode = '';
    $MBM_MASTER_CODE = '';
}else{
    $strQueryMasterCode = "AND MBM_MASTER_CODE = '".$MBM_MASTER_CODE."'";
}
if (!$MBM_PART) alert('로그인정보가 잘못되었습니다! [LOGIN1A01]');

## 회원정보 체크
$GA_memberRowVal = '
    MBM_ID,MBM_AUTH_YN,MBM_EMAIL,MBM_NAME,MBM_COM_NAME,MBM_PART,MBM_MASTER_ID,MBM_MB_NO,MBM_PART_SUB,MBM_COM_CORPORATE_REGISTRATION_NUMBER,MBM_MASTER_CODE
';
$GA_memberRow = $db->getSelect(" 
    SELECT ".$GA_memberRowVal." FROM MKT_MEMBER_MGR WHERE 1 AND MBM_ID = '".$mb_id."' AND MBM_PART = '".$MBM_PART."' ".$strQueryComCorporate." ".$strQueryMasterCode." 
", MYSQLI_ASSOC);

if(!isset($GA_memberRow['MBM_ID'])) alert("회원 가입을 먼저 해주세요!! [LOGIN1B01] ");
if(isset($GA_memberRow['MBM_AUTH_YN'])!='Y') alert("관리자 승인 대기중 입니다! [LOGIN1B02] ");

## 변수정의 필수 ## ASK79
$M_MBM_ID           = (isset($GA_memberRow['MBM_ID']))          ? $GA_memberRow['MBM_ID']           : '';
$M_MBM_AUTH_YN      = (isset($GA_memberRow['MBM_AUTH_YN']))     ? $GA_memberRow['MBM_AUTH_YN']      : '';
$M_MBM_EMAIL        = (isset($GA_memberRow['MBM_EMAIL']))       ? $GA_memberRow['MBM_EMAIL']        : '';
$M_MBM_NAME         = (isset($GA_memberRow['MBM_NAME']))        ? $GA_memberRow['MBM_NAME']         : '';
$M_MBM_COM_NAME     = (isset($GA_memberRow['MBM_COM_NAME']))    ? $GA_memberRow['MBM_COM_NAME']     : '';
$M_MBM_PART         = (isset($GA_memberRow['MBM_PART']))        ? $GA_memberRow['MBM_PART']         : '';
$M_MBM_MASTER_ID    = (isset($GA_memberRow['MBM_MASTER_ID']))   ? $GA_memberRow['MBM_MASTER_ID']    : '';
$M_MBM_MB_NO        = (isset($GA_memberRow['MBM_MB_NO']))       ? $GA_memberRow['MBM_MB_NO']        : '';
$M_MBM_PART_SUB     = (isset($GA_memberRow['MBM_PART_SUB']))    ? $GA_memberRow['MBM_PART_SUB']     : '';
$M_MBM_COM_CORPORATE_REGISTRATION_NUMBER = (isset($GA_memberRow['MBM_COM_CORPORATE_REGISTRATION_NUMBER'])) ? $GA_memberRow['MBM_COM_CORPORATE_REGISTRATION_NUMBER'] : '';
$M_MBM_MASTER_CODE  = (isset($GA_memberRow['MBM_MASTER_CODE'])) ? $GA_memberRow['MBM_MASTER_CODE']  : '';
$GIT_REMOTE_ADDR    = '';
$GIT_REMOTE_ADDR    = Util::getRemoteAddrIP();

?>
