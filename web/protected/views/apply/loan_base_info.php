    
<div class="clear">
</div>
<div id="content_nav" class="row show-grid center980">
    <div class="first_lend_left">
        <h1>申请贷款</h1>
        <div class="useron">
            1.个人信息
        </div>
        <div class="lendon">
            2.借款信息
        </div>
        <!--lendon-->
        <div class="certoff">
            3.资质审核
        </div>
        <!--certon-->
    </div>
    <div class="span8" style="float:left;margin-left: 10px;">
        <div class="next_tab_content" style="width: 770px;">
            <?php 
            	$form=$this->beginWidget('ApplyActiveForm', array(
					'id'=>'loan_base_info_form',
            		'enableAjaxValidation'=>true
				)); 
				$_labelArr = array('_label'=>'td','align'=>'right','_afterRequired'=>'：');
				$_radioParams = array('required'=>true,'separator'=>'','labelOptions'=>array('_label'=>'i'));
			?>
                <div class="create_list_info" style="margin-top: 43px;">
                    <div class="info_tit">
                        <div>
                        </div>
                        <span class="float_l">借款基本信息</span>
                    </div>
                    <table>
                    	<tr>
                    		<?php echo $form->labelEx($model,'Loan_effect_type',$_labelArr); ?>
                    		<td>
                    			<select class="float_l" name="LoanBaseInfoForm[Loan_effect_type]" id="LoanBaseInfoForm_Loan_effect_type" required="required" style="width: 200px">
									<option value="" selected="selected">请选择借款用途</option>
									<?php 
										foreach(LoanConstants::$Loan_effect_type as $_k=>$_v){
											echo '<option value="'.$_k.'"';
											if($_k==$model->Loan_effect_type){echo ' selected="selected"';}
											echo '>'.$_v.'</option>';
										}
									?>
								</select><?php echo $form->error($model,'Loan_effect_type',array('class'=>'float_l')); ?>
                    		</td>
                    	</tr>
                        
                        <tr>
                            <?php echo $form->labelEx($model,'Loan_title',$_labelArr); ?>
                            <td>
                            	<?php echo $form->textField($model,'Loan_title', array('required'=>true,'style'=>'width: 300px','class'=>'float_l')); ?><?php echo $form->error($model,'Loan_title',array('class'=>'float_l')); ?>
                            </td>
                        </tr>
                        <tr>
                            <?php echo $form->labelEx($model,'Loan_amount',$_labelArr); ?>
                            <td>
                                <span class="float_l"><?php echo $form->textField($model,'Loan_amount', array('required'=>true)); ?></span><span class="altQust" title="此为初次借款额度，还清后可申请提高额度，最高可至50万。"></span><?php echo $form->error($model,'Loan_amount',array('class'=>'float_l')); ?>
                            </td>
                        </tr>
                        <tr>
                            <?php echo $form->labelEx($model,'Loan_tern_type',$_labelArr); ?>
                            <td>
                            	<select name="LoanBaseInfoForm[Loan_tern_type]" id="LoanBaseInfoForm_Loan_tern_type" required="required" class="float_l" style="width: 200px">
									<option value="" selected="selected">请选择借款期限</option>
									<?php 
										foreach(LoanConstants::$Loan_tern_type as $_k=>$_v){
											echo '<option value="'.$_k.'"';
											if($_k==$model->Loan_tern_type){echo ' selected="selected"';}
											echo '>'.$_v.'</option>';
										}
									?>
								</select><?php echo $form->error($model,'Loan_tern_type',array('class'=>'float_l')); ?>
                                <span class="altQust" style="margin-top: 4px;" title="可提前还款"></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="create_list_info">
                    <div class="info_tit">
                        <div>
                        </div>
                        <span class="float_l">借款描述</span>
                    </div>
                    <div class="about_list">
                    	<?php echo $form->textArea($model,'Loan_description', array('required'=>true)); ?><?php echo $form->error($model,'Loan_description',array('class'=>'float_l')); ?>
                    </div>
                </div>
             <span class="error-summary" id="message" style="color: red; text-align: center">
                         </span>
            <?php echo CHtml::submitButton('确定无误，下一步', array('class'=>'btn btn-primary first_lend_nextbtn')); ?>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>