<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
        <script src="js/echarts.min.js" type="text/javascript"></script>

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
        <p class="p2" style="font-size: 28px"><?php echo $data1['title'];?>（$<?php echo $data1['usd'];?>）</p>
    </div>
</div>
<p class="text-center size16" style="margin:5px 0"><a href="<?php echo $gonggao['url'];?>"><?php echo $gonggao['title'];?></a></p>
<div class="border"></div>
<div class="border"></div>
<div class="border"></div>
<ul class="mmnav">
	<li><a class="btn btn-info" href="index.php?m=member&a=trade_buy">买入PSBC</a></li>
	<li><a class="btn btn-info" href="index.php?m=member&a=trade_my">我的交易</a></li>
	<li><a class="btn btn-info" href="index.php?m=member&a=trade">卖出PSBC</a></li>
    <div class="clear"></div>
</ul>
<ul class="mmnav sele1">
	<li class="active fl"><a class="">行情走势</a></li>
	<li class="fl"><a class="" href="/list-7-1.html">市场动态</a></li>
    <div class="clear"></div>
</ul>
<div class="padding15" id="chart" style="width: 100%; height: 300px;">
	</div>
</div>
<div class="hei40"></div>
   
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('chart'));

        // 指定图表的配置项和数据
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

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>
<?php include template('member', 'footer'); ?>