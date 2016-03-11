
	   function show(a){
	      var tab=document.getElementById(a);
		  hui();
		  tab.style.display="block";
           
	   }
	   function hui(){
	       var tab1=document.getElementById("huayu");
	       var tab2=document.getElementById("rihan");
	       var tab3=document.getElementById("oumei");
		   tab1.style.display="none";
		   tab2.style.display="none";
		   tab3.style.display="none";		   
	   }
$(function(){
    $('#jiao').click(function(){
     
        var address=$("input[name='address']").val();
        var realname=$("input[name='realname']").val();
        var phone=$("input[name='phone']").val();
        var good=$("input[name='gid']").val();
        var url="http://www.wenda.com/go/index.php/Home/Shop/person/gid/"+good;
        if(address==""){
            alert("地址不能为空，请填写个人信息");
            window.location.href=url;
            return false;
        }
                if(realname==""){
            alert("真实姓名不能为空，请填写个人信息");
            window.location.href=url;
            return false;
        }
                if(phone==""){
            alert("联系方式不能为空，请填写个人信息");
            window.location.href=url;
            return false;
        }
        
    });
});