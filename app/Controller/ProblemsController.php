<?php
App::uses('AppController','Controller');
//API利用時、もりけんwebからのアクセスはkentei_id=1で管理する
define('MORIKEN_WEB_ID',1);
class ProblemsController extends AppController {
    public $name = 'Problems';
    public $uses = array('Category', 'Problem');
    public $components = array('Session');

    public function selectStage() {
        //回答ステージ選択画面
    }

    public function selectThePast() {
        //過去問回答カテゴリ&級選択画面
        //※ 選択したステージレベル情報はセッションで保持すること
        $this->Session->write('stageLevel', 'first');
        $querys = 'kentei_id='.MORIKEN_WEB_ID;
        $response = $this->api_rest('GET', 'categories/index.json', $querys, array());
        $categoryNames = $this->Category->createProperties($response, 'name');
        $categoryIds = $this->Category->createProperties($response, 'id');
        $this->set('categoryProperties', array_combine($categoryIds, $categoryNames));
    }

    public function selectTheOriginal() {
        //過去問回答カテゴリ選択画面
        //※ 選択したステージレベル情報はセッションで保持すること
        $this->Session->write('stageLevel', 'first');
        $querys = 'kentei_id='.MORIKEN_WEB_ID;
        $response = $this->api_rest('GET', 'categories/index.json', $querys, array());
        //cakeのarrary_coulmメソッドに後で変更
        $categoryNames = $this->Category->createProperties($response, 'name');
        $categoryIds = $this->Category->createProperties($response, 'id');
        $this->set('categoryProperties', array_combine($categoryIds, $categoryNames));
    }

    public function selectTheEmployGrade($stageLevel) {
        //試験モード回答対象問題選択画面
        $this->Session->write('stageLevel', $stageLevel);
    }

    public function answer($employ, $publicFlag, $categoryId, $grade, $item) {
        //回答画面
        $querys = 'kentei_id='.MORIKEN_WEB_ID.'&'.'employ='.$employ.'&'.'public_flag='.$publicFlag.'&'.'category_id='.$categoryId.'&'.'grade='.$grade.'&'.'item='.$item;
        $response = $this->api_rest('GET', 'problems/index.json', $querys, array());
        $extractNames = array(
            'sentence','right_answer','wrong_answer1','wrong_answer2','wrong_answer3','description','other_answer'
        );
        $propertyList = $this->Problem->createPropertyList($response['response']['Problems'], $extractNames);
        $this->set('problems', $propertyList);
        $stageLevel = $this->Session->read('stageLevel');
        if($stageLevel == 'first'){
            $this->render('answer_solo');
        }else{
            $this->render('answer_list');
        }
        $this->render('answer_solo');
    }

    public function result() {
        //回答結果画面
    }
}
