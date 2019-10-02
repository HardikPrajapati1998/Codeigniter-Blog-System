<html>

  <head> 



     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  </head>

<body> 

  <div class="container">

    <div class="row">

      <div class="col-sm-8 col-sm-offset-2">

        <div class="alert alert-danger" style="display:none">

        </div>



      <?php echo form_open('ajax-form-validation/post');?> 

	  <div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name"  placeholder="Name">
			</div>
			<div class="form-group">
				<label>Zipcode</label>
				<input type="text" class="form-control" name="zipcode" placeholder="Zipcode">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email">
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username" placeholder="Username">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
			</div>



        <div class="form-group">

          <button class="btn btn-primary btn-block btn-submit">Submit</button>

        </div>

      </form>

    </div>

    </div>

  </div>

</body>



<script type="text/javascript">

$(document).ready(function() {

  $(".btn-submit").click(function(e){

      e.preventDefault();

      var name = $("input[name='name']").val();
	  var zipcode = $("input[name='zipcode']").val();
      var email = $("input[name='email']").val();
	  var username = $("input[name='username']").val();

	  var password = $("input[name='password']").val();
      var password2 = $("input[name='password2']").val();

      $.ajax({

          url: $(this).closest('form').attr('action'),

          type:$(this).closest('form').attr('method'),

          dataType: "json",

          data: {name:name,zipcode:zipcode,email:email,username:username,password:password, password2:password2},

          success: function(data) {

              if($.isEmptyObject(data.error)){

                $(".alert-danger").css('display','none');

                alert(data.success);
                window.location ="<?php echo base_url(); ?>users/login";

              }else{

                $(".alert-danger").css('display','block');

                $(".alert-danger").html(data.error);

              }

          }

      });

  }); 

});

</script>



</html>