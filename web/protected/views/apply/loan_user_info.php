   
    <style type="text/css">
        .w565 {
            width: 565px;
        }

        .my_family .selectaddr, .my_unit .selectaddr {
            width: 120px;
        }

        .my_family .addDetail, .my_unit .addDetail {
            margin-left: 65px;
        }

        .mlr10 {
            margin-left: 10px;
            margin-right: 10px;
        }

        .my_family .left_nav {
            padding-top: 85px;
        }
    </style>
    <div id="content_nav" class="row show-grid center980">
        <div class="first_lend_left">
            <h1>申请贷款</h1>
            <div class="useron">
                1.个人信息
            </div>
            <div class="lendoff">
                2.借款信息
            </div>
            <!--lendon-->
            <div class="certoff">
                3.资质审核
            </div>
            <!--certon-->
            
        </div>
        <div class="span8" style="float:left;margin-left: 10px;">

            <!-- <form action="/firstuserdetail" id="firstuserdetail" method="POST"> -->

            <?php 
            	$form=$this->beginWidget('ApplyActiveForm', array(
					'id'=>'loan_user_info_form',
            		'enableAjaxValidation'=>true
				)); 
				$_labelArr = array('_label'=>'span','class'=>'float_l','_afterRequired'=>'：');
				$_radioParams = array('required'=>true,'separator'=>'','labelOptions'=>array('_label'=>'i'));
			?>
                <div class="next_tab_content" style="width: 770px">
                    <div class="first_lendtit">
                        &gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp;温馨提示：亲爱的客户，<?php echo Yii::app()->name?>会有严格的信息和安全加密机制，确保您的信息安全，不会向外界泄露。<br />
                        <span style="margin-left: 95px">请您认真填写。如有造假，您的贷款资格会被取消；并加入<?php echo Yii::app()->name?>黑名单系统将无法贷款。</span>
                        <div style="color: red" id="errorMessage">
                        </div>
                    </div>

                    <div class="essential_information first_userdetail">
                        <div class="left_nav float_l">
                            <div class="imgicon_nav">
                            </div>
                            <label>
                                我的基本信息<br />
                                (*必填)</label>
                        </div>
                        <div class="float_l" id="div_basic">
                            <ul>
                            	<li>
                            		<?php echo $form->labelEx($model,'Publisher_type',$_labelArr); ?>
                            		<select name="LoanUserInfoForm[Publisher_type]" id="LoanUserInfoForm_Publisher_type" required="required">
										<option value="" selected="selected">请选择</option>
										<?php 
											foreach(LoanConstants::$Publisher_type as $_k=>$_v){
												echo '<option value="'.$_k.'"';
												if($_k==$model->Publisher_type){echo ' selected="selected"';}
												echo '>'.$_v.'</option>';
											}
										?>
									</select>
									<?php echo $form->error($model,'Publisher_type'); ?>
                            	</li>
                            	<li>
                            		<div class="float_l">
                            		<?php echo $form->labelEx($model,'True_name',$_labelArr); ?>
                            		<?php echo $form->textField($model,'True_name', array('required'=>true)); ?>
                            		</div>
                            		<?php echo $form->error($model,'True_name'); ?>
                            	</li>
                                <li>
                            		<div class="float_l">
                            		<?php echo $form->labelEx($model,'QQ',$_labelArr); ?>
                            		<?php echo $form->textField($model,'QQ', array('required'=>true)); ?>
                            		</div>
                            		<?php echo $form->error($model,'QQ'); ?>
                            	</li>
                                <li>
                            		<div class="float_l">
                            		<?php echo $form->labelEx($model,'Mobile',$_labelArr); ?>
                            		<?php echo $form->textField($model,'Mobile', array('required'=>true)); ?>
                            		</div>
                            		<?php echo $form->error($model,'Mobile'); ?>
                            	</li>
                            	<li>
                            		<?php echo $form->labelEx($model,'Edu_type',$_labelArr); ?>
                            		<select name="LoanUserInfoForm[Edu_type]" id="LoanUserInfoForm_Edu_type" required="required">
										<option value="" selected="selected">请选择</option>
										<?php 
											foreach(LoanConstants::$Edu_type as $_k=>$_v){
												echo '<option value="'.$_k.'"';
												if($_k==$model->Edu_type){echo ' selected="selected"';}
												echo '>'.$_v.'</option>';
											}
										?>
									</select>
									<?php echo $form->error($model,'Edu_type'); ?>
                            	</li>
                            	<li>
                            		<div class="float_l">
                            		<?php echo $form->labelEx($model,'Id_card',$_labelArr); ?>：
                            		<?php echo $form->textField($model,'Id_card', array('required'=>true)); ?>
                            		</div>
                            		<?php echo $form->error($model,'Id_card'); ?>
                            	</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="my_family first_userdetail">
                        <div class="left_nav float_l">
                            <div class="imgicon_nav">
                            </div>
                            <label>
                                我的家庭情况<br />
                                (*必填)</label>
                        </div>
                        <div class="float_l w565">
                            <ul>
                                <li>
                            		<?php echo $form->labelEx($model,'Marry_type',$_labelArr); ?>
                            		<select name="LoanUserInfoForm[Marry_type]" id="LoanUserInfoForm_Marry_type" required="required">
										<option value="" selected="selected">请选择</option>
										<?php 
											foreach(LoanConstants::$Marry_type as $_k=>$_v){
												echo '<option value="'.$_k.'"';
												if($_k==$model->Marry_type){echo ' selected="selected"';}
												echo '>'.$_v.'</option>';
											}
										?>
									</select>
									<?php echo $form->error($model,'Marry_type'); ?>
                            	</li>
                                <li>
                            		<?php echo $form->labelEx($model,'House_type',$_labelArr); ?>
                            		<select name="LoanUserInfoForm[House_type]" id="LoanUserInfoForm_House_type" required="required">
										<option value="" selected="selected">请选择</option>
										<?php 
											foreach(LoanConstants::$House_type as $_k=>$_v){
												echo '<option value="'.$_k.'"';
												if($_k==$model->House_type){echo ' selected="selected"';}
												echo '>'.$_v.'</option>';
											}
										?>
									</select>
									<?php echo $form->error($model,'House_type'); ?>
                            	</li>
                                <li>
                            		<div class="float_l">
                            		<?php echo $form->labelEx($model,'House_address',$_labelArr); ?>
                            		<?php echo $form->textField($model,'House_address', array('required'=>true)); ?>
                            		</div>
                            		<?php echo $form->error($model,'House_address'); ?>
                            	</li>
                                <li>
                            		<div class="float_l">
                            		<?php echo $form->labelEx($model,'House_tel',$_labelArr); ?>
                            		<?php echo $form->textField($model,'House_tel', array('required'=>true)); ?>
                            		</div>
                            		<?php echo $form->error($model,'House_tel'); ?>
                            	</li>
                                <li>
                            		<?php echo $form->labelEx($model,'Checkin_years',$_labelArr); ?>
                            		<select name="LoanUserInfoForm[Checkin_years]" id="LoanUserInfoForm_Checkin_years" required="required">
										<option value="" selected="selected">请选择</option>
										<?php 
											foreach(LoanConstants::$Checkin_years as $_k=>$_v){
												echo '<option value="'.$_k.'"';
												if($_k==$model->Checkin_years){echo ' selected="selected"';}
												echo '>'.$_v.'</option>';
											}
										?>
									</select>
									<?php echo $form->error($model,'Checkin_years'); ?>
                            	</li>
                            	<li>
                            		<div class="float_l">
                            		<?php echo $form->labelEx($model,'Have_car',$_labelArr); ?>
                            		<?php 
                            			$_haveCars = array('1'=>'是','2'=>'否');
                            		?>
                            		<?php echo $form->radioButtonList($model, 'Have_car', $_haveCars, $_radioParams);?>
                            		</div>
                            		<?php echo $form->error($model,'Have_car'); ?>
                            	</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="my_unit first_userdetail" style="height: auto;" id="my_js">
                            <div class="left_nav float_l" id="lefticon" style="padding-top: 110px;">
                                <div class="imgicon_nav">
                                </div>
                                <label>
                                    我的单位情况<br />
                                    (*必填)</label>
                            </div>
                            <div class="float_l w565">
                                <ul>
									<li>
	                            		<div class="float_l">
	                            		<?php echo $form->labelEx($model,'Job_type',$_labelArr); ?>
	                            		<?php 
	                            			$_jobTypes = array('1'=>'工薪族','2'=>'私营业主','3'=>'网店卖家','4'=>'学生','5'=>'其他');
	                            		?>
	                            		<?php echo $form->radioButtonList($model, 'Job_type', $_jobTypes, $_radioParams);?>
	                            		</div>
	                            		<?php echo $form->error($model,'Job_type'); ?>
	                            	</li>
	                            	<li>
	                            		<div class="float_l">
	                            			<?php echo $form->labelEx($model,'Year_revenue',$_labelArr); ?>
	                            			<?php echo $form->textField($model,'Year_revenue', array('required'=>true)); ?>
	                            		</div>
	                            		<?php echo $form->error($model,'Year_revenue'); ?>
	                            	</li>
                                    <li>
	                            		<div class="float_l">
	                            		<?php echo $form->labelEx($model,'Income_type',$_labelArr); ?>
	                            		<?php 
	                            			$_Income_types = array('1'=>'银行卡发放','2'=>'现金发放');
	                            		?>
	                            		<?php echo $form->radioButtonList($model, 'Income_type', $_Income_types, $_radioParams);?>
	                            		</div>
	                            		<?php echo $form->error($model,'Income_type'); ?>
	                            	</li>
	                            	<li>
	                            		<?php echo $form->labelEx($model,'Company_type',$_labelArr); ?>
	                            		<select name="LoanUserInfoForm[Company_type]" id="LoanUserInfoForm_Company_type" required="required">
											<option value="" selected="selected">请选择</option>
											<?php 
												foreach(LoanConstants::$Company_type as $_k=>$_v){
													echo '<option value="'.$_k.'"';
													if($_k==$model->Company_type){echo ' selected="selected"';}
													echo '>'.$_v.'</option>';
												}
											?>
										</select>
										<?php echo $form->error($model,'Company_type'); ?>
	                            	</li>
	                            	<li>
	                            		<?php echo $form->labelEx($model,'Work_experience',$_labelArr); ?>
	                            		<select name="LoanUserInfoForm[Work_experience]" id="LoanUserInfoForm_Work_experience" required="required">
											<option value="" selected="selected">请选择</option>
											<?php 
												foreach(LoanConstants::$Work_experience as $_k=>$_v){
													echo '<option value="'.$_k.'"';
													if($_k==$model->Work_experience){echo ' selected="selected"';}
													echo '>'.$_v.'</option>';
												}
											?>
										</select>
										<?php echo $form->error($model,'Work_experience'); ?>
	                            	</li>
	                            	<li>
	                            		<div class="float_l">
	                            		<?php echo $form->labelEx($model,'Company_name',$_labelArr); ?>
	                            		<?php echo $form->textField($model,'Company_name', array('required'=>true)); ?>
	                            		</div>
	                            		<?php echo $form->error($model,'Company_name'); ?>
	                            	</li>
	                            	<li>
	                            		<div class="float_l">
	                            		<?php echo $form->labelEx($model,'Office',$_labelArr); ?>
	                            		<?php echo $form->textField($model,'Office', array('required'=>true)); ?>
	                            		</div>
	                            		<?php echo $form->error($model,'Office'); ?>
	                            	</li>
	                            	<li>
	                            		<div class="float_l">
	                            		<?php echo $form->labelEx($model,'Company_address',$_labelArr); ?>
	                            		<?php echo $form->textField($model,'Company_address', array('required'=>true)); ?>
	                            		</div>
	                            		<?php echo $form->error($model,'Company_address'); ?>
	                            	</li>
	                            	<li>
	                            		<div class="float_l">
	                            		<?php echo $form->labelEx($model,'Company_tel',$_labelArr); ?>
	                            		<?php echo $form->textField($model,'Company_tel', array('required'=>true)); ?>
	                            		</div>
	                            		<?php echo $form->error($model,'Company_tel'); ?>
	                            	</li>
                                </ul>
                            </div>
                        </div>
                    
                    <div class="first_lend_nextbtn_nav">
                    	<?php echo CHtml::submitButton('我已认证填写，下一步', array('class'=>'btn btn-primary first_lend_nextbtn')); ?>
                    	<!-- <input type="submit" class="btn btn-primary first_lend_nextbtn" id="btnSubmit" value="我已认真填写，下一步" /> -->
                    </div>
                </div>
            <!-- </form> -->

                    </div>
                </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
    