$(function(){  
    //分类选择联动
    var cateid=0;
    $("select[name='cate-one']").change(function(){
       var obj=$(this);
       if(obj.index()<3){
          var id=obj.val();
          //alert(obj.index());
          $.getJSON(getCate,{pid:id},function(data){
              if(data!=0){
                 var option = '';
	        $.each(data, function (i, k) {
		option += '<option value="' + k.id + '">' + k.name + '</option>';
	        });
	        obj.next().html(option).show();
              }
              else{
                   obj.next().hide();  
              }
          },'json');
         
       }
        cateid=obj.val();
        //alert(cateid);
        $("input[name='cid']").val(cateid);
    });
  //表单提交的检验
    $(".send-btn").click(function(){
           if(typeof(uid)=='undefined'){
               alert("请先登录");
               return false;
           }
           else{
                $("textarea[name='content']").trigger('blur');
               if (!cateid) {
                    $('#tui').css('display','none');  
                    $("#sel-cate").css('display','block');
	           alert('请选择一个分类');                                
              
	}
           };
    });
   //表单验证
   $("form[name='ask']").submit(function(){
      if(cateid){
          return true;
      }else{
       return false;
      }
       
   });
   //内容检验
   $("textarea[name='content']").blur(function(){
       var area=$(this);
       if(area.val()==""){
            alert("请填写内容");
       }else{
           return true;
       }
   });
    
   //关闭窗口
  $('.d').click(function(){
      	if (!cateid) {
	    alert('请选择一个分类');
	}
       $('.close-window').click();
  }); 

      //问题输入框输入内容
      $("textarea[name='content']").keyup(function(){
             var con=$("textarea[name='content']").val();
          $.ajax({
                type:"post",
                url:"tui",
                data:{"info":con},
                success:function(data){        
                    if(data!=1){
                    $('#tui').css('display','block');
                    $("#sel-cate").css('display','none');
                    $(".jian").empty();            
                    var d=eval("("+data+")");
                    $.each(d,function(i,v){
                         $answer="<li><input class='hou' type='text'value='"+v.cname+" ' /></span><span class='guan'></span></li>";  
                          cateid=v.cid;
                    });
                   // $answer="<li><input class='hou' type='text'value='"+d+" ' /></span><span class='guan'></span></li>";                 
                    $(".jian").append($answer);
                    var len=$('.hou').val().length;
                    $('.hou').css('width',len+60);         
                     $("input[name='cid']").val(cateid);
                    }else{
                        $(".jian").empty();
                        $('#tui').css('display','none');                 
                        $("#sel-cate").css('display','block');
                    }
                }
            });
         
      });
     //关闭推荐标签
  $('.guan').live('click',function(){
       $(this).parents('li').remove();
        $(".jian").empty();
         $('#tui').css('display','none');                 
        $("#sel-cate").css('display','block');
         cateid=0;       
  });
    
    /****悬赏金币的选择**/
    var obj=$("select[name='reward'] option");
    for(var i=0;i<obj.length;i++){
        if(obj.eq(i).val()>coin){
            obj.eq(i).attr("disabled","disabled");
        }
    }
 
  
 
    
});


