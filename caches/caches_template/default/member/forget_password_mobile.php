<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
  <script src="layer/layer.js"></script>

<style>
	.form-horizontal input{ border:none}
	.form-horizontal label{ line-height:34px; color:#5f5d5d}
	.submit{ display:block; width:100%; height:34px; border-radius:17px;}
	.form-group{}
	.group-sub{ margin:40px 0}
</style>
<div class="hei40"></div>

<div class="padding15">
    <form class="form-horizontal" onSubmit="return false">
      <div class="form-group">
        <label for="inputEmail3" class="col-xs-4 control-label">手机号码:</label>
        <div class="col-xs-8">
          <input type="text" class="form-control" id="mobile" placeholder="请输入手机号码">
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-8">
          <input type="text" class="form-control" id="codes" placeholder="输入验证码">
        </div>
        <label for="inputPassword3" class="col-xs-4 control-label size12" style="color:#5683f6; margin-bottom:0" onClick="zhaoerji('sendsms')" id="sendsms">获取验证码</label>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-xs-4 control-label">新登录密码:</label>
        <div class="col-xs-8">
          <input type="password" class="form-control" id="newpwd" placeholder="请输入新登录密码">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-xs-4 control-label">新登录密码:</label>
        <div class="col-xs-8">
          <input type="password" class="form-control" id="newpwd1" placeholder="请重复输入新登录密码">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-xs-4 control-label">新交易密码:</label>
        <div class="col-xs-8">
          <input type="password" class="form-control" id="newpwd2" placeholder="请输入新交易密码">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-xs-4 control-label">新交易密码:</label>
        <div class="col-xs-8">
          <input type="password" class="form-control" id="newpwd3" placeholder="请重复输入新交易密码">
        </div>
      </div>
      <div class="form-group group-sub">
        <div class="col-xs-12">
          <button type="button" class="btn btn-info submit" onClick="suo()">提交</button>
        </div>
      </div>
    </form>
</div>

<div class="hei40"></div>
<script language="javascript">
function suo(){
	var mobile = $("#mobile").val();
	var codes = $("#codes").val();
	var newpwd = $("#newpwd").val();
	var newpwd1 = $("#newpwd1").val();
	var newpwd2 = $("#newpwd2").val();
	var newpwd3 = $("#newpwd3").val();

	if(!mobile){
		layer.msg("请输入手机号码！", {icon: 2});
		return false;
	}
	if(!codes){
		layer.msg("请输入手机号验证码！", {icon: 2});
		return false;
	}
	if(newpwd != newpwd1){
		layer.msg("两次登录密码输入不一致！", {icon: 2});
		return false;
	}
	if(newpwd2 != newpwd3){
		layer.msg("两次交易密码输入不一致！", {icon: 2});
		return false;
	}

			$.post("index.php?m=member&c=index&a=public_forget_password_mobile", {
				type : 2,
				mobile : mobile,
				codes : codes,
				newpwd : newpwd,
				newpwd2 : newpwd2
			}, function (data) {
				if (data.stat == 1) {
					layer.msg(data.msg, {icon: 1});
					window.setTimeout("window.location='index.php?m=member&c=index&a=login'", 1000);
				} else {
					layer.msg(data.msg, {icon: 2});
				}
			}, "json");

	
	
	
	
	
	
	
	
	
}
	
	
	
  function isfone(str) {
            var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
            if (!myreg.test(str)) {
                return false;
            } else {
                return true;
            }
        }
	function zhaoerji(id){
	var fone = $("#mobile").val();
	if(!isfone(fone)){
		layer.msg("手机号码不正确！", {icon: 2});
		return false;
	}
	DJS(id);
	$.getJSON("index.php?m=content&c=index&type=2&a=sms&fone="+fone+"&t="+Math.floor(Math.random()*10000),function(data){
			if(data.stat==1){
				layer.msg("短信验证码发送成功！", {icon: 1});
			}
	  });
}
// JavaScript Document
function DJS(id){
var yuan=$('#'+id).text()
var count = 60;
				CountDown();
    						clearInterval(countdown);
            var countdown = setInterval(CountDown, 1000);
                function CountDown() {
                    $("#"+id).attr("disabled", true);
                    $("#"+id).text("Wait..." + count +"s");
                    if (count == 0) {
                        $("#"+id).text(yuan);
						$("#"+id).removeAttr("disabled");
						clearInterval(countdown);
						}
                        
                    
                    count--;
                }
}
	
	</script>

<?php include template('member', 'footer'); ?>