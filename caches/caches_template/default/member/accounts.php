<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
<style>
	.jytop2 a{ color: #fff}
</style>

<div class="jytop1">
    <div class="jytop2">
        <div class="img">
            <img class="fl" src="images/logo1.png" width="50px">
            <div class="fl" style="margin-left:15px">
            	<p class="size12">手机：<?php echo $memberinfo['mobile'];?></p>
            	<p class="size12">UID：<?php echo $memberinfo['userid'];?></p>
            </div>
            <div class="clear"></div>
        </div>
        <p class="p1 size16">可用币量： <?php echo $memberinfo['amount'];?></p>
    </div>
</div>
<div class="wdmr-table">
	<table class="table">
    	<tr>
            <th class="active text-center">金额</th>
            <th class="active text-center">时间</th>
            <th class="active text-center">备注</th>
        </tr>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=e277eb52de6e6325599180bc889a83b9&sql=SELECT+%2A+FROM+v9_pay_spend+WHERE++userid+%3D%27%24userid%27+order+by+id+desc+&num=20&return=info&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$pagesize = 20;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$r = $get_db->sql_query("SELECT COUNT(*) as count FROM  v9_pay_spend WHERE  userid ='$userid' order by id desc ");$s = $get_db->fetch_next();$pages=pages($s['count'], $page, $pagesize, $urlrule);$r = $get_db->sql_query("SELECT * FROM v9_pay_spend WHERE  userid ='$userid' order by id desc  LIMIT $offset,$pagesize");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$info = $a;unset($a);?> 
<?php $n=1;if(is_array($info)) foreach($info AS $r) { ?>
    	<tr>
            <td class="active<?php if($r[value] <0) { ?> red<?php } ?>"><?php echo $r['value'];?></td>
            <td class="active"><?php echo date("Y-m-d H:i",$r[creat_at]);?></td>
            <td class="active"><?php echo $r['msg'];?></td>
        </tr>
<?php $n++;}unset($n); ?>  
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </table>
</div>
<div class="page">
    <?php echo $pages;?>
</div>
<div class="hei40"></div>

<?php include template('member', 'footer'); ?>