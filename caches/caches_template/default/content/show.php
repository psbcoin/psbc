<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>

<style>
	.list .n1{ padding:8px 15px;}
	.list .n2{ padding:8px 15px; background:#f2f4f6}
	.container-fluid  a{ padding:0 0 2px !important}
	.ty li{ padding:5px 0; color:#7a797a !important}
	.ty li a{ color:#7a797a !important}
</style>
<div class="border"></div><div class="border"></div><div class="border"></div>
    <div class="ty">
        <ul class="list-unstyled">
            <li>
                <div class="container-fluid">
                	<div class="">
                    	<a class="size16"><?php echo $title;?></a>
                        <a class="size10"><?php echo $inputtime;?></a>
                    </div>
                </div>
            </li>
            <li>
                <div class="container-fluid">
                	<div class="">
                    	<?php echo $content;?>
                    </div>
                </div>
            </li>
        </ul>
    </div>
<?php include template('member', 'footer'); ?>