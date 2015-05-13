<?php

namespace yii2visjs;

use Yii;
use yii\web\AssetBundle;

/**
 * @link http://www.frenzel.net/
 * @author Philipp Frenzel <philipp@frenzel.net> 
 */

class CoreAsset extends AssetBundle
{
    /**
     * [$sourcePath description]
     * @var string
     */
    public $sourcePath = '@bower/vis/dist';

    /**
     * [$autoGenerate description]
     * @var boolean
     */
    public $autoGenerate = true;
    
    /**
     * [$css description]
     * @var array
     */
    public $css = [
        'vis.css',
    ];

    /**
     * [$js description]
     * @var array
     */
    public $js = [
        'vis.js',
    ];
    
    /**
     * [$depends description]
     * @var array
     */
    public $depends = [
    ];

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);
    }

}
