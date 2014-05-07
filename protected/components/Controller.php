<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public $template = array();

	public function translate($message, $params = array())
	{
		return Yii::t(Yii::app()->language,$message,$params);
	}

	/**
	 * 
	 * @param array $template
	 * @param boolean $type - indica se o array deve ficar no inicio ou no fim (true = vai para o inicio e false = no final do array) 
	 * 
	 */ 
	public function renderTemplate($template = array(), $type = false)
	{
		if(!$type)
			$mergeBlocksName = $this->template + $template;
		else
			$mergeBlocksName = $template + $this->template;

		return $this->template = $mergeBlocksName;
	}

	public function validateTemplate($output){
		//verifica se existe marcações
		if(!empty($this->template)){

			$template = array();
			//controla as marcações que estão dentro das strings passada pelos parametros do Yii::t()
			$blockName = array();
			//percorre o array 
			foreach ($this->template as $key => $value) {
				//verifica se as marcações existem dentro do documento 
				if(substr_count($output, $key)){
					//verifica se há marcações que não estão dentro do documento
					if(!empty($blockName)){

						$block = array();
						//percorre o as marcações externas
						foreach ($blockName as $k => $val) {
							if(substr_count($value, $k)) //verifica se existe a marcação dentro da string
								$block[$k] = $val; //armazena a string								
						}
						//retorna somente as marcações que estão dentro das string para minimizar o carregamento de todos os paramêtros
						$this->template[$key] = Yii::t('template',$value, $block);

					}else
						$this->template[$key] = $value; // retorna apenas as marcações que estão dentro do documento principal

				}else{
					$blockName[$key] = $value; //armazena as marcações passadas pelos parametros do Yii::t() que não estão dentro do arquivo principal
				}

			}
			//var_dump($this->template); exit;
		}

	}

	public function render($view,$data=null,$return=false)
	{
		if($this->beforeRender($view))
		{
			$output=$this->renderPartial($view,$data,true);
			if(($layoutFile=$this->getLayoutFile($this->layout))!==false)
				$output=$this->renderFile($layoutFile,array('content'=>$output),true);

			$this->afterRender($view,$output);

			$output=$this->processOutput($output);

			$this->validateTemplate($output);

			if($return)
				return Yii::t('template',$output, $this->template);
			else
				echo Yii::t('template',$output, $this->template);
		}
	}

}