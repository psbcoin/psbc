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
        	<p class="padding15">UID��<?php echo $memberinfo['userid'];?></p><div class="border"></div>
        	<p class="padding15">������<?php if($memberinfos['truename']) { ?><?php echo $memberinfo['truename'];?><?php } else { ?><span onClick="sname(1)">����</span><?php } ?></p><div class="border"></div>
        	<p class="padding15">���п���<?php echo $memberinfos['yhk'];?> <span onClick="sname(2)">�޸�</span></p><div class="border"></div>
        	<p class="padding15">�����У�<?php echo $memberinfos['khh'];?> <span onClick="sname(3)">�޸�</span></p><div class="border"></div>
        	<p class="padding15">֧������<?php echo $memberinfos['zfb'];?> <span onClick="sname(4)">�޸�</span></p><div class="border"></div>
        	<p class="padding15">ʵ����֤��<?php if($memberinfo['vip']) { ?>��֤�ɹ�<?php } else { ?><?php if($memberinfos['sfz1'] && $memberinfos['sfz2']) { ?>ʵ����֤�����<?php } else { ?>δ��֤<?php } ?><?php } ?></p><div class="border"></div>
        </div>
        <div class="list">
			<div class="scpz">
            	<div class="kuang fl"  id="test1">
               	<?php if($memberinfos['sfz1']) { ?>
               	<img src="/<?php echo $memberinfos['sfz1'];?>">
               	<?php } else { ?>
                	<div class="kcon1">
                    	<p class="text-center size12">+</p>
                    	<p class="text-center size12" id="demo1">�ϴ�����֤����</p>
                    </div>
                 <?php } ?>
                </div>
            	<div class="kuang fl" id="test2">
               	<?php if($memberinfos['sfz2']) { ?>
               	<img src="/<?php echo $memberinfos['sfz2'];?>">
               	<?php } else { ?>
                	<div class="kcon1">
                    	<p class="text-center size12">+</p>
                    	<p class="text-center size12" id="demo1">�ϴ�����֤����</p>
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
  
  //��ͨͼƬ�ϴ�
  var uploadInst = upload.render({
		elem: '#test1'
	  ,data: {type:9} 
		,acceptMime: 'image/*'
		,ext: 'jpg|png|gif'
		,size: 2048 //�����ļ���С����λ KB
		,url: '/index.php?m=member&a=sys'
		,before: function(obj){
      //Ԥ�������ļ�ʾ������֧��ie8
      obj.preview(function(index, file, result){
       // $('#demo1').attr('src', result); //ͼƬ���ӣ�base64��
		  $('#test1').html("<img src='"+result+"'>");
      });
    }
    ,done: function(res){
      //����ϴ�ʧ��
      if(res.code > 0){
        return layer.msg('�ϴ�ʧ�ܣ������ԣ�'+res.msg);
      }
      //�ϴ��ɹ�
    }
    ,error: function(){
        return layer.msg('�ϴ�ʧ�ܣ�������1��');
    }
  });
  var uploadInst1 = upload.render({
		elem: '#test2'
	  ,data: {type:10} 
		,acceptMime: 'image/*'
		,ext: 'jpg|png|gif'
		,size: 2048 //�����ļ���С����λ KB
		,url: '/index.php?m=member&a=sys'
		,before: function(obj){
      //Ԥ�������ļ�ʾ������֧��ie8
      obj.preview(function(index, file, result){
       // $('#demo1').attr('src', result); //ͼƬ���ӣ�base64��
		  $('#test2').html("<img src='"+result+"'>");
      });
    }
    ,done: function(res){
      //����ϴ�ʧ��
      if(res.code > 0){
        return layer.msg('�ϴ�ʧ�ܣ������ԣ�');
      }
      //�ϴ��ɹ�
    }
    ,error: function(){
        return layer.msg('�ϴ�ʧ�ܣ������ԣ�');
    }
  });
  

  
});
</script>
<?php } else { ?>
<script>
$("#test2").click(function(){
	layer.msg("����ʵ����֤�ɹ�", {icon: 1});
});
$("#test1").click(function(){
	layer.msg("����ʵ����֤�ɹ�", {icon: 1});
});
</script>
<?php } ?>
<script>
function sname(id){
	if(id==1){
		var msgy = '������<input type="text" value="" placeholder="��������ʵ����" class="sdat" name="suos" ><br>����һ�����ã��޷����ģ�';
		var msg  = "��������ʵ����";
	}
	if(id==2){
		var msgy = '���п���<input type="text" value="<?php echo $memberinfo['yhk'];?>" placeholder="���������п�����" class="sdat" name="suos" >';
		var msg  = "���������п�����";
	}
	if(id==3){
		var msgy = '�����У�<input type="text" value="<?php echo $memberinfo['khh'];?>" placeholder="�����뿪����" class="sdat" name="suos" >';
		var msg  = "�����뿪����";
	}
	if(id==4){
		var msgy = '֧������<input type="text" value="<?php echo $memberinfo['zfb'];?>" placeholder="������֧�����˻�" class="sdat" name="suos" >';
		var msg  = "������֧�����˺�";
	}
		layer.confirm(msgy, 
		{
			btn: ['ȷ�ϸ���','ȡ��'], //��ť
			shade: false, //����ʾ����
			title:'�˻�����'
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