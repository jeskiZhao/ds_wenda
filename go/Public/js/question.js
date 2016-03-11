$(function(){
    $('#anw-sub').click(function(){
        if(typeof(uid)=="undefined"){
              alert("请先登录！");
              return false;
        }else
        var value=$("textarea[name='content']").val();
        if(value==""){
             alert("回答不能为空");
             return false;
        }
        return true;
       
    });
});


