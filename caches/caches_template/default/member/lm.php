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
			<p class="p10">�ֻ��ţ�<?php echo $memberinfo['username'];?></p>
			<p class="p10">UID��<?php echo $memberinfo['userid'];?></p>
        </div>
        <h3>��<?php echo $memberinfo['amount'];?> PSBC</h3>
    </div>
</div>
<div class="rule1">
    <div class="rule">
        <p class="size16 white">��������</p>
        <p class="size12 white">��ʹͶ���ˣ�10��öPSBC</p>
        <p class="size12 white">��Ӫ���ܲã�50��öPSBC</p>
        <p class="size12 white">ԭʼ�ɶ���100��öPSBC</p>
    </div>
</div>
<div class="sell_submit">
    <form class="form-inline">
      <div class="form-group">
        <div class="input-group">
          <input type="text" class="form-control sellinput" id="exampleInputAmount" placeholder="��������" style="display: none">
          <select class="form-control sellinput" id="nums" onchange="add()">
          	<option value="0">ѡ������</option>
          	<option value="100000">��ʹͶ����</option>
          	<option value="500000">��Ӫ���ܲ�</option>
          	<option value="1000000">ԭʼ�ɶ�</option>
          </select>
          <div class="input-group-addon submit white" onClick="add()">��������</div>
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
		<span>��ţ�<?php echo $orderid;?></span>
	</div>
	<div class="lm2">����ƾ֤</div>
	<table border="1" bordercolor="#ccc" width="100%">
		<tr>
			<td colspan="3" class="tb1">��Ա����<?php echo $memberinfo['username'];?><span>���ڣ�<?php echo $date;?></span></td>
		</tr>
		<tr>
			<td width="40%">���˵ȼ�</td>
			<td>PSBC����</td>
			<td width="20%">˵��</td>
		</tr>
		<tr>
			<td><?php echo $title;?></td>
			<td style="font-size: 16px;"><?php echo $num;?>PSBC</td>
			<td rowspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">��ע����������Ϊ��Ը���ˣ�һ��ȷ�ϣ���;�޷�������Э����Ч��PSBC����Լ����ʱ�䰴�涨����<?php if($num==100000) { ?>15<?php } elseif ($num==500000) { ?>100<?php } elseif ($num==1000000) { ?>300<?php } ?>����ָ����Ǯ����ַ��</td>
		</tr>
	</table>
	<div class="lm3">PSBC�й����������£�<span>�����ˣ�<?php echo $truename;?>��<?php echo $memberinfo['username'];?>��</span></div>
	<div class="lm4"><img src="images/gz.png"></div>

</div>
          <div onClick="uplm('<?php echo $num;?>')" style="background: #5b8cf8; width: 80%; margin: 10px 10%; padding: 8px 0; display: block; text-align: center; font-size: 16px; color: #fff; margin-bottom: 60px; float: left; border-radius: 5px;">ȷ����������</div>
<?php } else { ?>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=a42966a9a48e1168ac63668057f4fd62&sql=SELECT+%2A+FROM+v9_lm+WHERE+username+%3D+%27%24userid%27++order+by+id+desc++&num=100&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">�༭</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM v9_lm WHERE username = '$userid'  order by id desc   LIMIT 100");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$info = $a;unset($a);?> 
<?php $n=1;if(is_array($info)) foreach($info AS $r) { ?>
<?php
$startdate = time();
$enddate = $r['inputtime']+100*24*3600;
$date=floor(($enddate-$startdate)/86400);
$hour=floor(($enddate-$startdate)%86400/3600);
$minute=date("i",($enddate-$startdate));
$minute=date("i",($enddate-$startdate));
$second=date("s",($enddate-$startdate));
$she = $date."�� ".$hour.":".$minute.":".$second;
?>
<div class="lm">
	<div class="lm1">
		<img src="images/logo.png" >
		<span>��ţ�<?php echo date("YmdHis",$r[inputtime]);?><?php echo $r['id'];?></span>
	</div>
	<div class="lm2">����ƾ֤<br>��ʣ <?php echo $she;?></div>
	<table border="1" bordercolor="#ccc" width="100%">
		<tr>
			<td colspan="3" class="tb1">��Ա����<?php echo $memberinfo['username'];?><span>���ڣ�<?php echo date("Y-m-d",$r[inputtime]);?></span></td>
		</tr>
		<tr>
			<td width="40%">���˵ȼ�</td>
			<td>PSBC����</td>
			<td width="20%">˵��</td>
		</tr>
		<tr>
			<td><?php echo $r['title'];?></td>
			<td style="font-size: 16px;"><?php echo $r['num'];?>PSBC</td>
			<td rowspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">��ע����������Ϊ��Ը���ˣ�һ��ȷ�ϣ���;�޷�������Э����Ч��PSBC����Լ����ʱ�䰴�涨����<?php if($r[num]==100000) { ?>15<?php } elseif ($r[num]==500000) { ?>100<?php } elseif ($r[num]==1000000) { ?>300<?php } ?>����ָ����Ǯ����ַ��</td>
		</tr>
	</table>
	<div class="lm3">PSBC�й����������£�<span>�����ˣ�<?php echo $truename;?>��<?php echo $memberinfo['username'];?>��</span></div>
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
		layer.msg("��ѡ�����˵ȼ�", {icon: 2});
		return false;
	}
	if(id >pri){
		layer.msg("��������", {icon: 2});
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