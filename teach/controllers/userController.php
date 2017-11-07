<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 29.10.2017
 * Time: 14:51
 */
class userController extends Controller{

    public function index(){
        $examples=$this->model->load();		// просим у модели все записи
        $this->setResponce($examples);		// возвращаем ответ
    }

    public function view($data){
        $example=$this->model->load($data['id'] - 1); // просим у модели конкретную запись
        $this->setResponce($example);
    }

    public function add(){
            if( (isset($_POST['id'])) && (isset($_POST['name'])) && (isset($_POST['score'])) )
            {
                $dataToSave=array('id'=>$_POST['id'], 'name'=>$_POST['name'], 'score'=>$_POST['score']);
                $addedItem=$this->model->create($dataToSave);
                $this->setResponce($addedItem);
            }
    }

    public function edit($data) {

        $_PUT=json_decode(file_get_contents('php://input'),true);

        if((isset($_PUT['id']))&&(isset($_PUT['name']))&&(isset($_PUT['score']))){
            // мы передаем в модель массив с данными
            // модель должна вернуть boolean
            $dataToUpd=array('id'=>$_PUT['id'], 'name'=>$_PUT['name'], 'score'=>$_PUT['score'] );
            $updItem=$this->model->save($dataToUpd, $data['id']);
            $this->setResponce($updItem);
        }
    }

    public function delete($data) {
        $example = $this->model->delete($data['id']);
        $this->setResponce($example);
    }

}

