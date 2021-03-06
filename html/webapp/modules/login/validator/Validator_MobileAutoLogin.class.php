<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * 携帯端末からの自動ログインチェックバリデータクラス
 *
 * @package     NetCommons.validator
 * @author      Noriko Arai,Ryuji Masukawa
 * @copyright   2006-2007 NetCommons Project
 * @license     http://www.netcommons.org/license.txt  NetCommons License
 * @project     NetCommons Project, supported by National Institute of Informatics
 * @access      public
 */
class Login_Validator_MobileAutoLogin extends Validator
{
	/**
	 * 携帯端末からの自動ログインチェック
	 *
	 * @param mixed $attributes チェックする値
	 * @param string $errStr エラー文字列
	 * @param array $params オプション引数
	 * @return string エラー文字列(エラーの場合)
	 * @access public
	 */
	function validate($attributes, $errStr, $params)
	{
		$container =& DIContainerFactory::getContainer();
		$session =& $container->getComponent('Session');

		$mobileInfo = $session->getParameter('_mobile_info');
		if ($mobileInfo['autologin'] != _AUTOLOGIN_OK
			&& $attributes['mobile_auto_login'] == _ON) {
			return $errStr;
		}

		return;
	}
}
?>
