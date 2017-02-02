<?php
class GuideController extends Controller
{
    public $layout='//layouts/column-pure';

    public function actionNewHand()
    {
        
        $this->render('new-hand',array(
        ));
    }


}