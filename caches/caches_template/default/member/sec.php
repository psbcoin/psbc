<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>

  <script src="layer/layer.js"></script>

<style>
	.login .form-group:nth-child(1) .input{ width:55% !important;}
	.login .form-group:nth-child(1) .input input{ border:none}
	.login .form-group:nth-child(1) a{ width:20% !important; line-height:34px}
</style>
<div class="login">
    <div class="form">
            <form onSubmit="return false">
                <div class="form-group ">
                	<div class="fl">
                        <span>ԭ��¼����</span>
                    </div>
                    <div class="fl input">
                        <input type="password" class="form-control" placeholder="������ԭ��¼����" name="oldpwd" id="oldpwd2">
                    </div>
                    <a class="fr" href="index.php?m=member&c=index&a=public_forget_password_mobile">��������</a>
                    <div class="clear"></div>
                </div>
                <div class="border"></div>
                <div class="form-group ">
                	<div class="fl">
                        <span>�µ�¼����</span>
                    </div>
                    <div class="fr">
                        <input type="password" class="form-control" placeholder="�������µ�¼����" name="newpwd" id="newpwd2">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group ">
                	<div class="fl">
                        <span>�ظ�������</span>
                    </div>
                    <div class="fr">
                        <input type="password" class="form-control" placeholder="���ظ������µ�¼����" name="newpwd3" id="newpwd3">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group submit ">
                    <button class="btn btn-info" onClick="edpwd(1)">�ύ</button>
                </div>
        </form>
    </div>
    <div class="form" style="margin-top: 40px;">
            <form onSubmit="return false">
                <div class="form-group ">
                	<div class="fl">
                        <span>ԭ��������</span>
                    </div>
                    <div class="fl input">
                        <input type="password" class="form-control" name="oldpwd" id="oldpwd" placeholder="������ԭ��������">
                    </div>
                    <a class="fr" href="index.php?m=member&c=index&a=public_forget_password_mobile">��������</a>
                    <div class="clear"></div>
                </div>
                <div class="border"></div>
                <div class="form-group ">
                	<div class="fl">
                        <span>�½�������</span>
                    </div>
                    <div class="fr">
                        <input type="password" class="form-control" name="newpwd" id="newpwd" placeholder="�������½�������">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group ">
                	<div class="fl">
                        <span>�ظ�������</span>
                    </div>
                    <div class="fr">
                        <input type="password" class="form-control"  name="newpwd1" id="newpwd1" placeholder="���ظ������½�������">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group submit ">
                    <button class="btn btn-info" onClick="edpwd(2)">�ύ</button>
                </div>
        </form>
    </div>
</div>

<div class="hei40"></div>
<script>
function edpwd(id){
	if(id==1){
		var oldpwd = $("#oldpwd2").val();
		var newpwd = $("#newpwd2").val();
		var newpwd2 = $("#newpwd3").val();
	}
	if(id==2){
		var oldpwd = $("#oldpwd").val();
		var newpwd = $("#newpwd").val();
		var newpwd2 = $("#newpwd1").val();
	}
	if(!oldpwd){
		layer.msg("������ԭ����", {icon: 2});
		return false;
	}
	if(!newpwd){
		layer.msg("������������", {icon: 2});
		return false;
	}
	if(!newpwd2){
		layer.msg("���ظ�����������", {icon: 2});
		return false;
	}
	if(newpwd != newpwd2){
		layer.msg("�����������벻һ��", {icon: 2});
		return false;
	}

	$.post("index.php?m=member&a=sec", {
		type : id,
		oldpwd : oldpwd,
		newpwd : newpwd,
		newpwd2 : newpwd2
	}, function (data) {
		if (data.stat == 1) {
			layer.msg(data.msg, {icon: 1});
			window.setTimeout("window.location='index.php?m=member&a=sec'", 1000);
		} else {
			layer.msg(data.msg, {icon: 2});
		}
	}, "json");
		
	
	
	
	
	
	
	
}
	
	
	
	
</script>
<?php include template('member', 'footer'); ?>