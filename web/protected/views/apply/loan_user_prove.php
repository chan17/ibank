    <div id="content_nav" class="row show-grid center980">
        <div class="first_lend_left">
            <h1>申请贷款</h1>

               <div class="useron">1.个人信息</div>
            <div class="lendon">2.借款信息</div><!--lendon-->
            <div class="certon">3.资质审核</div><!--certon-->
           
        </div>
        <div class="span8" style="float:left;margin-left: 10px;">
            <div class="next_tab_content" style="width: 770px;" >
                <div class="create_list_info" style="border: none;">
                        <div class="info_tit" style="border: 1px solid #ededed">
                            <div>
                            </div>
                            <span class="float_l">近期短信调整了短信发送规则，可能造成信息发送延迟，如您长时间未收到验证码短信，请尝试重新获取或至<a href="/consult" target="_blank">客服中心</a></span>
                        </div>
                   
                    
                    <div class="create_list_info" style="margin-top: 5px;">
                        <div class="info_tit">
                            <div>
                            </div>
                            <span class="float_l">绑定手机</span></div>
                            <div class="my_contactway" style="height: 100px">
                              
                                <div class="float_l">
                             
                                    <ul>
                                        <li  style="height:30px; margin-left:58px;">
                                            <div class="float_l">
                                                <span class="float_l" style="line-height: 25px;">手机号码：</span><input class="float_l" type="text" name="MobilePhone" id="MobilePhone"  value="" data-validation-engine="validate[required,custom[mobile]]" /></div>
                                            <div class="float_l"> <input type="button" style="margin: 0 0 3px 4px;" name="huoqu" class="btn btn-info huoqu_btn float_l" id="btnValidateCode" value="获取验证码" /><span id="endtime" class="float_l" style="padding-left: 10px;"></span><span class="altQust" id="spanvalidatecode" style="margin-top: 4px;" title="验证码可能会有延迟，请耐心等待。如长时间未收到，请到”客服中心“反馈，我们会尽快解决。"></span></div>
                                        </li>
                                        <li id="liValidateCode" style="margin-top:11px; margin-left:45px;"><span class="float_l" style="line-height: 25px;">输入验证码：</span><input type="text" class="float_l"
                                                                                                                                                                                style="width: 119px;" id="txtValidateCode" /><input type="button" class="btn btn-info huoqu_btn"
                                                                            id="btnSubmitValidateCode" style="margin: 0 0 3px 4px;" value="提交验证码" /></li>	
                                    </ul>
                              
                                </div>
                            
                            </div>
                    </div>
                </div>
              
                <div class="create_list_info" style="margin-top: 43px;">
                    <div class="info_tit">
                        <div>
                        </div>
                        <span class="float_l">填写联系人（请确保联系人填写准确，为了联系不到您，作为紧急联系人。无需负担保责任。)</span></div>
                    <div class="my_contactway" style="">
                        <div class="float_l">
                            <?php 
				            	$form=$this->beginWidget('ApplyActiveForm', array(
									'id'=>'loan_user_prove_form_contact',
				            		'enableAjaxValidation'=>true
								)); 
								$_labelArr = array('_label'=>'td','align'=>'right','_afterRequired'=>'：');
								$_radioParams = array('required'=>true,'separator'=>'','labelOptions'=>array('_label'=>'i'));
							?>
                                <table >
                              		<input type="hidden" name="formName" value="loan_user_prove_form_contact" />  
                                
                                	<tr>
                                		<?php echo $form->labelEx($model,'Contact_one_name',array_merge($_labelArr,array('width'=>'120px'))); ?>
                                		<td><?php echo $form->textField($model,'Contact_one_name', array('required'=>true,'class'=>'float_l')); ?><?php echo $form->error($model,'Contact_one_name'); ?></td>
                                	</tr>
                                	<tr>
                                		<?php echo $form->labelEx($model,'Contact_one_rel',array_merge($_labelArr,array('width'=>'80'))); ?>
                                		<td><select name="LoanUserProveForm[Contact_one_rel]" id="LoanUserProveForm_Contact_one_rel" required="required">
											<option value="" selected="selected">请选择</option>
											<?php 
												foreach(LoanConstants::$Contact_rels as $_k=>$_v){
													echo '<option value="'.$_k.'"';
													if($_k==$model->Contact_one_rel){echo ' selected="selected"';}
													echo '>'.$_v.'</option>';
												}
											?>
										</select><?php echo $form->error($model,'Contact_one_rel'); ?></td></td>
                                	</tr>
                                    <tr>
                                    	<?php echo $form->labelEx($model,'Contact_one_mobile',$_labelArr); ?>
                                    	<td>
                                    	<?php echo $form->textField($model,'Contact_one_mobile', array('required'=>true)); ?><?php echo $form->error($model,'Contact_one_mobile'); ?>
                                    	</td>
                                    </tr>
                                    <tr>
                                		<?php echo $form->labelEx($model,'Contact_two_name',$_labelArr); ?>
                                		<td><?php echo $form->textField($model,'Contact_two_name', array('required'=>true)); ?><?php echo $form->error($model,'Contact_two_name'); ?></td>
                                	</tr>
                                	<tr>
                                		<?php echo $form->labelEx($model,'Contact_one_rel',$_labelArr); ?>
                                		<td><select name="LoanUserProveForm[Contact_two_rel]" id="LoanUserProveForm_Contact_two_rel" required="required">
											<option value="" selected="selected">请选择</option>
											<?php 
												foreach(LoanConstants::$Contact_rels as $_k=>$_v){
													echo '<option value="'.$_k.'"';
													if($_k==$model->Contact_two_rel){echo ' selected="selected"';}
													echo '>'.$_v.'</option>';
												}
											?>
										</select><?php echo $form->error($model,'Contact_two_rel'); ?></td></td>
                                	</tr>
                                    <tr>
                                    	<?php echo $form->labelEx($model,'Contact_two_mobile',$_labelArr); ?>
                                    	<td>
                                    	<?php echo $form->textField($model,'Contact_two_mobile', array('required'=>true)); ?><?php echo $form->error($model,'Contact_two_mobile'); ?>
                                    	</td>
                                    </tr>
                                    <tr>
                                    	<td></td>
                                    	<td colspan="3">
                                    		<a href="javascript:void(0)" id="a_contact" class="btn btn-info font_yahei bangding_btn" style="width: 80px;margin: 0;">确定</a>
                                    	</td>
                                    </tr>
                                </table>
                            <?php $this->endWidget(); ?>
                        </div>
                    </div>
                </div>
                
                    <div class="create_list_info" style="border: none;">
                        <div class="info_tit" style="border: 1px solid #ededed">
                            <div>
                            </div>
                            <span class="float_l">上传资料 ( 资料上传越多信用和单次查看价格越高 )</span></div>
                        <div class="upload_nav" style="border-bottom:none;margin-top: 5px;">
                            <div>
                                    <input type="hidden" id="authid" value="1862985"/>
                                    <table class="upload_nav_table" cellpadding="0" cellspacing="0" style="margin:0;">
                                        <tbody><tr>
                                                   <th>上传资料</th>
                                                   <th>操作</th>
                                                   <th>进度</th>
                                                   <th>信用度</th>
                                               </tr>
                                            <tr>
                                                <td width="100">身份证</td>
                                                <td width="360">
													<input type="file" name="files" id="fileupload_input_idcard" />
                                                </td>
                                                <td width="100" id="uploadfile_msg_idcard"><?php if(empty($model->Idcard_url)){echo '未上传';}else{echo '已上传';}?></td>
                                                <td style="border-right: none;"></td>
                                            </tr>
											<tr>
                                                <td width="100">住址证明</td>
                                                <td width="360">
                                                	<input type="file" name="files" id="fileupload_input_house_add" />
                                                </td>
                                                <td width="100" id="uploadfile_msg_house_add"><?php if(empty($model->House_add_url)){echo '未上传';}else{echo '已上传';}?></td>
                                                <td style="border-right: none;"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">行驶证</td>
                                                <td width="360">
                                                    <input type="file" name="files" id="fileupload_input_Driving_license" />
                                                </td>
                                                <td width="100" id="uploadfile_msg_Driving_license"><?php if(empty($model->Driving_license_url)){echo '未上传';}else{echo '已上传';}?></td>
                                                <td style="border-right: none;"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">住址证明</td>
                                                <td width="360">
                                                    <input type="file" name="files" id="fileupload_input_house_add" />
                                                </td>
                                                <td width="100" id="uploadfile_msg_house_add"><?php if(empty($model->House_add_url)){echo '未上传';}else{echo '已上传';}?></td>
                                                <td style="border-right: none;"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">住址证明</td>
                                                <td width="360">
                                                    <input type="file" name="files" id="fileupload_input_house_add" />
                                                </td>
                                                <td width="100" id="uploadfile_msg_house_add"><?php if(empty($model->House_add_url)){echo '未上传';}else{echo '已上传';}?></td>
                                                <td style="border-right: none;"></td>
                                            </tr>
                                    </table>
                       
                            </div>
                        </div>
                    </div>
                <div id="divSubmit">
                            <a type="submit" id="btnsubmit" class="btn btn-primary first_lend_nextbtn "
                             data-url="<?php echo Yii::app()->createUrl('applyAjax/calculateLevel',array('uid'=>$userid));?>" value="计算信用等级"/>
                            <div class="create_list_info_firstlend">您只需以上资质审核即可 <strong style="color: #333333">提交贷款申请</strong>，获得贷款。<br/>
                                此为建立良好的信用档案，还完此笔贷款可申请更高额度。信用和点击收益由本平台自动计算。</div>

                  
                </div>
                
            </div>
        </div>
    </div>
    <style type="text/css">
        #loan_user_prove_form_contact table tr td:last-of-type{
            padding-left: 10px;
        }
    </style>

    <script src="js/vendor/jquery.ui.widget.js"></script> 
    <script src="js/jquery.iframe-transport.js"></script> 
    <script src="js/jquery.fileupload.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
        	$("#fileupload_input_idcard").fileupload({
        	    url:'<?php echo $this->createUrl('/apply/loan',array('s'=>$_GET['s']));?>',//文件上传地址，当然也可以直接写在input的data-url属性内
        	    formData:{formName:"loan_user_prove_form_idcard",param2:"p2"},//如果需要额外添加参数可以在这里添加
        	    done:function(e,result){
            	    if(result.result=='-1'){
						alert('图片太大');
            	    }else if(result.result=='-2'){
            	    	alert('文件类型不支持');
            	    }else if(result.result=='-3'){
						alert('上传文件失败');
            	    }else{
						$('#uploadfile_msg_idcard').html('已上传');
            	    }
        	        //done方法就是上传完毕的回调函数，其他回调函数可以自行查看api
        	        //注意result要和jquery的ajax的data参数区分，这个对象包含了整个请求信息
        	        //返回的数据在result.result中，假设我们服务器返回了一个json对象
        	        //console.log(JSON.stringify(result.result));
        	    }
        	});
        	$("#fileupload_input_house_add").fileupload({
        	    url:'<?php echo $this->createUrl('/apply/loan',array('s'=>$_GET['s']));?>',//文件上传地址，当然也可以直接写在input的data-url属性内
        	    formData:{formName:"loan_user_prove_form_house_add",param2:"p2"},//如果需要额外添加参数可以在这里添加
        	    done:function(e,result){
            	    if(result.result=='-1'){
						alert('图片太大');
            	    }else if(result.result=='-2'){
            	    	alert('文件类型不支持');
            	    }else if(result.result=='-3'){
						alert('上传文件失败');
            	    }else{
						$('#uploadfile_msg_house_add').html('已上传');
            	    }
        	        //done方法就是上传完毕的回调函数，其他回调函数可以自行查看api
        	        //注意result要和jquery的ajax的data参数区分，这个对象包含了整个请求信息
        	        //返回的数据在result.result中，假设我们服务器返回了一个json对象
        	        //console.log(JSON.stringify(result.result));
        	    }
        	});
        	        	
            $("#a_contact").click(function () {
                var options = {
                    url: '<?php echo $this->createUrl('/apply/loan',array('s'=>$_GET['s']));?>',
                    type: 'post',
                    dataType: 'text',
                    data: $("#loan_user_prove_form_contact").serialize(),
                    success: function (data) {
                        //alert(data);
                        if (data.length > 0){
                         	alert('保存成功');   
                            //$("#responseText").text(data);
                        }
                    }
                };
                $.ajax(options);
                return false;
            });

            $('#btnsubmit').click(function(){
                if(confirm("确定已保存上面的信息? "))
                {
                    $.post($(this).data('url'),function(data){
                        if (data.status == true) {
                            if(confirm('信用、点击收益已生成,去看其他贷款？')){
                                location.href="http://51ibank.com/#loan-list";
                            }else{
                                return false
                            } 
                        }else{
                            alert('信用、点击收益生成失败，请联系管理员：help@51ibank.com');
                        }
                    },"json");
                }else{
                  return false;
                }
            });

        });
    </script>
    
    