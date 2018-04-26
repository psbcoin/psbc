<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
  <script src="layer/layer.js"></script>

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
	<li<?php if($ac==3) { ?> class="active"<?php } ?> id="t3"><a href="index.php?m=member&a=trade_my&ac=3">交易中</a></li>
	<li<?php if($ac==4) { ?> class="active"<?php } ?> class="" id="t4"><a href="index.php?m=member&a=trade_my&ac=4">已完成</a></li>
    <div class="clear"></div>
</ul>
<?php if($ac==3 || $ac==4) { ?>
<div class="wdmc-table" id="c1">
	<ul>
    	<li class="fl">类型</li>
    	<li class="fl">数量</li>
    	<li class="fl">单价</li>
    	<li class="fl">状态</li>
        <div class="clear"></div>
    </ul>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=34486c961cf9f10b5bcc05141241f125&sql=SELECT+%2A+FROM+v9_trade_log+WHERE++%28uid1+%3D+%27%24userid%27+or+uid2+%3D+%27%24userid%27%29+%24where++order+by+id+desc++&num=10&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM v9_trade_log WHERE  (uid1 = '$userid' or uid2 = '$userid') $where  order by id desc   LIMIT 10");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$info = $a;unset($a);?> 
<?php $n=1;if(is_array($info)) foreach($info AS $r) { ?>
    <div class="border"></div>
	<ul>
    	<li class="fl">
    	<?php if($r[uid1]==$userid) { ?>
    	<span class="buy123">买</span>
    	<?php } else { ?>
    	<span class="sell123">卖</span>
    	<?php } ?>
    	</li>
    	<li class="fl"><?php echo $r['title'];?></li>
    	<li class="fl"><?php echo $r['pri'];?></li>
    	<li class="fl">
      	<?php if($r[status]==1) { ?>
     交易中
      	<?php } elseif ($r[status]==2) { ?>
      	已完成
      	<?php } else { ?>
      	已撤销
      	<?php } ?>
       <a href="index.php?m=member&a=trade_log&id=<?php echo $r['id'];?>">详情</a></li>
        <div class="clear"></div>
    </ul>
<?php $n++;}unset($n); ?>  
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    <div class="border"></div>
</div>
<?php } else { ?>
<div class="wdmc-table" id="c1">
	<ul>
    	<li class="fl">数量</li>
    	<li class="fl">已成交</li>
    	<li class="fl">单价</li>
    	<li class="fl">操作</li>
        <div class="clear"></div>
    </ul>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=2188b98f7095eeca49e6f3580dbc0b5c&sql=SELECT+%2A+FROM+v9_trade+WHERE++username+%3D+%27%24userid%27+and+status+%21%3D0+%24where++order+by+id+desc++&num=10&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM v9_trade WHERE  username = '$userid' and status !=0 $where  order by id desc   LIMIT 10");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$info = $a;unset($a);?> 
<?php $n=1;if(is_array($info)) foreach($info AS $r) { ?>
    <div class="border"></div>
	<ul>
    	<li class="fl">
    	<?php if($r[type]==1) { ?>
    	<span class="buy123">买</span>
    	<?php } else { ?>
    	<span class="sell123">卖</span>
    	<?php } ?><?php echo $r['title'];?>
    	</li>
    	<li class="fl"><?php echo $r['num'];?></li>
    	<li class="fl"><?php echo $r['price'];?></li>
    	<li class="fl"><a onClick="che('<?php echo $r['id'];?>')">撤销</a></li>
        <div class="clear"></div>
    </ul>
<?php $n++;}unset($n); ?>  
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    <div class="border"></div>
</div>
<?php } ?>
<div class="hei40"></div>
<script>
function che(id){

		layer.confirm("确定要撤销此订单吗？", 
		{
			btn: ['确认撤销','取消'], //按钮
			shade: false, //不显示遮罩
			title:'确认信息'
		}, function(index){
			$.post("index.php?m=member&a=trade_my", {
				type : id,
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

<?php include template('member', 'footer'); ?>