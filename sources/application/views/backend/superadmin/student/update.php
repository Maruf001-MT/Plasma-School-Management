<style>
    .reveal-if-active {
  opacity: 0;
  max-height: 0;
  overflow: hidden;
  font-size: 16px;
  transform: scale(0.8);
  transition: 0.5s;
}
.reveal-if-active label {
  display: block;
  margin: 0 0 3px 0;
}
.reveal-if-active input[type=text] {
  width: 100%;
}
input[type=radio]:checked ~ .reveal-if-active, input[type=checkbox]:checked ~ .reveal-if-active {
  opacity: 1;
  max-height: 100px;
  padding: 10px 20px;
  transform: scale(1);
  overflow: visible;
}
</style>
<!--title-->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">
                <i class="mdi mdi-update title_icon"></i> <?php echo get_phrase('student_update_form'); ?>
            </h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card pt-0">
            <div class="card-body" style="background-color:#F5F6F9; box-shadow:none;">
                <?php $school_id = school_id(); ?>
                <?php $student = $this->db->get_where('students', array('id' => $student_id))->row_array(); ?>
                <?php $enroll = $this->db->get_where('enrols', array('student_id' => $student_id))->row_array(); ?>
                <h4 class="text-center mx-0 py-2 mt-0 mb-3 px-0 text-white bg-primary"><?php echo get_phrase('update_student_information'); ?></h4>
                <form method="POST" style="background-color:#F5F6F9; box-shadow:none;" class="col-12 d-block ajaxForm" action="<?php echo route('student/updated/'.$student_id.'/'.$student['user_id']); ?>" id = "student_update_form" enctype="multipart/form-data">
                    <div class="col-md-12">

                    <div class="card widget-flat p-3">
                        <h3>Basic Information:</h3><br>

                        <!-- name -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="name"><?php echo get_phrase('name'); ?></label>
                            <div class="col-md-9">
                                <input type="text" id="name" name="name" class="form-control"  value="<?php echo $this->user_model->get_user_details($student['user_id'], 'name'); ?>" placeholder="name" required>
                            </div>
                        </div>
                        <!-- gender -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="gender"><?php echo get_phrase('gender'); ?></label>
                            <div class="col-md-9">
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value=""><?php echo get_phrase('select_gender'); ?></option>
                                    <option value="Male" <?php if($this->user_model->get_user_details($student['user_id'], 'gender') == 'Male') echo 'selected'; ?>><?php echo get_phrase('male'); ?></option>
                                    <option value="Female" <?php if($this->user_model->get_user_details($student['user_id'], 'gender') == 'Female') echo 'selected'; ?>><?php echo get_phrase('female'); ?></option>
                                    <option value="Others" <?php if($this->user_model->get_user_details($student['user_id'], 'gender') == 'Others') echo 'selected'; ?>><?php echo get_phrase('others'); ?></option>
                                </select>
                            </div>
                        </div>

                        <!-- age -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="age"><?php echo get_phrase('age'); ?></label>
                            <div class="col-md-9">
                                <input type="number" id="age" name="age" class="form-control"  value="<?php echo $this->user_model->get_user_details($student['user_id'], 'age'); ?>" placeholder="age" required>
                            </div>
                        </div>

                        <!-- blood group -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="blood_group"><?php echo get_phrase('blood_group'); ?></label>
                            <div class="col-md-9">
                                <select name="blood_group" id="blood_group" class="form-control select2" data-toggle = "select2"  required>
                                    <option value=""><?php echo get_phrase('select_a_blood_group'); ?></option>
                                    <option value="a+"  <?php if(strtolower($this->user_model->get_user_details($student['user_id'], 'blood_group')) == 'a+') echo 'selected'; ?>>A+</option>
                                    <option value="a-"  <?php if(strtolower($this->user_model->get_user_details($student['user_id'], 'blood_group')) == 'a-') echo 'selected'; ?>>A-</option>
                                    <option value="b+"  <?php if(strtolower($this->user_model->get_user_details($student['user_id'], 'blood_group')) == 'b+') echo 'selected'; ?>>B+</option>
                                    <option value="b-"  <?php if(strtolower($this->user_model->get_user_details($student['user_id'], 'blood_group')) == 'b-') echo 'selected'; ?>>B-</option>
                                    <option value="ab+" <?php if(strtolower($this->user_model->get_user_details($student['user_id'], 'blood_group')) == 'ab+') echo 'selected'; ?>>AB+</option>
                                    <option value="ab-" <?php if(strtolower($this->user_model->get_user_details($student['user_id'], 'blood_group')) == 'ab-') echo 'selected'; ?>>AB-</option>
                                    <option value="o+"  <?php if(strtolower($this->user_model->get_user_details($student['user_id'], 'blood_group')) == 'o+') echo 'selected'; ?>>O+</option>
                                    <option value="o-"  <?php if(strtolower($this->user_model->get_user_details($student['user_id'], 'blood_group')) == '0-') echo 'selected'; ?>>O-</option>
                                </select>
                            </div>
                        </div>                    

                        <!--student document number -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="student_doc"><?php echo get_phrase('document_number'); ?></label>
                            <div class="col-md-9">
                                <input type="number" id="student_doc" name="student_doc" class="form-control"  value="<?php echo $this->user_model->get_user_details($student['user_id'], 'student_doc'); ?>" placeholder="Enter student document number" required>
                            </div>
                        </div>

                        <!-- Date of birth -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="birthdatepicker"><?php echo get_phrase('birthday'); ?></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control date" id="birthdatepicker" data-bs-toggle="date-picker" data-single-date-picker="true" name = "birthday"  value="<?php echo date('m/d/Y', $this->user_model->get_user_details($student['user_id'], 'birthday')); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="card widget-flat p-3">
                        <h3>Parents Information:</h3><br>

                        <!-- father name -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="father_name"><?php echo get_phrase('father_name'); ?></label>
                            <div class="col-md-9">
                                <input type="text" id="father_name" name="father_name" class="form-control"  value="<?php echo $this->user_model->get_user_details($student['user_id'], 'father_name'); ?>" placeholder="father name" required>
                            </div>
                        </div>

                        <!-- mother name -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="mother_name"><?php echo get_phrase('mother_name'); ?></label>
                            <div class="col-md-9">
                                <input type="text" id="mother_name" name="mother_name" class="form-control"  value="<?php echo $this->user_model->get_user_details($student['user_id'], 'mother_name'); ?>" placeholder="mother name" required>
                            </div>
                        </div>


                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="parent_doc"><?php echo get_phrase('parents_document_number'); ?></label>
                            <div class="col-md-9">
                                <input type="checkbox" name="choice-parent" id="father-doc">
                                <label for="father-doc">Father</label>
                                <div class="reveal-if-active">
                                    <input type="number" id="" name="father_doc" class="require-if-active form-control" data-require-pair="#father-doc" placeholder="Please enter father doc. no." value="<?php echo $this->user_model->get_user_details($student['user_id'], 'father_doc'); ?>">
                                </div>
                                <div>
                                <input type="checkbox" name="choice-parent" id="mother-doc">
                                <label for="mother-doc">Mother</label>
                                <div class="reveal-if-active">
                                    <input type="number" id="" name="mother_doc" class="require-if-active form-control" data-require-pair="#mother-doc" placeholder="Please enter mother doc. no." value="<?php echo $this->user_model->get_user_details($student['user_id'], 'mother_doc'); ?>">
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="parent_dob"><?php echo get_phrase('parents_date_of_birth'); ?></label>
                            <div class="col-md-9">
                                <input type="checkbox" name="choice-parent" id="father-dob">
                                <label for="father-dob">Father</label>
                                <div class="reveal-if-active">
                                    <input type="text" class="form-control require-if-active" data-require-pair="#father-doc" data-date-autoclose="true" data-date-container="#datepicker5" name = "father_dob" placeholder="Enter father DOB (month/date/year)" value="<?php echo date('m/d/Y', $this->user_model->get_user_details($student['user_id'], 'father_dob')); ?>" >
                                </div>
                                <div>
                                <input type="checkbox" name="choice-parent" id="mother-dob">
                                <label for="mother-dob">Mother</label>
                                <div class="reveal-if-active">
                                    <input type="text" class="form-control require-if-active" data-require-pair="#mother-doc" data-date-autoclose="true" data-date-container="#datepicker5" name = "mother_dob" placeholder="Enter mother DOB (month/date/year)" value="<?php echo date('m/d/Y', $this->user_model->get_user_details($student['user_id'], 'mother_dob')); ?>" >
                                </div>
                                </div>
                            </div>
                        </div>

                        <!-- phone -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="phone"><?php echo get_phrase('phone'); ?></label>
                            <div class="col-md-9">
                                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $this->user_model->get_user_details($student['user_id'], 'phone'); ?>" placeholder="phone" required>
                            </div>
                        </div>

                        <!-- alternative phone -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="alt_phone"><?php echo get_phrase('alternative_phone_no.'); ?></label>
                            <div class="col-md-9">
                                <input type="text" id="alt_phone" name="alt_phone" class="form-control" value="<?php echo $this->user_model->get_user_details($student['user_id'], 'alt_phone'); ?>" placeholder="alternative phone no." required>
                            </div>
                        </div>

                         <!-- address -->
                         <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="example-textarea"><?php echo get_phrase('address'); ?></label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="example-textarea" rows="5" name = "address" placeholder="address"><?php echo $this->user_model->get_user_details($student['user_id'], 'address'); ?></textarea>
                            </div>
                        </div>

                        <!-- select parent/guardian -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="parent_id"><?php echo get_phrase('parent'); ?></label>
                            <div class="col-md-9">
                                <select id="parent_id" name="parent_id" class="form-control select2"  data-bs-toggle="select2" required >
                                    <option value="">Select A Parent</option>
                                    <?php $parents = $this->db->get_where('parents', array('school_id' => $school_id))->result_array(); ?>
                                    <?php foreach($parents as $parent): ?>
                                        <option value="<?php echo $parent['id']; ?>" <?php if($student['parent_id'] == $parent['id']) echo 'selected'; ?>><?php echo $this->user_model->get_user_details($parent['user_id'], 'name'); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                    </div>


                    <!-- Additional Photos & Documents -->
                    <div class="card widget-flat p-3">
                        <h3>Additional Photos & Documents:</h3><br>

                        <!-- upload student,parent image -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="example-fileinput"><?php echo get_phrase('profile_image'); ?></label>

                            <div class="col-md-9 custom-file-upload">
                                <div class="wrapper-image-preview" style="margin-left: -6px;">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo $this->user_model->get_user_image($student['user_id'], 'student_image'); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="student_image" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_student_image'); ?> </label>
                                            <input id="student_image" style="visibility:hidden;" type="file" class="image-upload" name="student_image" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9 custom-file-upload">
                                <div class="wrapper-image-preview" style="margin-left: -6px;">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo $this->user_model->get_user_image($student['user_id'], 'parent_image'); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="parent_image" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_parent_image'); ?> </label>
                                            <input id="parent_image" style="visibility:hidden;" type="file" class="image-upload" name="parent_image" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- upload documents -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="example-fileinput"><?php echo get_phrase('additional_document'); ?></label>

                            <div class="col-md-9 custom-file-upload">
                                <div class="wrapper-image-preview" style="margin-left: -6px;">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/users/add_doc_icon.gif'); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="add_student_doc" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('Upload_student_Document'); ?> </label>
                                            <input id="add_student_doc" style="visibility:hidden;" type="file" class="image-upload" name="add_student_doc" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9 custom-file-upload">
                                <div class="wrapper-image-preview" style="margin-left: -6px;">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/users/add_doc_icon.gif'); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="add_parent_doc" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('Upload_parents_Document'); ?> </label>
                                            <input id="add_parent_doc" style="visibility:hidden;" type="file" class="image-upload" name="add_parent_doc" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>

  
                        </div>

                        <!-- upload student,parent image -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="example-fileinput"><?php echo get_phrase('finger_print'); ?></label>

                            <div class="col-md-9 custom-file-upload">
                                <div class="wrapper-image-preview" style="margin-left: -6px;">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/users/add_doc_icon.gif'); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="add_finger" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('Upload_finger_print'); ?> </label>
                                            <input id="add_finger" style="visibility:hidden;" type="file" class="image-upload" name="add_finger" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>      


                    <!-- previous school info -->
                    <div class="card widget-flat p-3">
                        <h3>Previous School Info:</h3><br>

                        <!-- prev scl name -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="nameOfPrevScl"><?php echo get_phrase('school_name'); ?></label>
                            <div class="col-md-9">
                                <input type="text" id="nameOfPrevScl" name="nameOfPrevScl" class="form-control"  value="<?php echo $this->user_model->get_user_details($student['user_id'], 'nameOfPrevScl'); ?>" placeholder="name of previous school">
                            </div>
                        </div>

                        <!-- prev scl class -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="prev_class"><?php echo get_phrase('class'); ?></label>
                            <div class="col-md-9">
                                <input type="text" id="prev_class" name="prev_class" class="form-control" value="<?php echo $this->user_model->get_user_details($student['user_id'], 'prev_class'); ?>" placeholder="Class">
                            </div>
                        </div>

                        <!-- prev scl address -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="example-textarea"><?php echo get_phrase('address_of_previous_school'); ?></label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="example-textarea" rows="5" name = "prev_scl_address" placeholder="Name of previous school"><?php echo $this->user_model->get_user_details($student['user_id'], 'prev_scl_address'); ?></textarea>
                            </div>
                        </div>

                        <!-- prev scl phone -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="prev_scl_phn"><?php echo get_phrase('phone_number'); ?></label>
                            <div class="col-md-9">
                                <input type="text" id="prev_scl_phn" name="prev_scl_phn" class="form-control" value="<?php echo $this->user_model->get_user_details($student['user_id'], 'prev_scl_phn'); ?>" placeholder="Phone number of previous school">
                            </div>
                        </div>
                    </div>

                    <!-- Admission and profile info -->
                    <div class="card widget-flat p-3">
                        <h3>Admission and Profile info</h3><br>

                        <!-- invoice number -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="invoice_number"><?php echo get_phrase('invoice_number'); ?></label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="invoice_number" name="invoice_number" value="<?php echo $this->user_model->get_user_details($student['user_id'], 'invoice_number'); ?>" placeholder="Enter invoice number" required>
                            </div>
                        </div>

                        <!-- class -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="class_id"><?php echo get_phrase('class'); ?></label>
                            <div class="col-md-9">
                                <select name="class_id" id="class_id" class="form-control" required onchange="classWiseSectionOnStudentEdit(this.value)">
                                    <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                                    <?php $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array(); ?>
                                    <?php foreach($classes as $class){ ?>
                                        <option value="<?php echo $class['id']; ?>" <?php if($enroll['class_id'] == $class['id']) echo 'selected'; ?>><?php echo $class['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <!-- Roll -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="roll"><?php echo get_phrase('roll'); ?></label>
                            <div class="col-md-9">
                                <input type="text" id="roll" name="roll" class="form-control"  value="<?php echo $this->user_model->get_user_details($student['user_id'], 'roll'); ?>" placeholder="roll" required>
                            </div>
                        </div>

                        <!-- section -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="section_id"><?php echo get_phrase('section'); ?></label>
                            <div class="col-md-9" id = "section_content">
                                <select name="section_id" id="section_id" class="form-control" required >
                                    <option value=""><?php echo get_phrase('select_a_section'); ?></option>
                                    <?php $sections = $this->db->get_where('sections', array('class_id' => $enroll['class_id']))->result_array(); ?>
                                    <?php foreach($sections as $section){ ?>
                                        <option value="<?php echo $section['id']; ?>" <?php if($enroll['section_id'] == $section['id']) echo 'selected'; ?>><?php echo $section['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <!-- user phone number-email -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="email"><?php echo get_phrase('user'); ?></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $this->user_model->get_user_details($student['user_id'], 'email'); ?>" placeholder="Enter phone number" required>
                            </div>
                        </div>

                    </div>
                    

                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary col-md-4 col-sm-12 mb-4"><?php echo get_phrase('update_student_information'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
var form;
$(".ajaxForm").submit(function(e) {
    form = $(this);
    ajaxSubmit(e, form, refreshForm);
});
var refreshForm = function () {

}

function classWiseSectionOnStudentEdit(classId) {
    $.ajax({
        url: "<?php echo route('section/list/'); ?>"+classId,
        success: function(response){
            $('#section_id').html(response);
        }
    });
}
</script>
<script>
    var FormStuff = {
  
  init: function() {
    this.applyConditionalRequired();
    this.bindUIActions();
  },
  
  bindUIActions: function() {
    $("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
  },
  
  applyConditionalRequired: function() {
  	
    $(".require-if-active").each(function() {
      var el = $(this);
      if ($(el.data("require-pair")).is(":checked")) {
        el.prop("required", true);
      } else {
        el.prop("required", false);
      }
    });
    
  }
  
};

FormStuff.init();
</script>
