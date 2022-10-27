<form method="POST" class="d-block ajaxForm" action="<?php echo route('invoice/single'); ?>">
  <div class="form-row">
    <div style="text-align:center;">
      <input type="checkbox" id="trigger" name="question">
      <label for="trigger"><?php echo get_phrase('admission_invoice') ?></label>
    </div>
    <hr>
  <br>
    <div class="form-group mb-2 hidden_fields">
      <label for="class_id_on_create"><?php echo get_phrase('class'); ?></label>
      <select name="class_id" id="class_id_on_create" class="form-control select2" data-bs-toggle="select2" onchange="classWiseStudentOnCreate(this.value)">
        <option value=""><?php echo get_phrase('select_a_class'); ?></option>
        <?php $classes = $this->crud_model->get_classes()->result_array(); ?>
        <?php foreach($classes as $class): ?>
          <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="form-group mb-2 hidden_fields">
      <label for="student_id_on_create"><?php echo get_phrase('select_student'); ?></label>
      <div id = "student_content">
        <select name="student_id" id="student_id_on_create" class="form-control select2" data-bs-toggle="select2" >
          <option value=""><?php echo get_phrase('select_a_student'); ?></option>
        </select>
      </div>
    </div>

    <div class="form-group mb-2">
      <label for="title"><?php echo get_phrase('invoice_title'); ?></label>
      <select name="title" id="title" class="form-control select2" data-toggle = "select2"  required>
        <option value=""><?php echo get_phrase('select_income_category'); ?></option>
        <option value="Admission Fee"><?php echo get_phrase('admission_fee'); ?></option>
        <option value="Monthly Fee"><?php echo get_phrase('monthly_fee'); ?></option>
        <option value="Exam Fee"><?php echo get_phrase('exam_fee'); ?></option>
        <option value="Sports Fee"><?php echo get_phrase('sports_fee'); ?></option>
        <option value="Program Fee"><?php echo get_phrase('program_fee'); ?></option>
        <option value="Registration Fee"><?php echo get_phrase('registration_fee'); ?></option>
        <option value="IT & Technology Fee"><?php echo get_phrase('IT_&_technology_fee'); ?></option>
        <option value="Science & labratory"><?php echo get_phrase('science_&_labratory_fee'); ?></option>
        <option value="Book,Dress,Diary Fee"><?php echo get_phrase('book_dress_diary_fee'); ?></option>
        <option value="Library Fee"><?php echo get_phrase('library_accounts'); ?></option>
        <option value="Panalty Fee"><?php echo get_phrase('panalty_&_fine'); ?></option>
        <option value="Syllabus & Sheet Fee"><?php echo get_phrase('syllabus_&_sheet_fee'); ?></option>
        <option value="Share Deposit"><?php echo get_phrase('share_deposit'); ?></option>
        <option value="Donation Income"><?php echo get_phrase('donation_income'); ?></option>
        <option value="Others"><?php echo get_phrase('others'); ?></option>
      </select>
        <!-- <input type="text" class="form-control" id="title" placeholder="others" name = "title" required> -->
    </div>

    <div class="form-group mb-2">
      <label for="total_amount"><?php echo get_phrase('total_amount').' ('.currency_code_and_symbol('code').')'; ?></label>
      <input type="number" class="form-control" id="total_amount" name = "total_amount" required>
    </div>

    <div class="form-group mb-2">
      <label for="paid_amount"><?php echo get_phrase('paid_amount').' ('.currency_code_and_symbol('code').')'; ?></label>
      <input type="number" class="form-control" id="paid_amount" name = "paid_amount" required>
    </div>

    <div class="form-group mb-2">
      <label for="status"><?php echo get_phrase('status'); ?></label>
      <select name="status" id="status" class="form-control select2" data-bs-toggle="select2" required >
        <option value=""><?php echo get_phrase('select_a_status'); ?></option>
        <option value="paid"><?php echo get_phrase('paid'); ?></option>
        <option value="unpaid"><?php echo get_phrase('unpaid'); ?></option>
      </select>
    </div>
  </div>
  <div class="form-group mb-2">
    <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('create_invoice'); ?></button>
  </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllInvoices);
});

$(document).ready(function () {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id_on_create', '#student_id_on_create', '#status']);
});

function classWiseStudentOnCreate(classId) {
  $.ajax({
    url: "<?php echo route('invoice/student/'); ?>"+classId,
    success: function(response){
      $('#student_id_on_create').html(response);
    }
  });
}
</script>

<script>
$(function() {
  
  // Get the form fields and hidden div
  var checkbox = $("#trigger");
  var hidden = $(".hidden_fields");
  
  // Hide the fields.
  // Use JS to do this in case the user doesn't have JS 
  // enabled.
  hidden.show();
  
  // Setup an event listener for when the state of the 
  // checkbox changes.
  checkbox.change(function() {
    // Check to see if the checkbox is checked.
    // If it is, show the fields and populate the input.
    // If not, hide the fields.
    if (checkbox.is(':checked')) {
      // Show the hidden fields.
      hidden.hide();
    } else {
      // Make sure that the hidden fields are indeed
      // hidden.
      hidden.show();
      
      // You may also want to clear the value of the 
      // hidden fields here. Just in case somebody 
      // shows the fields, enters data to them and then 
      // unticks the checkbox.
      //
      // This would do the job:
      //
      // $("#hidden_field").val("");
    }
  });
});
</script>
