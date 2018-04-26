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
			<p class="p2" style="font-size: 28px; float: left; line-height: 77px; margin-left: 10px;"><?php echo $data['title'];?>（$<?php echo $data['usd'];?>）</p>
        </div>
    </div>
</div>

<ul class="mmnav">
	<li><a class="btn btn-info" href="index.php?m=member&a=trade_buy">买入PSBC</a></li>
	<li><a class="btn btn-info" href="index.php?m=member&a=trade_my">我的交易</a></li>
	<li><a class="btn btn-info" href="index.php?m=member&a=trade">卖出PSBC</a></li>
    <div class="clear"></div>
</ul>
<ul class="mmnav sele">
	<li<?php if($ac==1) { ?> class="active"<?php } ?> id="t1"><a href="index.php?m=member&a=trade_my&ac=1">我的买入</a></li>
	<li<?php if($ac==2) { ?> class="active"<?php } ?> id="t2"><a href="index.php?m=member&a=trade_my&ac=2">我的卖出</a></li>
	<li class="active" id="t3"><a href="index.php?m=member&a=trade_my&ac=3">交易中</a></li>
	<li<?php if($ac==4) { ?> class="active"<?php } ?> class="" id="t4"><a href="index.php?m=member&a=trade_my&ac=4">已完成</a></li>
    <div class="clear"></div>
</ul>
<div class="con">
	<div class="maincon maincon1" style="display:block">
        <ul>
        	<li class="fl size16 active">订单详情</li>
        	<li class="fl size16"><a href="index.php?m=member&a=trade_app&id=<?php echo $data1['id'];?>">申诉</a></li>
            <div class="clear"></div>
        </ul>
        <div class="list">
			<div class="size12 red">交易订单：<?php echo $data1['id'];?></div>
			<div class="size12 color33">交易数量：<?php echo $data1['title'];?></div>
			<div class="size12 color33">交易单价：<?php echo $data1['pri'];?></div>
			<div class="size12 color33">付款金额：<strong style="color: #FF0000; font-size: 16px;">￥<?php echo $data1['price'];?></strong></div>
			<div class="size12 color33">对方姓名：<?php echo $data1['name'];?></div>
			<div class="size12 color33">联系电话：<?php echo $data1['mobile'];?></div>
			<div class="size12 color33">支 付 宝：<?php echo $data1['zfb'];?></div>
			<div class="size12 color33">银 行 卡：<?php echo $data1['yhk'];?></div>
			<div class="size12 color33">开 户 行：<?php echo $data1['khh'];?></div>
			<?php if($data1[uptime]) { ?>
			<?php if(!$data1[tp2]) { ?><div class="size12 color33">剩余确认时间：<span id="timer"></span></div><?php } ?>
		   <?php } ?>
        </div>
        <div class="button">
			<div class="size12 color33 text-center" style="margin-bottom:5px">注：请仔细核对到账情况，一旦确认无法申诉</div>
       	<?php if($type==1) { ?>
        	<?php if(!$data1[tp1]) { ?>
        	<button class="btn btn-info" onClick="qds(1)">我已付款</button>
        	<?php } else { ?>
        	<button class="btn btn-info" style="background: #ccc; border: #ccc 1px solid">我已确认付款，等待卖家确认</button>
        	<?php } ?>
        <?php } else { ?>
        	<?php if(!$data1[tp1]) { ?>
				<button class="btn btn-info" style="background: #ccc; border: #ccc 1px solid">等待买家确认付款</button>
        	<?php } elseif ($data1[tp1]==1) { ?>
				<?php if(!$data1[tp2]) { ?>
				<button class="btn btn-info" onClick="qds(2)">我已收款</button>
				<?php } else { ?>
				<button class="btn btn-info" style="background: #ccc; border: #ccc 1px solid">交易完成</button>
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
		var msgy = '我已经完成付款，确认无误！';
		var msg  = "我已付款";
	}
	if(id==2){
		var msgy = '请仔细核对到账情况，一旦确认无法申诉！';
		var msg  = "我已收款";
	}
		layer.confirm(msgy, 
		{
			btn: [msg,'取消'], //按钮
			shade: false, //不显示遮罩
			title:'订单详情'
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
var intDiff = parseInt(<?php echo $data1['uptime'];?>);//倒计时总秒数量
function timer(intDiff){
    window.setInterval(function(){
    var day=0,
        hour=0,
        minute=0,
        second=0;//时间默认值        
    if(intDiff > 0){
        hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
        minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
        second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
    }
    if (minute <= 9) minute = '0' + minute;
    if (second <= 9) second = '0' + second;
    $('#timer').html(hour+'时'+minute+'分'+second+'秒');

    intDiff--;
    }, 1000);
} 
$(function(){
    timer(intDiff);
}); 
</script>
       <?php } ?>
<?php include template('member', 'footer'); ?>