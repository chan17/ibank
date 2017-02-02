<?php
class ApplyService{
	public function uploadImg($loanId, $uid, $type, $fileinfo){
		/*
		 *成功上传 返回文件名称
		 *-1:文件超过规定大小
		 *-2:文件类型不符
		 *-3:移动文件出错
		 */
		if(is_uploaded_file($fileinfo['tmp_name'])){
			$photo_types = array('image/jpg', 'image/jpeg','image/png','image/pjpeg','image/gif','image/bmp','image/x-png');//定义上传格式
        	$max_size = 7000000;    //上传照片大小限制,默认7000k
        	$photo_folder = 'upload/'.$uid.'/'.$loanId.'/'.$type.'/'; //上传照片路径
	        if(!file_exists($photo_folder)){//检查照片目录是否存在
	            mkdir($photo_folder, 0777, true);  //mkdir("temp/sub, 0777, true);
	        }
			
			$photo_name = $fileinfo["tmp_name"];
			$photo_size = getimagesize($photo_name);
			if($max_size < $fileinfo["size"])//检查文件大小
				return '-1';
			if(!in_array($fileinfo["type"], $photo_types))//检查文件类型
				return '-2';
			$pinfo = pathinfo($fileinfo["name"]);
			$photo_type = $pinfo['extension'];//上传文件扩展名
			$filename = md5(microtime(true)).'.'.$photo_type; // 目标文件名称
			$photo_server_folder = $photo_folder.$filename;
			
			if(!move_uploaded_file($photo_name, $photo_server_folder))
            	return '-3';
			return $photo_server_folder; // 上传成功			
		}
	}
}