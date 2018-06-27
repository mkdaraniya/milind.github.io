/**
 * Created by milind on 10/6/17.
 */
$(document).ready(function () {
    $("#sendMail").validate({
    	errorClass: "red",

    rules: {
    // simple rule, converted to {required:true}
	    name: {
	    	required: true,
	    	minlength: 3
	    },
	    // compound rule
	    email: {
	      required: true,
	      email: true
	    },
	    subject: "required",
	    message: {
	    	required: true,
	    	minlength: 10
	    }
  	},
  messages: {
	    name: {
	    	required:"Please specify your name",
	    	minlength:"atleast 3 character required"
	    },
	    email: {
	      required: "We need your email address to contact you",
	      email: "Your email address must be in the format of name@domain.com"
	    },
	    subject: "Please specify your name",
	    message: { 
	    	required:"Please specify your name",
	    	minlength:"atleast 10 character required"
	  	}
  	},
        submitHandler: function(form) {
        	var $btn = $('#formSubmit').button('loading')
            $.ajax({
                 type: "POST",
                 url: "mail.php",
                 data: $(form).serialize(),
                 success: function (response) {
                 	var res = JSON.parse(response);
                    console.info(response);
             
                 	if(res.result == true){
                 		$(form).html("<div id='message'></div>");
                     $('#message').html("<h2>Send mail successfully</h2>")
                         .append("<p>mkdaraniya@gmail.com</p>");
                     }else{
                     	$(form).html("<div id='message'></div>");
                     $('#message').html("<h2>Mail not send</h2>")
                         .append("<p>mkdaraniya@gmail.com</p>");
                     }
                     
                         // .hide()
                         // .fadeIn(1500, function () {
                         // $('#message').append("<img id='checkmark' src='images/ok.png' />");
                     }
                 });
             }
     
    });
});