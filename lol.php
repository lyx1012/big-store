<?php
      header('content-type:text/html;charset=utf8');

      require('../Querylist/vendor/autoload.php');
      use QL\QueryList;

      set_time_limit(0);
      $url="http://lol.duowan.com/hero/";
      
      $content=array(
           
           'lol_name'=>array('div.champion_name','text'),
           'desc_src'=>array('a.lol_champion','href')
      	);
      
      $result=QueryList::query($url,$content,'div.mod-pic-bd>ul>li:lt(50)')->getData(function($item){

            $detail=array(
                
            	'lol_attr'=>array('em','text'),
            	'lol_val'=>array('span','text')

            	);
                   

      $item['lol']=QueryList::query($item['desc_src'],$detail,'div.u-clearfix ul:eq(1)>li')->data;

            return $item;
      });

      print_r($result);
?>