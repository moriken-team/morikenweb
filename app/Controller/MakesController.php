<?php

class MakesController extends AppController {

        public $name = 'Makes'; //クラス名
        function make4(){//作問入力
            //APIができたら差し替える
                $type = 1; //初期は1 選択式問題
                $this->set('type',$type);
                $ctInfo = "盛岡の歴史"; //カテゴリ情報
                $this->set('ctInfo',$ctInfo); //0=>選択フォーム用
                $this->set('sbctInfo',"サブカテゴリ"); //連プル
                $ptData = "ポイントに関する情報"; //ポイントに関する情報
                $this->set('rate',1); //ポイントのレート情報
        }
        function make3(){
            debug($this->request->data);
            $this->Make->kansuu();
            $makes=$this->Make->find('all');
            debug($makes);
            $this->Make->save($this->request->data);
        }
}
?>