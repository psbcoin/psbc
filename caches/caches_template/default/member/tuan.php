<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
  <script src="layer/layer.js"></script>
<script type="text/javascript" src="js/jquery.qrcode.min.js"></script>
<div class="jytop1">
    <div class="jytop2" style="padding:20px">
        <div class="img1">
            <div class="fl">
            	<p class="size30"><?php echo $tuannum;?></p>
            	<p class="size12">直推</p>
            </div>
            <div class="fl">
            	<p class="size30" style="font-size: 24px !important"><?php echo $tuanpris;?></p>
            	<p class="size12">社区算力</p>
            </div>
            <div class="fl">
            	<div class="size16" style="text-align: center" ><div id="codeaa" style="width: 60px; height: 60px; margin: 0 auto; background: #fff"></div></div>
            	<p class="size12">扫一扫注册</p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#codeaa').qrcode({
		render:'table',
		text:"<?php echo $url;?>",
		size: "60"
		
    }); //任意字符串
	function copyUrl2()
{
var Url2=document.getElementById("urls");
Url2.select(); // 选择对象
document.execCommand("Copy"); // 执行浏览器复制命令
	layer.msg("复制成功", {icon: 1});
}
</script>
<style>
	.form-regist{ padding:5px 15px}
	.form-regist .input-yzm{border:1px solid #999; border-radius:0}
	.form-regist button{border:1px solid #999; border-left:none; border-radius:0; color:#fff !important; padding:7px 12px}
</style>
<div class="form form-regist">
    <form>
        <div class="form-group">
            <input type="text" class="form-control fl input-yzm" id="urls"  value="<?php echo $url;?>">
            <button type="button" class="btn btn-default fr submit1 backgroundmain" onClick="copyUrl2()" >一键复制</button>
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
            <th class="active text-center">UID</th>
            <th class="active text-center">姓名</th>
            <th class="active text-center">电话</th>
            <th class="active text-center">注册时间</th>
        </tr>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=57cf3d311dd75f68dc44219eb3e6e22a&sql=SELECT+%2A+FROM+v9_member+WHERE+tjuser+%3D+%27%24userid%27&num=20&return=info&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$pagesize = 20;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$r = $get_db->sql_query("SELECT COUNT(*) as count FROM  v9_member WHERE tjuser = '$userid'");$s = $get_db->fetch_next();$pages=pages($s['count'], $page, $pagesize, $urlrule);$r = $get_db->sql_query("SELECT * FROM v9_member WHERE tjuser = '$userid' LIMIT $offset,$pagesize");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$info = $a;unset($a);?> 
<?php $n=1;if(is_array($info)) foreach($info AS $r) { ?>
    	<tr>
            <td class="active"><?php echo $r['userid'];?></td>
            <td class="active"><?php echo $r['sname'];?></td>
            <td class="active"><?php echo $r['mobile'];?></td>
            <td class="active"><?php echo date("Y-m-d",$r[regdate]);?></td>
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