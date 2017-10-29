<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 29.10.2017
 * Time: 14:01
 */
class menuController extends Controller {

    public function index(){
        $examples=$this->model->load();		// просим у модели все записи
        $this->setResponce($examples);		// возвращаем ответ
    }
}
?>