<?php
trait Translate{
	public function translate($message, $params = array()){
		return Yii::t(Yii::app()->language,$message,$params);
	}
}
?>