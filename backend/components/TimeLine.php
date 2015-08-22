<?php 

namespace backend\components;

use yii\base\Object;

class TimeLine extends Object
{

	public $time;
	public $handled_time;

	public function __construct($time, $config = [])
	{
		//初始化时间参数
		$this->time = $time;

		parent::__construct($config);
	}

	public function init()
	{
		parent::init();

		//配置生效后的初始化过程
	}

	public function handle()
	{
		$rtime = date('m-d H:i',$this->time);
		$htime = date('H:i',$this->time);
		$time  = time() - $this->time;
		if($time < 60)
		{
			$time_str = '刚刚';
		}else if($time < 60*60){
			$min      = floor($time/60);
			$time_str = $min.'分钟前';
		}else if($time < 60*60*24){
			$hour     = floor($time/(60*60*24));
			$time_str = $hour.'小时前 '.$htime; 
		}else if($time < 60*60*24*3){
			$day = floor($time/(60*60*24));
			if($day == 1){
				$time_str = '昨天 '.$rtime;
			}else{
				$time_str = '前天 '.$rtime;
			}
		}else{
			$time_str = $rtime;
		}

		return $time_str;
	}

}