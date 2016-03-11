<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {  
    public function index(){
    	if(IS_POST){
          if($this->check_verify(I('verify'))){
              $account=I('userName'); 
              $password=I('psd'); 
              $where=array('admin_account'=>$account); 
              $result=M('admin')->where($where)->find();
              if($this->checklogin($result,$password)){
                  if($this->checklock($result['lock'])){
                      //更新登录信息
                      $data=array(
                          'admin_id'=>$result['admin_id'],
                          'logintime'=>time(),
                          'loginip'=>  get_client_ip()
                      );
                       M('admin')->save($data);
                      //存储session
                       $this->setSession($result);
                       $this->success("登录成功!",U('Index/index'));
                  }else{
                      $this->error("该用户被锁定，请重新输入",U('Login/index'),1);
                  }   
              }else{
                  $this->error("用户名或密码错误，请重新输入",U('Login/index'),1);
              }
             
          }else{
              $this->error("验证码错误，请重新输入",U('Login/index'),1);
          }       
    	}
    	else{
          $this->display();
        }
    }
// 验证码
    public function verify(){
    	$config =    array(    
    	'fontSize'    =>   20,    // 验证码字体大小   
    	'length'      =>    4,     // 验证码位数   
    	'useNoise'    =>    false, // 关闭验证码杂点
         'useCurve'   =>  false,
             'codeSet'   =>'0123456789',
    	);
        $Verify =     new \Think\Verify($config);
    	$Verify->entry();
    }
 // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
     function check_verify($code, $id = ''){  
      $verify = new \Think\Verify();   
      return $verify->check($code, $id);
    }
//检测登录信息
 public function checklogin($result,$password){
     if($result){                                   
                  if($result['admin_pwd']==md5($password)){
                          return true;                  
                   }else{
                        return false;
                   }
                 }
      else{
               return false;
           }
 }
  //检测账号是否被锁定
  public function checklock($lock){
      if($lock==0){
         return true;
      }
      else{
         return false;
      }
  }
 //设置session的函数
 public function setSession($result){
     session('id',$result['admin_id']);
     session('account',$result['admin_account']);
     session('logintime',$result['logintime']);
     session('loginip',$result['loginip']);
     session('admin_role_id',$result['admin_role_id']);
 }
 //退出登录
  public function logout(){
      session(null); 
      $this->success("退出成功",U('Login/index'));
  }  
 






}