<script type="text/javascript">
function onLinkedInLoad() {
  IN.Event.on(IN, "auth", function() {onLinkedInLogin();});
}

function onLinkedInLogin() {
  // we pass field selectors as a single parameter (array of strings)
  IN.API.Profile("me")
    .fields(["id", "firstName", "lastName", "pictureUrl", "publicProfileUrl","summary","email-address","positions:(company)","location:(name)","industry"])
    .result(function(result) {
    	//Return boolean to action function
	    setLoginAction(result.values[0]);
    })
    .error(function(err) {
	   	//Alert error if any
	    alert(err);
    });
}

function setLoginAction(profile) {
  if (!profile) {
    //If not logged in
  }
  else {
  	
  	//alert (JSON.stringify(profile));
    var pictureUrl = profile.pictureUrl || "http://static02.linkedin.com/scds/common/u/img/icon/icon_no_photo_80x80.png";
    var email = profile.emailAddress || "";
    var company = profile.positions.values[0].company.name || "";
    var firstName = profile.firstName;
    var lastName = profile.firstName;
    var location = profile.location.name;
    var industry = profile.industry;
    
    
    $("#linkedin-extra").show();
    $("#createaccountModal .error-wrapper").html("").hide();
    
    $("#signup-image-el").attr("src", pictureUrl);
    $("#signup-image").val(pictureUrl);
    $("#signup-email").val(email);
    $("#signup-companyname").val(company);
    
    $("#signup-industry").val(industry);
    $("#signup-location").val(location);
    $("#createaccountModal .image_col").show();
    $("#createaccountModal .field_col").removeClass("twelve").addClass("nine");
    
  }
}


(function ($, window, undefined) {
jQuery(window).load(function(){
	$("#createaccount").submit(function(e){
	
		//e.preventDefault();
	
		var form = $(this);
		
		var errors = new Array();
		
		function notValid(field) {
			if(field.val() == "" || field.val() == field.attr("placeholder")) {
				return field.data("errormsg");
			} else {
				return false;
			}
		}
		
		
		
		var field_email = $('input[name="email"]');
		var field_image = $('input[name="picurl"]');
		var field_company = $('input[name="company"]');
		var field_location = $('input[name="location"]');
		var field_industry = $('input[name="industry"]');
		
		
		if (	notValid(field_email)	) { errors.push(	notValid(field_email)	); }
		if (	notValid(field_company)	) { errors.push(	notValid(field_company)	); }
		
		
		if(errors.length > 0) {
			$("#createaccountModal .error-wrapper").show();
			$("#createaccountModal .error-wrapper").html("");
			var msg = "";
			$.each(errors, function(key,val){
				msg += "<em>" + val + "</em>";
			});
			$("#createaccountModal .error-wrapper").append(msg);
			return false;

		} else {

			$("#createaccountModal .error-wrapper").html("");
			
			$.post(form.attr("action"), { 
				ajax: "1", 
				firstname: "", 
				lastname: "", 
				title: "", 
				email: field_email.val(), 
				company: field_company.val(), 
				picurl: field_image.val(), 
				location: field_location.val(), 
				industry: field_industry.val()
			},
			function(data) {
				//BEHANDLA DATA SENARE 0 = epost finns redan i systemet, 1 = konto har skapats och skall skickas till step=welcome
			    //alert("Data Loaded: " + data);
				if (data == 1) {
					window.location = "http://sverige-norge.se/inc/loginbox_company.asp?step=welcome";
				} else {
					$("#linkedin-extra").show();
					$("#createaccountModal .error-wrapper").append("<em><?php echo __("E-postadress är redan registrerad."); ?></em>");
				}
			});
			
			
			return false;
		}
		
		return false;
		
	});

});
})(jQuery, this);
</script>

<div id="createaccountModal" class="reveal-modal">
<a class="close-reveal-modal">&#215;</a>


<form method="post" name="createaccount" id="createaccount" action="http://sverige-norge.se/inc/loginbox_company_ajax.asp?step=register">
	<section class="row header">
		<div class="columns twelve">
			<h4><div class="fd-icon-user-add icon left hide-for-small"></div>&nbsp;&nbsp;<?php echo __("Pröva på gratis & sök personal."); ?></h4>
		</div>
	</section>
	<section class="row middle">
			<div class="columns eleven centered">
				<div class="columns three image_col" style="padding-left:0px;padding-right:30px; display:none">
					<label><?php echo __("Din profilbild"); ?>:</label>
					<div class="th">
						<img id="signup-image-el" src="<?php bloginfo("template_url"); ?>/images/default_profile.png" alt="" title="" style="width:100%;max-width:115px" />
					</div>
					<input type="hidden" name="picurl" id="signup-image" />
				</div>
				<div class="columns twelve field_col" style="padding:0px;">
						<label><?php echo __("E-postadress"); ?>:</label>
						<input type="text" name="email" id="signup-email" placeholder="<?php echo __("Ange ditt användarnamn"); ?>" data-errormsg="Ange en giltig epost" />
						
						<label><?php echo __("Företagsnamn"); ?>:</label>
						<input type="text" name="company" id="signup-companyname" class="twelve" placeholder="<?php echo __("Ange ditt företagsnamn"); ?>" data-errormsg="Ange ett företagsnamn" />
						
						<div id="linkedin-extra" style="display:none;">
							<label><?php echo __("Område"); ?>:</label>
							<input type="text" name="location" id="signup-location" class="twelve" />
							
							<label><?php echo __("Bransch"); ?>:</label>
							<input type="text" name="industry" id="signup-industry" class="twelve" />
						</div>
				</div>
				<div class="columns twelve error-wrapper" style="display:none">
						
				</div>
				
			</div>	
			
			
	</section>
	<section class="row footer">
		<div class="columns twelve">			
			<a href="#" title="" class="black button" id="linkedin"><?php echo __("Använd LinkedIn"); ?></a>
			<a href="#" title="" class="secondary button" data-reveal-id="loginModal"><?php echo __("Har du redan konto?"); ?></a>
			<div id="linkedin-wrapper"><script type="IN/Login" data-label="action"></script></div>
			
			<input type="hidden" name="ajax" value="1" />
			<input type="submit" name="submit" value="<?php echo __("Registrera"); ?>" class="button green right" id="submit"/>
		</div>
	</section>		
</form>

</div>