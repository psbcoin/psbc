<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>


<div class="jytop1">
    <div class="jytop2">
        <div class="img">
            <img class="fl" src="images/logo1.png" width="50px">
            <div class="fl" style="margin-left:15px">
            	<p class="size12">�ֻ���<?php echo $memberinfo['mobile'];?></p>
            	<p class="size12">UID��<?php echo $memberinfo['userid'];?></p>
            </div>
            <div class="clear"></div>
        </div>
        <p class="p1 size16">���ñ����� <?php echo $memberinfo['amount'];?></p>
    </div>
</div>
<div class="wdzh padding15">
	<div class="fl">
    	<div><img src="images/zh_1.png"></div>
        <div><a href="index.php?m=member&a=sys">�˻�����</a></div>
    </div>
	<div class="fl">
    	<div><img src="images/zh_2.png"></div>
        <div><a href="index.php?m=member&a=sec">��ȫ����</a></div>
    </div>
	<div class="fl">
    	<div><img src="images/zh_3.png" ></div>
        <div><a href="index.php?m=member&a=suo">������Ϣ</a></div>
    </div>
	<div class="fl">
    	<div><img src="images/zh_4.png"></div>
        <div><a href="index.php?m=member&a=user">�����ת��</a></div>
    </div>
	<div class="fl">
    	<div><img src="images/zh_5.png"></div>
        <div><a href="index.php?m=member&a=user">�����ת��</a></div>
    </div>
	<div class="fl">
    	<div><img src="images/zh_6.png"></div>
        <div><a href="list-9-1.html">��������</a></div>
    </div>
	<div class="fl">
    	<div><img src="images/zh_7.png"></div>
        <div><a href="index.php?m=member&a=user">���߿ͷ�</a></div>
    </div>
	<div class="fl">
    	<div><img src="images/zh_8.png"></div>
        <div><a href="/list-6-1.html">ϵͳ����</a></div>
    </div>
	<div class="fl">
    	<div><img src="images/zh_9.png"></div>
        <div><a href="list-10-1.html">��������</a></div>
    </div>
	<div class="fl">
    	<div><img src="images/ico2.png"></div>
        <div><a href="index.php?m=member&a=zhuan">��������</a></div>
    </div>
	<div class="fl">
    	<div><img src="images/icos.png"></div>
        <div><a href="/uploadfile/psbc.pdf" style="margin-right: 4px;">��</a><a href="/uploadfile/psbc_en.pdf" style="margin-left: 4px">Ӣ</a></div>
    </div>
	<div class="fl">
    	<div><img src="images/icom.png"></div>
        <div><a >Դ����</a></div>
    </div>
    <div class="fl" style="width: 100%"><a href="index.php?m=member&a=logout" style="padding: 5px; display: block; border: #eee 1px solid; border-radius: 20px; font-size: 16px;">�˳���¼</a></div>
    <div class="clear"></div>
</div>
<div class="hei40"></div>

<?php include template('member', 'footer'); ?>