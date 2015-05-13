<?php

 /**
 * This class is used to embed visjs.org JQuery Plugin to my Yii2 Projects
 * @copyright Frenzel GmbH - www.frenzel.net
 * @link http://www.frenzel.net
 * @author Philipp Frenzel <philipp@frenzel.net>
 *
 */

namespace yii2visjs;

use Yii;
use yii\base\Model;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\base\Widget as elWidget;

class yii2visjs extends elWidget
{

    /**
    * @var array options the HTML attributes (name-value pairs) for the field container tag.
    * The values will be HTML-encoded using [[Html::encode()]].
    * If a value is null, the corresponding attribute will not be rendered.
    */
    public $options = [
        'class' => 'visjs',
    ];

    /**
     * @var array clientOptions the HTML attributes for the widget container tag.
     */
    public $clientOptions = [
    ];

    /**
     * how the graph will be displayed
     * possible options: Timeline, Network, Graph2d, Graph3d
     * @var string
     */
    public $visualization = 'Timeline';

    /**
    * Holds an array of Event Objects
    * @var array events of yii2visjs\models\Event
    * @todo add the event class and write docs
    **/
    public $dataSet = [];

    /**
     * Will hold an url to json formatted events!
     * @var url to json service
     */
    public $ajaxEvents = NULL;
    
    /**
     * the text that will be displayed on changing the pages
     * @var string
     */
    public $loading = 'Loading ...';

    /**
     * internal marker for the name of the plugin
     * @var string
     */
    private $_pluginName = 'visJs';

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        //checks for the element id
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
         //checks for the element id
        if (!isset($this->options['class'])) {
            $this->options['class'] = 'visjs';
        }

        parent::init();
    }

    /**
     * Renders the widget.
     */
    public function run()
    {   
        $this->options['data-plugin-name'] = $this->_pluginName;

        if (!isset($this->options['class'])) {
            $this->options['class'] = 'visjs';
        }
        
        echo Html::beginTag('div', $this->options) . "\n";
            echo Html::beginTag('div',['class'=>'fc-loading','style' => 'display:none;']);
                echo Html::encode($this->loading);
            echo Html::endTag('div')."\n";
        echo Html::endTag('div')."\n";
        $this->registerPlugin();
    }

    /**
    * Registers the FullCalendar javascript assets and builds the requiered js  for the widget and the related events
    */
    protected function registerPlugin()
    {        
        $id = $this->options['id'];
        $view = $this->getView();

        /** @var \yii\web\AssetBundle $assetClass */
        $assets = CoreAsset::register($view);

        $js = array();

        if($this->ajaxEvents != NULL){
            $this->clientOptions['events'] = $this->ajaxEvents;
        }

        $cleanOptions = $this->getClientOptions();
        $js[] = "var container$id = document.getElementById('$id');";

        //lets check if we have an event for the calendar...
        if(count($this->dataSet)>0)
        {
            $jsonDataSet = Json::encode($this->dataSet);
            $js[] = "var data$id = new vis.DataSet($jsonDataSet);";
        }

        $visualization = $this->visualization;
        
        $js[] = "var timeline$id = new vis.$visualization(container$id, data$id, $cleanOptions);";


        $view->registerJs(implode("\n", $js),View::POS_READY);
    }

    /**
     * @return array the options for the text field
     */
    protected function getClientOptions()
    {
        return Json::encode($this->clientOptions);
    }

}
