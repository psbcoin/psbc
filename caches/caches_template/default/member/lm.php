<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>

  <script src="layer/layer.js"></script>

<style>
	.jytop{ margin-bottom: 10px;}
	.p10{ width: 60%; text-align: left; margin: 0 0 0 10px;}
	.jytop .img img{ float: left;}
	.lm{ border: #ccc 1px solid; padding: 1%; margin: 2%; margin-bottom: 10px;}
	.lm .lm1{ width: 50%; float: left; margin-bottom: 10px;}
	.lm .lm1 img{ width: 30px; float: left}
	.lm .lm1 span{ float: left; width: 100%; display: block}
	.lm .lm2{ width: 48%; float: right; text-align: right; color: #666}
	.lm table td{ padding: 5px;}
	.lm .tb1 span{ float: right}
	.lm .lm3 span{ float: right}
	.lm .lm4 img{ width: 100px; margin-top:-85px; margin-left: 60px; }
	</style>
<div class="jytop1">
    <div class="jytop">
        <div class="img">
            <img src="images/logo.png" width="40px">
			<p class="p10">手机号：<?php echo $memberinfo['username'];?></p>
			<p class="p10">UID：<?php echo $memberinfo['userid'];?></p>
        </div>
        <h3>余额：<?php echo $memberinfo['amount'];?> PSBC</h3>
    </div>
</div>
<div class="rule1">
    <div class="rule">
        <p class="size16 white">联盟中心</p>
        <p class="size12 white">天使投资人：10万枚PSBC</p>
        <p class="size12 white">运营副总裁：50万枚PSBC</p>
        <p class="size12 white">原始股东：100万枚PSBC</p>
    </div>
</div>
<div class="sell_submit">
    <form class="form-inline">
      <div class="form-group">
        <div class="input-group">
          <input type="text" class="form-control sellinput" id="exampleInputAmount" placeholder="卖出手数" style="display: none">
          <select class="form-control sellinput" id="nums" onchange="add()">
          	<option value="0">选择联盟</option>
          	<option value="100000">天使投资人</option>
          	<option value="500000">运营副总裁</option>
          	<option value="1000000">原始股东</option>
          </select>
          <div class="input-group-addon submit white" onClick="add()">加入联盟</div>
        </div>
      </div>
    </form>
</div>
<div class="border"></div>
<div class="border"></div>
<div class="border"></div>
<?php if($num) { ?>
<div class="lm">
	<div class="lm1">
		<img src="images/logo.png" >
		<span>编号：<?php echo $orderid;?></span>
	</div>
	<div class="lm2">联盟凭证</div>
	<table border="1" bordercolor="#ccc" width="100%">
		<tr>
			<td colspan="3" class="tb1">会员名：<?php echo $memberinfo['username'];?><span>日期：<?php echo $date;?></span></td>
		</tr>
		<tr>
			<td width="40%">联盟等级</td>
			<td>PSBC数量</td>
			<td width="20%">说明</td>
		</tr>
		<tr>
			<td><?php echo $title;?></td>
			<td style="font-size: 16px;"><?php echo $num;?>PSBC</td>
			<td rowspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">备注：联盟中心为自愿加盟，一经确认，中途无法解锁，协议生效后，PSBC将在约定的时间按规定拨币<?php if($num==100000) { ?>15<?php } elseif ($num==500000) { ?>100<?php } elseif ($num==1000000) { ?>300<?php } ?>万到你指定的钱包地址。</td>
		</tr>
	</table>
	<div class="lm3">PSBC中国社区（盖章）<span>申请人：<?php echo $truename;?>（<?php echo $memberinfo['username'];?>）</span></div>
	<div class="lm4"><img src="images/gz.png"></div>

</div>
          <div onClick="uplm('<?php echo $num;?>')" style="background: #5b8cf8; width: 80%; margin: 10px 10%; padding: 8px 0; display: block; text-align: center; font-size: 16px; color: #fff; margin-bottom: 60px; float: left; border-radius: 5px;">确定加入联盟</div>
<?php } else { ?>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=a42966a9a48e1168ac63668057f4fd62&sql=SELECT+%2A+FROM+v9_lm+WHERE+username+%3D+%27%24userid%27++order+by+id+desc++&num=100&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM v9_lm WHERE username = '$userid'  order by id desc   LIMIT 100");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$info = $a;unset($a);?> 
<?php $n=1;if(is_array($info)) foreach($info AS $r) { ?>
<?php
$startdate = time();
$enddate = $r['inputtime']+100*24*3600;
$date=floor(($enddate-$startdate)/86400);
$hour=floor(($enddate-$startdate)%86400/3600);
$minute=date("i",($enddate-$startdate));
$minute=date("i",($enddate-$startdate));
$second=date("s",($enddate-$startdate));
$she = $date."天 ".$hour.":".$minute.":".$second;
?>
<div class="lm">
	<div class="lm1">
		<img src="images/logo.png" >
		<span>编号：<?php echo date("YmdHis",$r[inputtime]);?><?php echo $r['id'];?></span>
	</div>
	<div class="lm2">联盟凭证<br>还剩 <?php echo $she;?></div>
	<table border="1" bordercolor="#ccc" width="100%">
		<tr>
			<td colspan="3" class="tb1">会员名：<?php echo $memberinfo['username'];?><span>日期：<?php echo date("Y-m-d",$r[inputtime]);?></span></td>
		</tr>
		<tr>
			<td width="40%">联盟等级</td>
			<td>PSBC数量</td>
			<td width="20%">说明</td>
		</tr>
		<tr>
			<td><?php echo $r['title'];?></td>
			<td style="font-size: 16px;"><?php echo $r['num'];?>PSBC</td>
			<td rowspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">备注：联盟中心为自愿加盟，一经确认，中途无法解锁，协议生效后，PSBC将在约定的时间按规定拨币<?php if($r[num]==100000) { ?>15<?php } elseif ($r[num]==500000) { ?>100<?php } elseif ($r[num]==1000000) { ?>300<?php } ?>万到你指定的钱包地址。</td>
		</tr>
	</table>
	<div class="lm3">PSBC中国社区（盖章）<span>申请人：<?php echo $truename;?>（<?php echo $memberinfo['username'];?>）</span></div>
	<div class="lm4"><img src="images/gz.png"></div>

</div>
<?php $n++;}unset($n); ?>  
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<div style="width: 100%; height: 80px; float: left"></div>
<?php } ?>
<script>

function add(){
	var id =    $("#nums").val();
	var pri = <?php echo $memberinfo['amount'];?>;
	pri = parseFloat(pri);
	if(id==0){
		layer.msg("请选择联盟等级", {icon: 2});
		return false;
	}
	if(id >pri){
		layer.msg("您的余额不足", {icon: 2});
		return false;
	}
	window.location='index.php?m=member&a=lm&nums='+id;
}
function uplm(id){
	$.post("index.php?m=member&a=uplm", {
		nums : id
	}, function (data) {
		if (data.stat == 1) {
			layer.msg(data.msg, {icon: 1});
			window.setTimeout("window.location='index.php?m=member&a=lm'", 1000);
		} else {
			layer.msg(data.msg, {icon: 2});
		}
	}, "json");
	
	
	
	
	
	
}
	
	
	
	
</script>

<?php include template('member', 'footer'); ?>