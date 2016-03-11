var kai={
    name:false,
    pwd:false
}
$(function(){
    $("#reg-uname").blur(function(){
        var v=$(this).val();
        if(v==""){
            alert("用户名不能为空");
            return false;
        }
        return kai.name=true;
    });
    $('#reg-pwd').blur(function(){
        var v=$('this').val();
        if(v==""){
             alert("密码都不能为空");
              return false;
        }
        
    });
        $('#reg-pwded').blur(function(){
        var v2=$(this).val();
        var v1=$('#reg-pwd').val();
      
        if(v2==""){
             alert("密码都不能为空");
              return false;
        }
        if(v2!=v1){
              alert("两次密码不一致");
              return false;
        }
        kai.pwd=true;
        
    });
    $('.zhuce').click(function(){
        $("#reg-uname").trigger("blur");
        $("#reg-pwd").trigger("blur");
        $("#reg-pwded").trigger("blur");
        var shi=kai.name&&kai.pwd;
        if(shi){
                      return true;
                  }
                  return false;
       
    });
});