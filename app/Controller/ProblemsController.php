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
        $this->Session->write('problems', $response['response']['Problems']);
        $extractPropertyNames = array(
            'sentence','right_answer','description','other_answer'
        );
        $propertyList = $this->Problem->createPropertyList($response['response']['Problems'], $extractPropertyNames);
        $extractChoicesNames = array(
            'right_answer','wrong_answer1','wrong_answer2','wrong_answer3'
        );
        $choices = $this->Problem->createPropertyList($response['response']['Problems'], $extractChoicesNames);
        for($i = 0; $i < $item; $i++){
            shuffle($choices[$i]);
            array_values($choices[$i]);
        }
        $this->set('problems', $propertyList);
        $this->set('choices', $choices);
        $this->Session->write('problemProperties', $propertyList);
        $this->Session->write('choices', $choices);
        $stageLevel = $this->Session->read('stageLevel');
        if($stageLevel == 'first'){
            $this->render('answer_solo');
        }else{
            $this->render('answer_list');
        }
    }

    public function result() {
        //回答結果画面
        $numberOfCorrect = $this->Problem->countCorrect($this->request->data['Problem'], $this->Session->read('problems'));
        $this->set('postAnswers', $this->request->data['Problem']);
        $this->set('numberOfCorrect', $numberOfCorrect);
        $stageLevel = $this->Session->read('stageLevel');
        if($stageLevel == 'first'){
            $this->render('result_solo');
        }else{
            $this->render('result_list');
        }
    }
}
