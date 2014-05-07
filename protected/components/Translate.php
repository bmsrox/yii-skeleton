<?php
trait Translate{
	public function translate($message, $params = array()){
		return Yii::app()->controller->translate($message, $params);
	}
}
?>