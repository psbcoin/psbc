<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
        <script src="js/echarts.min.js" type="text/javascript"></script>

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
        <p class="p2" style="font-size: 28px"><?php echo $data1['title'];?>��$<?php echo $data1['usd'];?>��</p>
    </div>
</div>
<p class="text-center size16" style="margin:5px 0"><a href="<?php echo $gonggao['url'];?>"><?php echo $gonggao['title'];?></a></p>
<div class="border"></div>
<div class="border"></div>
<div class="border"></div>
<ul class="mmnav">
	<li><a class="btn btn-info" href="index.php?m=member&a=trade_buy">����PSBC</a></li>
	<li><a class="btn btn-info" href="index.php?m=member&a=trade_my">�ҵĽ���</a></li>
	<li><a class="btn btn-info" href="index.php?m=member&a=trade">����PSBC</a></li>
    <div class="clear"></div>
</ul>
<ul class="mmnav sele1">
	<li class="active fl"><a class="">��������</a></li>
	<li class="fl"><a class="" href="/list-7-1.html">�г���̬</a></li>
    <div class="clear"></div>
</ul>
<div class="padding15" id="chart" style="width: 100%; height: 300px;">
	</div>
</div>
<div class="hei40"></div>
   
    <script type="text/javascript">
        // ����׼���õ�dom����ʼ��echartsʵ��
        var myChart = echarts.init(document.getElementById('chart'));

        // ָ��ͼ��������������
		var option = {
			xAxis: {
				type: 'category',
				data: [<?php echo $datay;?>]
			},
			yAxis: {
				type: 'value'
			},
			series: [{
				data: [<?php echo $datax;?>],
				type: 'line',
				label: {
            normal: {
                position: 'top',
                show: true
            }
        }
			}]
		};

        // ʹ�ø�ָ�����������������ʾͼ��
        myChart.setOption(option);
    </script>
<?php include template('member', 'footer'); ?>