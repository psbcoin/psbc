<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
  <script src="layer/layer.js"></script>
<style>
.list .size12 {
font-size: 15px !important; line-height: 170%
}
	.con .maincon1 ul li{ width: 49%}
</style>
<div class="jytop1">
    <div class="jytop">
        <div class="img" style="width: 100%; float: left">
            <img src="images/logo.png" width="60px" style="float: left">
			<p class="p2" style="font-size: 28px; float: left; line-height: 77px; margin-left: 10px;"><?php echo $data['title'];?>��$<?php echo $data['usd'];?>��</p>
        </div>
    </div>
</div>

<ul class="mmnav">
	<li><a class="btn btn-info" href="index.php?m=member&a=trade_buy">����PSBC</a></li>
	<li><a class="btn btn-info" href="index.php?m=member&a=trade_my">�ҵĽ���</a></li>
	<li><a class="btn btn-info" href="index.php?m=member&a=trade">����PSBC</a></li>
    <div class="clear"></div>
</ul>
<ul class="mmnav sele">
	<li<?php if($ac==1) { ?> class="active"<?php } ?> id="t1"><a href="index.php?m=member&a=trade_my&ac=1">�ҵ�����</a></li>
	<li<?php if($ac==2) { ?> class="active"<?php } ?> id="t2"><a href="index.php?m=member&a=trade_my&ac=2">�ҵ�����</a></li>
	<li class="active" id="t3"><a href="index.php?m=member&a=trade_my&ac=3">������</a></li>
	<li<?php if($ac==4) { ?> class="active"<?php } ?> class="" id="t4"><a href="index.php?m=member&a=trade_my&ac=4">�����</a></li>
    <div class="clear"></div>
</ul>
<div class="con">
	<div class="maincon maincon1" style="display:block">
        <ul>
        	<li class="fl size16 active">��������</li>
        	<li class="fl size16"><a href="index.php?m=member&a=trade_app&id=<?php echo $data1['id'];?>">����</a></li>
            <div class="clear"></div>
        </ul>
        <div class="list">
			<div class="size12 red">���׶�����<?php echo $data1['id'];?></div>
			<div class="size12 color33">����������<?php echo $data1['title'];?></div>
			<div class="size12 color33">���׵��ۣ�<?php echo $data1['pri'];?></div>
			<div class="size12 color33">�����<strong style="color: #FF0000; font-size: 16px;">��<?php echo $data1['price'];?></strong></div>
			<div class="size12 color33">�Է�������<?php echo $data1['name'];?></div>
			<div class="size12 color33">��ϵ�绰��<?php echo $data1['mobile'];?></div>
			<div class="size12 color33">֧ �� ����<?php echo $data1['zfb'];?></div>
			<div class="size12 color33">�� �� ����<?php echo $data1['yhk'];?></div>
			<div class="size12 color33">�� �� �У�<?php echo $data1['khh'];?></div>
			<?php if($data1[uptime]) { ?>
			<?php if(!$data1[tp2]) { ?><div class="size12 color33">ʣ��ȷ��ʱ�䣺<span id="timer"></span></div><?php } ?>
		   <?php } ?>
        </div>
        <div class="button">
			<div class="size12 color33 text-center" style="margin-bottom:5px">ע������ϸ�˶Ե��������һ��ȷ���޷�����</div>
       	<?php if($type==1) { ?>
        	<?php if(!$data1[tp1]) { ?>
        	<button class="btn btn-info" onClick="qds(1)">���Ѹ���</button>
        	<?php } else { ?>
        	<button class="btn btn-info" style="background: #ccc; border: #ccc 1px solid">����ȷ�ϸ���ȴ�����ȷ��</button>
        	<?php } ?>
        <?php } else { ?>
        	<?php if(!$data1[tp1]) { ?>
				<button class="btn btn-info" style="background: #ccc; border: #ccc 1px solid">�ȴ����ȷ�ϸ���</button>
        	<?php } elseif ($data1[tp1]==1) { ?>
				<?php if(!$data1[tp2]) { ?>
				<button class="btn btn-info" onClick="qds(2)">�����տ�</button>
				<?php } else { ?>
				<button class="btn btn-info" style="background: #ccc; border: #ccc 1px solid">�������</button>
				<?php } ?>
        	<?php } ?>
        
        
        <?php } ?>
        </div>
    </div>
</div>
<div class="hei40"></div>
<script>
function qds(id){
	if(id==1){
		var msgy = '���Ѿ���ɸ��ȷ������';
		var msg  = "���Ѹ���";
	}
	if(id==2){
		var msgy = '����ϸ�˶Ե��������һ��ȷ���޷����ߣ�';
		var msg  = "�����տ�";
	}
		layer.confirm(msgy, 
		{
			btn: [msg,'ȡ��'], //��ť
			shade: false, //����ʾ����
			title:'��������'
		}, function(index){
			$.post("index.php?m=member&a=uptrade", {
				type : id,
				id : <?php echo $data1['id'];?>
			}, function (data) {
				if (data.stat == 1) {
					layer.msg(data.msg, {icon: 1});
					window.setTimeout("window.location=window.location.href", 1000);
				} else {
					layer.msg(data.msg, {icon: 2});
				}
			}, "json");
		
			layer.close(index);
		},function(index){
			layer.close(index);
		}
		
		);	
	
	
	
	
	
	
	
	
	
}
	
	
	
	
</script>
		
		
			<?php if($data1[uptime]) { ?>
<script type="text/javascript">
var intDiff = parseInt(<?php echo $data1['uptime'];?>);//����ʱ��������
function timer(intDiff){
    window.setInterval(function(){
    var day=0,
        hour=0,
        minute=0,
        second=0;//ʱ��Ĭ��ֵ        
    if(intDiff > 0){
        hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
        minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
        second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
    }
    if (minute <= 9) minute = '0' + minute;
    if (second <= 9) second = '0' + second;
    $('#timer').html(hour+'ʱ'+minute+'��'+second+'��');

    intDiff--;
    }, 1000);
} 
$(function(){
    timer(intDiff);
}); 
</script>
       <?php } ?>
<?php include template('member', 'footer'); ?>