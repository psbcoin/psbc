<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
  <script src="layer/layer.js"></script>
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
        <div class="rule">
        	<p class="size14">���ֹ���</p>
        	<p class="size12">
        	1������ʱ��Ϊ6���£�ÿ����ϢΪ1%��<br>
        	2������ʱ��Ϊ3���£�ÿ����ϢΪ0.5%��<br>
			3�����1000����Ϣֱ�ӿ��ã�һ������ʱ��δ���޷�������</p>
        </div>
    </div>
</div>
<style>
	.rule{ color:#fff;}
	.jytop2{ color:#666; background:#fff}
	.jytop2 .img{ margin-bottom:10px}
	.jytop2 .p1{ color:#333; font-weight:bolder; margin-bottom:15px}
	.form-regist{ padding:5px 15px}
	.form-regist .input-yzm{border:1px solid #999; border-radius:0}
	.form-regist button{border:1px solid #999; border-left:none; border-radius:0; color:#fff !important; padding:7px 12px}
</style>
       
</label>
<script>
function suo(){
	var num = $("#nums").val();
	var pri = <?php echo $memberinfo['amount'];?>;
	if(!num){
		layer.msg("����������������", {icon: 2});
		return false;
	}
	if(num<1000){
		layer.msg("�������������1000��", {icon: 2});
		return false;
	}
	if(pri<num){
		layer.msg("���ñ������㣡", {icon: 2});
		return false;
	}
	var msgy = '�������ڣ�<label  class="suos" ><input type="radio" value="180"name="suos" checked>6����1%</label> <label  class="suos" ><input type="radio"  name="suos" value="90" >3����0.5%</label>  <br>����������'+num;
		layer.confirm(msgy, 
		{
			btn: ['ȷ������','ȡ��'], //��ť
			shade: false, //����ʾ����
			title:'��ȷ����������/����'
		}, function(index){
			var suos = $('.suos input:radio:checked').val();
			$.post("index.php?m=member&a=suo", {
				type : 1,
				num : num,
				suos : suos
			}, function (data) {
				if (data.stat == 1) {
					layer.msg(data.msg, {icon: 1});
					window.setTimeout("window.location='index.php?m=member&a=suo'", 1000);
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
<div class="form form-regist">
    <form>
        <div class="form-group">
            <input type="text" class="form-control fl input-yzm" id="nums" placeholder="�����������������1000��" >
            <button type="button" class="btn btn-default fr submit1 backgroundmain" onClick="suo()">һ������</button>
            <div class="clear"></div>
      </div>
  </form>
</div>
<div class="border"></div>
<div class="border"></div>
<div class="border"></div>
<div class="wdmr-table">
	<table class="table">
    	<tr>
            <th class="active text-center">����</th>
            <th class="active text-center">������</th>
            <th class="active text-center">����</th>
            <th class="active text-center">����ʱ��</th>
        </tr>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f51a788bab4c786e493d96146d7e97&sql=SELECT+%2A+FROM+v9_suocang+WHERE+username+%3D+%27%24userid%27+order+by+id+desc&num=20&return=info&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">�༭</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$pagesize = 20;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$r = $get_db->sql_query("SELECT COUNT(*) as count FROM  v9_suocang WHERE username = '$userid' order by id desc");$s = $get_db->fetch_next();$pages=pages($s['count'], $page, $pagesize, $urlrule);$r = $get_db->sql_query("SELECT * FROM v9_suocang WHERE username = '$userid' order by id desc LIMIT $offset,$pagesize");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$info = $a;unset($a);?> 
<?php $n=1;if(is_array($info)) foreach($info AS $r) { ?>
    	<tr>
            <td class="active"><?php echo $r['title'];?></td>
            <td class="active"><?php echo $r['shouyi'];?></td>
            <td class="active"><?php echo $r['days'];?>/<?php echo $r['day'];?></td>
            <td class="active"><?php echo date("Y-m-d",$r[inputtime]);?></td>
        </tr>
<?php $n++;}unset($n); ?>  
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </table>
</div>
<div class="hei40"></div>

<?php include template('member', 'footer'); ?>