$(function(){
    $("#result").append("<div class='xiaowen'>小问：您好！欢迎您和小问交流。</div>");
    $("#btn").click(function(){
        var v=$("#text").val();
        if(v==""){
            alert("内容不能为空");
            return false;
        }else{
            $("#text").val("");
            $("#result").append("<div class=''>我："+v+"</div>");
            $.ajax({
                type:"post",
                url:"tuling",
                data:{"info":v},
                success:function(data){
                    var obj=eval("("+data+")");
                    var msg=obj.text;
                    $answer="<div class='xiaowen'>小问:"+msg+"</div>";
                    $("#result").append($answer);
                }
            });
        }
        
    });
});
