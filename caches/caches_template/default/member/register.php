<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html lang="zh">
<head>
        <meta charset="GB2312">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
        <title>ע��</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/less.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery.min.js" type="text/javascript"></script>
  <script src="layer/layer.js"></script>
</head>
<body>
<header>
   <div class="header_top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-2">
                    <div class="return"><span class="fa fa-angle-left"></span></div>
                </div>
                <div class="col-xs-8">
                    <div class="header_bt"><h3>ע��</h3></div>
                </div>
            </div>
        
        </div>
  </div>
</header>
<div class="login">
	<div class="img">
    	<img src="images/login.png" width="100%">
    </div>
    <div class="form form-regist">
<form method="post" action="" id="myform">
			<?php $n=1; if(is_array($modellist)) foreach($modellist AS $k => $v) { ?>
			<input name="modelid" type="hidden" value="<?php echo $k;?>"/>
			<?php $n++;}unset($n); ?>
                <div class="form-group">
                  <input type="text" class="form-control  " name="mobile" id="mobile" placeholder="�ֻ�����">
                </div>
                <div class="border"></div>
                <div class="form-group">
                    <input type="text" class="form-control fl input-yzm" id="mobile_code" name="mobile_code" placeholder="���������֤��">
                    <button type="button" class="btn btn-default fr submit1" onClick="zhaoerji('sendsms')" id="sendsms">��ȡ��֤��</button>
                    <div class="clear"></div>
                </div>
                <div class="border"></div>
                <div class="form-group">
                    <input type="text" class="form-control  " name="password" placeholder="��½����">
                </div>
                <div class="border"></div>
                <div class="form-group">
                    <input type="text" class="form-control  " name="password2" placeholder="�ظ���½����">
                </div>
                <div class="border"></div>
                <div class="form-group">
                    <input type="text" class="form-control  " name="paypassword" placeholder="��������">
                </div>
                <div class="border"></div>
                <div class="form-group">
                    <input type="text" class="form-control  " name="yao" placeholder="������" value="<?php echo $invit;?>">
                </div>
                <div class="form-group submit ">

                    <input type="submit"  class="btn btn-info" value="ע��" name="dosubmit" style="width: 90%; margin: 0 5%">
                </div>
                <div class="link text-center" style="color:#5f5d5d">
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                        �����Ķ���ͬ�Ȿ�������ע��Э��
                      </label>
                    </div>
                </div>
        </form>
    </div>
        <p class="text-center size12" style=" color:#757475;">CopyRight@ 2016-2028</p>
</div>
<script language="javascript">
  function isfone(str) {
            var myreg=/^[1][3,4,5,7,8,9][0-9]{9}$/;
            if (!myreg.test(str)) {
                return false;
            } else {
                return true;
            }
        }
	function zhaoerji(id){
	var fone = $("#mobile").val();
	if(!isfone(fone)){
		layer.msg("�ֻ����벻��ȷ��", {icon: 2});
		return false;
	}
	$.getJSON("index.php?m=content&c=index&type=1&a=sms&fone="+fone+"&t="+Math.floor(Math.random()*10000),function(data){
			if(data.stat==1){
				layer.msg("������֤�뷢�ͳɹ���", {icon: 1});
				DJS(id);
			}else{
				layer.msg(data.msg, {icon: 2});
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
</body>
</html>
