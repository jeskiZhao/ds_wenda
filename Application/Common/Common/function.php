<?php

/*显示变量相关信息的函数*/
function p($msg){
	echo "<pre>"; 
	print_r($msg);
	echo "</pre>";
}
//分类递归整理
function recursive($info,$pid=0,$level=0,$v=""){
     $arr=array();
     foreach($info as $value){
         if($value['pid']==$pid){
             $value['level']=$level;
             $value['biao']=$v."-".$value['id'];
             $arr[]=$value;
             $arr=array_merge($arr,recursive($info,$value['id'],$level+1,$value['biao']));
         }
     }
     return $arr;
}
//递归查找分类的id
function get_allid($idinfo,$id){
     $arr=array();
     foreach($idinfo as $v){      
         if($v['pid']==$id){
         $arr[]=$v['id'];
         $arr=array_merge($arr,get_allid($idinfo,$v['id']));
         }
     }
     return $arr;
}
//写入文件函数
function write_file($filepath,$arr){
       //加true是赋值给变量了，要不然直接就输出
    $str= "<?php\r\nreturn  ".var_export($arr,true).';';
    return file_put_contents($filepath, $str);
    
}
//提取id
function get_ids($array,$id){
    $arr=array();
    foreach($array as $v){
        $arr[]=$v[$id];
    }
    return $arr;
}

//cwsc分词函数
 function fenci($str,$num=3){
            //实例化分词插件核心类
             $so = scws_new();
             //设置分词时所用编码
             $so->set_charset('utf-8');
             //设置分词所用词典(此处使用utf8的词典)
             $so->set_dict('c:/program files/scws/etc/dict.utf8.xdb');
             //设置分词所用规则
             $so->set_rule('c:/program files/scws/etc/rules.utf8.ini ');
             //分词前去掉标点符号
             $so->set_ignore(true);
             //是否复式分割，如“中国人”返回“中国＋人＋中国人”三个词。
             $so->set_multi();
             //设定将文字自动以二字分词法聚合
             $so->set_duality(false);
             //要进行分词的语句
             $so->send_text($str);
             //获取分词结果，如果提取高频词用get_tops方法
            // $tmp = $so->get_tops(2,'al,n');
//             while ($tmp = $so->get_result())
//             {                  
//                 echo $tmp;              
//             }
             $tmp = $so->get_tops($num,'n,vn,v,t,vd');
             return $tmp;
             $so->close();
    }
    
    //cwsc分词函数
 function tui($str,$num=3){
            //实例化分词插件核心类
             $so = scws_new();
             //设置分词时所用编码
             $so->set_charset('utf-8');
             //设置分词所用词典(此处使用utf8的词典)
             $so->set_dict('c:/program files/scws/etc/dict.utf8.xdb');
             //设置分词所用规则
             $so->set_rule('c:/program files/scws/etc/rules.utf8.ini ');
             //分词前去掉标点符号
             $so->set_ignore(true);
             //是否复式分割，如“中国人”返回“中国＋人＋中国人”三个词。
             $so->set_multi();
             //设定将文字自动以二字分词法聚合
             $so->set_duality(false);
             //要进行分词的语句
             $so->send_text($str);
             //获取分词结果，如果提取高频词用get_tops方法
            // $tmp = $so->get_tops(2,'al,n');
            $tmp = $so->get_result();
             return $tmp;
             $so->close();
    }
    
    
    //phpanalysis切词函数
 $resultType   = 1 ;
 $notSplitLen  = 2 ;
//岐义处理
 $do_fork = true;
//新词识别
 $do_unit =  true;
//多元切分
 $do_multi =  true;
//词性标注
 $do_prop = true;
//是否预载全部词条
$pri_dict =  true;
 function get_keywords_str($content){ 
        require('c:/phpanalysis/phpanalysis.class.php'); 
        PhpAnalysis::$loadInit = false; 
        $pa = new PhpAnalysis('utf-8', 'utf-8', false); 
        $pa->LoadDict(); 
        $pa->SetSource($content); 
        $pa->StartAnalysis( false ); 
        $tagsd = $pa->GetFinallyResult(); 
        $tags = $pa->GetFinallyKeywords( $num = 0 ); 
        return $tags; 
        } 

    //面包屑获取父级信息
    function get_father($array,$cid){
        $arr=array();
        foreach($array as $v){
            if($v['id']==$cid){
                $arr[]=$v;
                $arr=array_merge($arr,get_father($array,$v['pid']));
            }
        }
        return $arr;
    }
    //自己写的二元分词
   function spStr($str)  
{  
    $cstr = array();  
   
    $search = array(",", "/", "\\", ".", ";", ":", "\"", "!", "~", "`", 
        "^", "(", ")", "?", "-", "\t", "\n", "'", "<", ">", "\r", "\r\n", 
        "{1}quot;", "&", "%", "#", "@", "+", "=", "{", "}", "[", "]",
        "：", "）", "（", "．", "。", "，", "！", "；", "“", "”", "‘",
        "’", "［", "］", "、", "—", "　", "《", "》",
        "－", "…", "【", "】",);    
    $str = str_replace($search, " ", $str);  
    preg_match_all("/[a-zA-Z]+/", $str, $estr);  
    preg_match_all("/[0-9]+/", $str, $nstr);   
    $str = preg_replace("/[0-9a-zA-Z]+/", " ", $str);  
    $str = preg_replace("/\s{2,}/", " ", $str);  
    $str = explode(" ", trim($str));  
    foreach ($str as $s) {  
        $l = strlen($s);  
   
        $bf = null;  
        for ($i= 0; $i< $l; $i=$i+3) {  
            $ns1 = $s{$i}.$s{$i+1}.$s{$i+2};  
            if (isset($s{$i+3})) {  
                $ns2 = $s{$i+3}.$s{$i+4}.$s{$i+5};  
                if (preg_match("/[\x80-\xff]{3}/",$ns2)) $cstr[] = $ns1.$ns2;  
            } else if ($i == 0) {  
                $cstr[] = $ns1;  
            }  
        }  
    }  
   
    $estr = isset($estr[0])?$estr[0]:array();  
    $nstr = isset($nstr[0])?$nstr[0]:array();     
    return array_merge($nstr,$estr,$cstr);  
} 
//二维数组去除相同项函数
    function my_array_unique($array2D){  
         
    	 foreach ($array2D as $v){
             $v = implode(",",$v);              
             $temp[] = $v;
         }
        $temp = array_unique($temp);      
        foreach ($temp as $k => $v){
            $temp[$k] = explode(",",$v); 
        }
        return $temp;
    }
    //二维数组降序
   function multi_array_sort($multi_array,$sort_key,$sort=SORT_DESC){
        if(is_array($multi_array)){
        foreach ($multi_array as $row_array){
        if(is_array($row_array)){
        $key_array[] = $row_array[$sort_key];
        }else{
        return false;
        }
        }
        }else{
        return false;
        }
        array_multisort($key_array,$sort,$multi_array);
        return $multi_array;
} 
?>