<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
  <script src="layer/layer.js"></script>
<style>
	.sell-table ul li{ width: 25% !important}
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
<div class="rule1">
    <div class="rule">
        <p class="size16 white">���׹���</p>
        <p class="size12 white">200öΪ1�֣��������1�֣���ֱ߳���10%��ƥ��ɹ�������120������֧��������ȡ�����ף���������δ��ʱ֧���˺Ž�������</p>
    </div>
</div>
<div class="sell_submit">
    <form class="form-inline">
      <div class="form-group">
        <div class="input-group">
          <input type="text" class="form-control sellinput" id="num" placeholder="��������">
          <div class="input-group-addon submit white" onClick="sell(1)">����</div>
        </div>
      </div>
    </form>
</div>
<div class="border"></div>
<div class="border"></div>
<div class="border"></div>
<div class="sell-table">
	<ul>
    	<li class="fl">TA��</li>
    	<li class="fl">����</li>
    	<li class="fl">�ѳɽ�</li>
    	<li class="fl">����</li>
        <div class="clear"></div>
    </ul>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=d4d25048e702a149eedb69f042e02e86&sql=SELECT+a.%2A%2Cb.truename+FROM+v9_trade+a%2Cv9_member_detail+b+WHERE+a.username+%3D+b.userid+and+a.type+%3D+1+and+a.status+%21%3D3+and++a.status+%21%3D0+order+by+a.price+asc%2Ca.id+desc++&num=10&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">�༭</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT a.*,b.truename FROM v9_trade a,v9_member_detail b WHERE a.username = b.userid and a.type = 1 and a.status !=3 and  a.status !=0 order by a.price asc,a.id desc   LIMIT 10");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$info = $a;unset($a);?> 
<?php $n=1;if(is_array($info)) foreach($info AS $r) { ?>
    <div class="border"></div>
	<ul>
    	<li class="fl"><?php echo $r['truename'];?></li>
    	<li class="fl"><?php echo $r['title'];?></li>
    	<li class="fl"><?php echo $r['num'];?></li>
    	<li class="fl"><?php echo $r['price'];?></li>
        <div class="clear"></div>
    </ul>
<?php $n++;}unset($n); ?>  
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    <div class="border"></div>
</div>
<div class="hei40"></div>
<script>
function sell(id){
	var num = $('#num').val();
	if(!num){
		layer.msg("�����뽻������", {icon: 2});
		return false;
	}
	if(num<200){
		layer.msg("��ͽ�����Ϊ200", {icon: 2});
		return false;
	}
	if(num%200){
		layer.msg("����������Ϊ200�ı���", {icon: 2});
		return false;
	}

	$.post("index.php?m=member&a=trade1", {
		type : id,
		num : num
	}, function (data) {
		if (data.stat == 1) {
			layer.msg(data.msg, {icon: 1});
			window.setTimeout("window.location='index.php?m=member&a=trade_my'", 1000);
		} else {
			layer.msg(data.msg, {icon: 2});
		}
	}, "json");
		

	
	
	
	
	
	
	
	
	
}
	
	
	
	
</script>

<?php include template('member', 'footer'); ?>