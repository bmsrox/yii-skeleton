<?php

class AdmModule extends CWebModule
{

	public function init()
	{
		Yii::app()->name = Yii::t(Yii::app()->language, "Administration");
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		// import the module-level models and components
		$this->setImport(array(
			'adm.models.*',
			'adm.components.*',
			'adm.extensions.*'
		));

		Yii::app()->theme = "backend";
		
		$this->configure(array(
				'preload'=>array('bootstrap'),
				'components'=>array(
						'bootstrap'=>array(
								'class'=>'ext.bootstrap.components.Bootstrap'
						)
				)
		));
		$this->preloadComponents();
	}

	public function beforeControllerAction($controller, $action) {
		if (parent::beforeControllerAction($controller, $action)) {
			// this method is called before any module controller action is performed
			// you may place customized code here
			Yii::app()->widgetFactory->widgets['CBreadcrumbs']=array('homeLink'=>CHtml::link(Yii::t(Yii::app()->language,'Home'), array('/adm')));
				
			$route = $controller->id . '/' . $action->id;
			// echo $route;
			$publicPages = array(
					'default/login',
					'default/error'
			);
			if (Yii::app()->user->isGuest && !in_array($route, $publicPages)){
				Yii::app()->getModule('adm')->user->loginRequired();
			}
			else
				return true;
		}
		else
			return false;
	} 
	
	
}
