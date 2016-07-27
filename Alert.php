<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yangshihe\zui;

/**
 * @package yangshihe.zui.Alert
 * @copyright DNA <http://www.Noooya.com/>
 * @version 1.0.0
 * @author yangshihe@qq.com
 * @since 1.0
 */
class Alert extends \yii\bootstrap\Widget
{
	/**
	 * @var array the alert types configuration for the flash messages.
	 * This array is setup as $key => $value, where:
	 * - $key is the name of the session flash variable
	 * - $value is the bootstrap alert type (i.e. danger, success, info, warning)
	 */
	public $alertTypes = [
		'error' => 'alert-danger',
		'danger' => 'alert-danger',
		'success' => 'alert-success',
		'info' => 'alert-info',
		'warning' => 'alert-warning',
	];

	/**
	 * @var array the options for rendering the close button tag.
	 */
	public $closeButton = [];

	public function init()
	{
		parent::init();

		$session = \Yii::$app->session;
		$flashes = $session->getAllFlashes();
		$appendCss = isset($this->options['class']) ? ' ' . $this->options['class'] : '';

		foreach ($flashes as $type => $data) {
			if (isset($this->alertTypes[$type])) {
				$data = (array) $data;
				foreach ($data as $i => $message) {
					/* initialize css class for each alert box */
					$this->options['class'] = $this->alertTypes[$type] . $appendCss;

					/* assign unique id to each alert box */
					//$this->options['id'] = $this->getId() . '-' . $type . '-' . $i;

					if (is_array($message)) {

						$message = implode($message, '<br>');

					}

					echo \yii\bootstrap\Alert::widget([
						'body' => $message,
						'closeButton' => $this->closeButton,
						'options' => $this->options,
					]);
				}

				$session->removeFlash($type);
			}
		}
	}
}
