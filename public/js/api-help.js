var createFormatedOp = function(json, parent) {
	var validEmailTable = $("<table />", {
		style: "width: 100%"
	});
	var invalidEmailTable = $("<table />", {
		style: "width: 100%"
	});

	$(parent).empty();
	$(validEmailTable).append($("<tr/>").append($("<th/>", {html: "Valid Emails"}))).appendTo(parent);
	$(invalidEmailTable).append($("<tr/>").append($("<th/>", {html: "Invalid Emails"})).append($("<th/>", {html: "Reason"}))).appendTo(parent);

	if(json.validEmail.length > 0) {
		$.each(json.validEmail, function(i, e) {
			console.log("invalid: "+ JSON.stringify(e));
			$("<tr/>").append($("<td/>", {
				html: e
			})).appendTo(validEmailTable);
			console.log("valid: "+ e);
			// console.log(e);
		});		
	} else {
		$(validEmailTable).hide();
	}

	if(json.invalidEmail.length > 0) {
		$.each(json.invalidEmail, function(i, e) {
			console.log("invalid: "+ JSON.stringify(e));
			$("<tr/>").append($("<td/>", {
				html: e.email
			})).append($("<td/>", {
				html: JSON.stringify(e.reason)
			})).appendTo(invalidEmailTable);
			// console.log(e);
		});
	} else {
		$(invalidEmailTable).hide();
	}
}


$(document).ready(function() {
	$("#validate-btn").on('click', function() {
		var validater = new EmailValidation();
		var email = $("#email-text-box").val();
		console.log(validater);
		validater.setURL($("#url").text());
		validater.validate(email, function(data) {
			data = eval("("+data+")");
			console.log(data);
			$("#responce-container").show();
			
			createFormatedOp(data, $(".content",  "#responce-container"));
		});
	});

	$("#responce-container").hide();
});