<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
<style>
	.jytop2 a{ color: #fff}
</style>

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
<div class="jytop1">
    <div class="jytop2"><a href="index.php?m=member&a=accounts">
        <p class="p1 size16">�ֱ������� <?php echo $memberinfo['amount'];?></p>
        <div>
        	<span class="fl size12">��������������<?php echo $shouyi2;?></span>
        	<span class="fr size12">�ۼ�������<?php echo $shouyi1;?></span>
            <div class="clear"></div>
		</div></a>
    </div>
</div>
<div class="jytop1">
    <div class="jytop2"><a href="index.php?m=member&a=tuan">
        <p class="p1 size16">���������� <?php echo $tuanpris;?></p>
        <div>
        	<span class="fl size12">��������������<?php echo $shouyi4;?></span>
        	<span class="fr size12">�ۼ�������<?php echo $shouyi3;?></span>
            <div class="clear"></div>
		</div></a>
    </div>
</div>
<div class="jytop1">
    <div class="jytop2"><a href="index.php?m=member&a=suo">
        <p class="p1 size16">���������� <?php echo $suopri;?></p>
        <div>
        	<span class="fl size12">��������������<?php echo $shouyi6;?></span>
        	<span class="fr size12">�ۼ�������<?php echo $shouyi5;?></span>
            <div class="clear"></div>
        </div></a>
    </div>
</div>
<div class="hei40"></div>

<?php include template('member', 'footer'); ?>