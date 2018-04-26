<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
  <script src="layer/layer.js"></script>
  <script src="layui/layui.js"></script>

<div class="border"></div>
<div class="border"></div>
<div class="border"></div>
<style>
	.con .lis p{ margin:10px 0}
	.con .list .kuang{ margin:20px 9% !important}
	.con .lis p span{  color: #0074E4}
	.scpz input{ display: none}
	.scpz img{ width: 100%; height: 130px;}
</style>
<div class="con">
	<div class="maincon maincon1" style="display:block">
		<div class="lis">
        	<p class="padding15">UID：<?php echo $memberinfo['userid'];?></p><div class="border"></div>
        	<p class="padding15">姓名：<?php if($memberinfos['truename']) { ?><?php echo $memberinfo['truename'];?><?php } else { ?><span onClick="sname(1)">添加</span><?php } ?></p><div class="border"></div>
        	<p class="padding15">银行卡：<?php echo $memberinfos['yhk'];?> <span onClick="sname(2)">修改</span></p><div class="border"></div>
        	<p class="padding15">开户行：<?php echo $memberinfos['khh'];?> <span onClick="sname(3)">修改</span></p><div class="border"></div>
        	<p class="padding15">支付宝：<?php echo $memberinfos['zfb'];?> <span onClick="sname(4)">修改</span></p><div class="border"></div>
        	<p class="padding15">实名认证：<?php if($memberinfo['vip']) { ?>认证成功<?php } else { ?><?php if($memberinfos['sfz1'] && $memberinfos['sfz2']) { ?>实名认证审核中<?php } else { ?>未认证<?php } ?><?php } ?></p><div class="border"></div>
        </div>
        <div class="list">
			<div class="scpz">
            	<div class="kuang fl"  id="test1">
               	<?php if($memberinfos['sfz1']) { ?>
               	<img src="/<?php echo $memberinfos['sfz1'];?>">
               	<?php } else { ?>
                	<div class="kcon1">
                    	<p class="text-center size12">+</p>
                    	<p class="text-center size12" id="demo1">上传身份证正面</p>
                    </div>
                 <?php } ?>
                </div>
            	<div class="kuang fl" id="test2">
               	<?php if($memberinfos['sfz2']) { ?>
               	<img src="/<?php echo $memberinfos['sfz2'];?>">
               	<?php } else { ?>
                	<div class="kcon1">
                    	<p class="text-center size12">+</p>
                    	<p class="text-center size12" id="demo1">上传身份证反面</p>
                    </div>
                 <?php } ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>

    </div>
</div>
<?php if(!$memberinfo['vip']) { ?>
<script>
layui.use('upload', function(){
  var $ = layui.jquery
  ,upload = layui.upload;
  
  //普通图片上传
  var uploadInst = upload.render({
		elem: '#test1'
	  ,data: {type:9} 
		,acceptMime: 'image/*'
		,ext: 'jpg|png|gif'
		,size: 2048 //限制文件大小，单位 KB
		,url: '/index.php?m=member&a=sys'
		,before: function(obj){
      //预读本地文件示例，不支持ie8
      obj.preview(function(index, file, result){
       // $('#demo1').attr('src', result); //图片链接（base64）
		  $('#test1').html("<img src='"+result+"'>");
      });
    }
    ,done: function(res){
      //如果上传失败
      if(res.code > 0){
        return layer.msg('上传失败，请重试！'+res.msg);
      }
      //上传成功
    }
    ,error: function(){
        return layer.msg('上传失败，请重试1！');
    }
  });
  var uploadInst1 = upload.render({
		elem: '#test2'
	  ,data: {type:10} 
		,acceptMime: 'image/*'
		,ext: 'jpg|png|gif'
		,size: 2048 //限制文件大小，单位 KB
		,url: '/index.php?m=member&a=sys'
		,before: function(obj){
      //预读本地文件示例，不支持ie8
      obj.preview(function(index, file, result){
       // $('#demo1').attr('src', result); //图片链接（base64）
		  $('#test2').html("<img src='"+result+"'>");
      });
    }
    ,done: function(res){
      //如果上传失败
      if(res.code > 0){
        return layer.msg('上传失败，请重试！');
      }
      //上传成功
    }
    ,error: function(){
        return layer.msg('上传失败，请重试！');
    }
  });
  

  
});
</script>
<?php } else { ?>
<script>
$("#test2").click(function(){
	layer.msg("您已实名认证成功", {icon: 1});
});
$("#test1").click(function(){
	layer.msg("您已实名认证成功", {icon: 1});
});
</script>
<?php } ?>
<script>
function sname(id){
	if(id==1){
		var msgy = '姓名：<input type="text" value="" placeholder="请输入真实姓名" class="sdat" name="suos" ><br>姓名一但设置，无法更改！';
		var msg  = "请输入真实姓名";
	}
	if(id==2){
		var msgy = '银行卡：<input type="text" value="<?php echo $memberinfo['yhk'];?>" placeholder="请输入银行卡卡号" class="sdat" name="suos" >';
		var msg  = "请输入银行卡卡号";
	}
	if(id==3){
		var msgy = '开户行：<input type="text" value="<?php echo $memberinfo['khh'];?>" placeholder="请输入开户行" class="sdat" name="suos" >';
		var msg  = "请输入开户行";
	}
	if(id==4){
		var msgy = '支付宝：<input type="text" value="<?php echo $memberinfo['zfb'];?>" placeholder="请输入支付宝账户" class="sdat" name="suos" >';
		var msg  = "请输入支付宝账号";
	}
		layer.confirm(msgy, 
		{
			btn: ['确认更新','取消'], //按钮
			shade: false, //不显示遮罩
			title:'账户设置'
		}, function(index){
			var suos = $('.sdat').val();
			if(!suos){
				layer.msg(msg, {icon: 2});
				return false;
			}
			$.post("index.php?m=member&a=sys", {
				type : id,
				suos : suos
			}, function (data) {
				if (data.stat == 1) {
					layer.msg(data.msg, {icon: 1});
					window.setTimeout("window.location='index.php?m=member&a=sys'", 1000);
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