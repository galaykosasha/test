<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 14.04.16
 * Time: 18:35
 */

namespace app\widgets;

use yii\base\Widget;

class FlashWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('flash');
    }
}