<?php $school_id = school_id(); ?>
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
<form method="POST" class="p-3 d-block ajaxForm" style="background-color:#F5F6F9; box-shadow:none;" action="<?php echo route('student/create_single_student'); ?>" id = "student_admission_form" enctype="multipart/form-data">

    <div class="card widget-flat p-3">
        <h3>Create Invoice:</h3><br>
        <a class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" href="/./superadmin/invoice" target="_blank">Create Invoice for Admission</a>
        <br>
        <br>
        <br>
        <h3>Add Guardian:</h3><br>
        <a class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" href="/./superadmin/parent" target="_blank">Add Guardian</a>
    </div>

    
        <!-------------------- basic information ------------------->

    <div class="card widget-flat p-3">

        <h3>Basic Information:</h3><br>

        <!-- name -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="name"><?php echo get_phrase('name'); ?></label>
            <div class="col-md-9">
                <input type="text" id="name" name="name" class="form-control" placeholder="name" required>
            </div>
        </div>

        <!-- gender -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="gender"><?php echo get_phrase('gender'); ?></label>
            <div class="col-md-9">
                <select name="gender" id="gender" class="form-control select2" data-toggle = "select2"  required>
                    <option value=""><?php echo get_phrase('select_gender'); ?></option>
                    <option value="Male"><?php echo get_phrase('male'); ?></option>
                    <option value="Female"><?php echo get_phrase('female'); ?></option>
                    <option value="Others"><?php echo get_phrase('others'); ?></option>
                </select>
            </div>
        </div>

        <!-- age -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="age"><?php echo get_phrase('age'); ?></label>
            <div class="col-md-9">
                <input type="number" id="age" name="age" class="form-control" placeholder="age">
            </div>
        </div>
        
        <!-- blood group -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="blood_group"><?php echo get_phrase('blood_group'); ?></label>
            <div class="col-md-9">
                <select name="blood_group" id="blood_group" class="form-control select2" data-toggle = "select2"  required>
                    <option value=""><?php echo get_phrase('select_a_blood_group'); ?></option>
                    <option value="a+">A+</option>
                    <option value="a-">A-</option>
                    <option value="b+">B+</option>
                    <option value="b-">B-</option>
                    <option value="ab+">AB+</option>
                    <option value="ab-">AB-</option>
                    <option value="o+">O+</option>
                    <option value="o-">O-</option>
                </select>
            </div>
        </div>

        <!-- student document number -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="student_doc"><?php echo ucwords('student document number'); ?></label>
            <div class="col-md-9">
                <input type="number" id="student_doc" name="student_doc" class="form-control" placeholder="Enter student Doc number" required>
            </div>
        </div>

        <!-- Date of birth -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="birthdatepicker"><?php echo get_phrase('date_of_birth'); ?></label>
            <div class="col-md-9 position-relative" id="datepicker4">
                <input type="text" class="form-control" data-provide="datepicker" data-date-autoclose="true" data-date-container="#datepicker4" name = "birthday"   value="<?php echo date('m/d/Y'); ?>" required>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>


    
    <!----------------------- parents info -------------------->        


    <div class="card widget-flat p-3">
        <h3>Parent:</h3><br>

        <!-- father's name -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="father_name"><?php echo get_phrase('father_name'); ?></label>
            <div class="col-md-9">
                <input type="text" id="father_name" name="father_name" class="form-control" placeholder="father name" required>
            </div>
        </div>

        <!-- mother's name -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="mother_name"><?php echo get_phrase('mother_name'); ?></label>
            <div class="col-md-9">
                <input type="text" id="mother_name" name="mother_name" class="form-control" placeholder="mother name" required>
            </div>
        </div>

        <!-- parent document number -->

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="parent_doc"><?php echo get_phrase('parents_document_number'); ?></label>
            <div class="col-md-9">
                <input type="checkbox" name="choice-parent" id="father-doc">
                <label for="father-doc">Father</label>
                <div class="reveal-if-active">
                    <input type="number" id="" name="father_doc" class="require-if-active form-control" data-require-pair="#father-doc" placeholder="Please enter father doc. no.">
                </div>
                <div>
                <input type="checkbox" name="choice-parent" id="mother-doc">
                <label for="mother-doc">Mother</label>
                <div class="reveal-if-active">
                    <input type="number" id="" name="mother_doc" class="require-if-active form-control" data-require-pair="#mother-doc" placeholder="Please enter mother doc. no.">
                </div>
                </div>
             </div>
        </div>

        <!-- parent dathe of birth -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="parent_dob"><?php echo get_phrase('parents_date_of_birth'); ?></label>
            <div class="col-md-9">
                <input type="checkbox" name="choice-parent" id="father-dob">
                <label for="father-dob">Father</label>
                <div class="reveal-if-active">
                    <input type="text" class="form-control require-if-active" data-require-pair="#father-doc" data-date-autoclose="true" data-date-container="#datepicker5" name = "father_dob" placeholder="Enter father DOB (month/date/year)">
                </div>
                <div>
                <input type="checkbox" name="choice-parent" id="mother-dob">
                <label for="mother-dob">Mother</label>
                <div class="reveal-if-active">
                    <input type="text" class="form-control require-if-active" data-require-pair="#mother-doc" data-date-autoclose="true" data-date-container="#datepicker5" name = "mother_dob" placeholder="Enter mother DOB (month/date/year)">
                </div>
                </div>
             </div>
        </div>

        <!-- phone -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="phone"><?php echo get_phrase('phone_number'); ?></label>
            <div class="col-md-9">
                <input type="text" id="phone" name="phone" class="form-control" placeholder="phone" required>
            </div>
        </div>
        
        <!--alternative phone -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="alt_phone"><?php echo get_phrase('alternative_phone_number'); ?></label>
            <div class="col-md-9">
                <input type="text" id="alt_phone" name="alt_phone" class="form-control" placeholder="alternative phone number" required>
            </div>
        </div>

         <!-- parent address -->
         <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-textarea"><?php echo get_phrase('address'); ?></label>
            <div class="col-md-9">
                <textarea class="form-control" id="example-textarea" rows="5" name = "address" placeholder="address"></textarea>
            </div>
        </div>

        
        <!-- Select Parent -->
         <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="parent_id"><?php echo get_phrase('guardian'); ?></label>
            <div class="col-md-9">
                <select id="parent_id" name="parent_id" class="form-control select2" data-toggle = "select2"  >
                    <option value=""><?php echo get_phrase('select_a_parent'); ?></option>
                    <?php $parents = $this->db->get_where('parents', array('school_id' => $school_id))->result_array(); ?>
                    <?php foreach($parents as $parent): ?>
                        <option value="<?php echo $parent['id']; ?>"><?php echo $this->user_model->get_user_details($parent['user_id'], 'name'); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

    </div>


        <!---------------------- Additional Photos & Documents ------------------->
        <div class="card widget-flat p-3">
    <h3>Additional Photos & Documents:</h3><br>
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-fileinput"><?php echo get_phrase('profile_image'); ?></label>

            <div class="col-md-9 custom-file-upload">
                <div class="wrapper-image-preview" style="margin-left: -6px;">
                    <div class="box" style="width: 250px;">
                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/users/placeholder.jpg'); ?>); background-color: #F5F5F5;"></div>
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
                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/users/parent.png'); ?>); background-color: #F5F5F5;"></div>
                        <div class="upload-options">
                            <label for="parent_image" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_parent_image'); ?> </label>
                            <input id="parent_image" style="visibility:hidden;" type="file" class="image-upload" name="parent_image" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-fileinput"><?php echo get_phrase('additional_document'); ?></label>
            
            <div class="col-md-9 custom-file-upload">
                <div class="wrapper-image-preview" style="margin-left: -6px;">
                    <div class="box" style="width: 250px;">
                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/users/add_doc_icon.gif'); ?>); background-color: #F5F5F5;"></div>
                        <div class="upload-options">
                            <label for="add_student_doc" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_student_document'); ?> </label>
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
                            <label for="add_parent_doc" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_parent_document'); ?> </label>
                            <input id="add_parent_doc" style="visibility:hidden;" type="file" class="image-upload" name="add_parent_doc" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-fileinput"><?php echo get_phrase('finger_print'); ?></label>
            
            <div class="col-md-9 custom-file-upload">
                <div class="wrapper-image-preview" style="margin-left: -6px;">
                    <div class="box" style="width: 250px;">
                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/users/add_doc_icon.gif'); ?>); background-color: #F5F5F5;"></div>
                        <div class="upload-options">
                            <label for="add_finger" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_student_document'); ?> </label>
                            <input id="add_finger" style="visibility:hidden;" type="file" class="image-upload" name="add_finger" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



        <!---------------------- previous school information -------------------->
    <div class="card widget-flat p-3">
        <h3>Previous School Info:</h3><br>

        <!-- prev school name -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="nameOfPrevScl"><?php echo get_phrase('School Name:'); ?></label>
            <div class="col-md-9">
                <input type="text" id="nameOfPrevScl" name="nameOfPrevScl" class="form-control" placeholder="Name of previous school">
            </div>
        </div>

        <!-- class -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="prev_class"><?php echo get_phrase('class'); ?></label>
            <div class="col-md-9">
                <input type="text" id="prev_class" name="prev_class" class="form-control" placeholder="previous class">
            </div>
        </div>

        <!-- previous school address -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="prev_scl_address"><?php echo get_phrase('address'); ?></label>
            <div class="col-md-9">
                <textarea class="form-control" id="prev_scl_address" rows="5" name = "prev_scl_address" placeholder="address of Previous School"></textarea>
            </div>
        </div>

        <!-- previous scl phn number -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="prev_scl_phn"><?php echo get_phrase('phone'); ?></label>
            <div class="col-md-9">
                <input type="text" id="prev_scl_phn" name="prev_scl_phn" class="form-control" placeholder="Phone number of previous school">
            </div>
        </div>
    </div>

    
    <!----------------- Admission and profile info --------------->
    <div class="card widget-flat p-3">
        <h3>Admission and profile info:</h3><br>

        <!-- invoice number -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="invoice_number"><?php echo get_phrase('invoice_number'); ?></label>
            <div class="col-md-9">
                <input type="text" id="invoice_number" name="invoice_number" class="form-control" placeholder="Enter valid invoice number">
            </div>
        </div> <!--***need validation/verification with invoice list...if the number isn't matched, notify a message-->

        <!-- class -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="class_id"><?php echo get_phrase('class'); ?></label>
            <div class="col-md-9">
                <select name="class_id" id="class_id" class="form-control select2" data-toggle = "select2" required onchange="classWiseSection(this.value)">
                    <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                    <?php $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array(); ?>
                    <?php foreach($classes as $class){ ?>
                        <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <!-- Roll -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="roll"><?php echo get_phrase('roll'); ?></label>
            <div class="col-md-9">
                <input type="text" id="roll" name="roll" class="form-control" placeholder="roll">
            </div>
        </div>

        <!-- section -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="section_id"><?php echo get_phrase('section'); ?></label>
            <div class="col-md-9" id = "section_content">
                <select name="section_id" id="section_id" class="form-control select2" data-toggle = "select2" required >
                    <option value=""><?php echo get_phrase('select_section'); ?></option>
                </select>
            </div>
        </div>

        <!-- user phone number -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="email">User ID</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="email" name="email" placeholder="Phone number or Email address" required>
            </div>
        </div>

        <!-- password -->
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="password"><?php echo get_phrase('password'); ?></label>
            <div class="col-md-9">
                <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
            </div>
        </div>
    </div>


        <div class="text-center">
            <button type="submit" class="btn btn-primary col-md-4 col-sm-12 mb-4">Submit Form</button>
        </div>
</form>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script type="text/javascript">
var form;
$(".ajaxForm").submit(function(e) {
  form = $(this);
  ajaxSubmit(e, form, refreshForm);
});
var refreshForm = function () {
    form.trigger("reset");
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
