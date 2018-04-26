<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>


<style>
	.list .n1{ padding:8px 15px;}
	.list .n2{ padding:8px 15px; background:#f2f4f6}
	.container-fluid .fl a{ padding:0 0 2px !important}
	.container-fluid .fr b{ width:10px; height:20px; display:block; font-size:30px}
	.ty li{ padding:5px 0}
</style>
<div class="border"></div><div class="border"></div><div class="border"></div>
    <div class="ty">
        <ul class="list-unstyled">
    	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f183793eb75ac8f19c56782367261d67&action=lists&catid=%24catid&num=20&order=listorder+desc%2Cid+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">±à¼­</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 20;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'listorder desc,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'listorder desc,id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <li>
                <div class="container-fluid">
                	<div class="fl">
                    	<a class="size16" href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a>
                        <a class="size10" href="<?php echo $r['url'];?>"><?php echo date("Y-m-d",$r[inputtime]);?></a>
                    </div>
                    <div class="fr">
                    	<b class="fa fa-angle-right"></b>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="border"></div>
            </li>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
        <div id="pages" class="text-c"><?php echo $pages;?></div>
    </div>

<?php include template('member', 'footer'); ?>