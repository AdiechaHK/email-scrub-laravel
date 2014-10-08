var createFormatedOp = function(json, parent) {
	var validEmailTable = $("<table />", {
		style: "width: 100%"
	});
	var invalidEmailTable = $("<table />", {
		style: "width: 100%"
	});

	$(parent).empty();
	$(validEmailTable).append($("<tr/>").append($("<th/>", {html: "Valid Emails"}))).appendTo(parent);
	$(invalidEmailTable).append($("<tr/>").append($("<th/>", {html: "Invalid Emails"})).append($("<th/>", {html: "Reason", colspan: 8}))).appendTo(parent);

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
				html: e.reason.syntaxCheck ? "&#x2713;" : "&times;",
				style: "background: " + (e.reason.syntaxCheck ? "green" : "red"),
				title: "Syntax Check - " + (e.reason.syntaxCheck ? "Pass" : "Fail"),
				class: "reason-cell"
			})).append($("<td/>", {
				html: e.reason.duplicateCheck ? "&#x2713;" : "&times;",
				style: "background: " + (e.reason.duplicateCheck ? "green" : "red"),
				title: "Duplicate Check - " + (e.reason.duplicateCheck ? "Pass" : "Fail"),
				class: "reason-cell"
			})).append($("<td/>", {
				html: e.reason.highRiskRecipientCheck ? "&#x2713;" : "&times;",
				style: "background: " + (e.reason.highRiskRecipientCheck ? "green" : "red"),
				title: "High Risk Recipient Check - " + (e.reason.highRiskRecipientCheck ? "Pass" : "Fail"),
				class: "reason-cell"
			})).append($("<td/>", {
				html: e.reason.highRiskDomainCheck ? "&#x2713;" : "&times;",
				style: "background: " + (e.reason.highRiskDomainCheck ? "green" : "red"),
				title: "High Risk Domain Check - " + (e.reason.highRiskDomainCheck ? "Pass" : "Fail"),
				class: "reason-cell"
			})).append($("<td/>", {
				html: e.reason.highRiskComplainerCheck ? "&#x2713;" : "&times;",
				style: "background: " + (e.reason.highRiskComplainerCheck ? "green" : "red"),
				title: "High Risk Complainer Check - " + (e.reason.highRiskComplainerCheck ? "Pass" : "Fail"),
				class: "reason-cell"
			})).append($("<td/>", {
				html: e.reason.highRiskThrowawayCheck ? "&#x2713;" : "&times;",
				style: "background: " + (e.reason.highRiskThrowawayCheck ? "green" : "red"),
				title: "High Risk Throwaway Check - " + (e.reason.highRiskThrowawayCheck ? "Pass" : "Fail"),
				class: "reason-cell"
			})).append($("<td/>", {
				html: e.reason.highRiskRoleCheck ? "&#x2713;" : "&times;",
				style: "background: " + (e.reason.highRiskRoleCheck ? "green" : "red"),
				title: "High Risk Role Check - " + (e.reason.highRiskRoleCheck ? "Pass" : "Fail"),
				class: "reason-cell"
			})).append($("<td/>", {
				html: e.reason.spamtrapCheck ? "&#x2713;" : "&times;",
				style: "background: " + (e.reason.spamtrapCheck ? "green" : "red"),
				title: "Spamtrap Check - " + (e.reason.spamtrapCheck ? "Pass" : "Fail"),
				class: "reason-cell"
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
			console.log("Data get from server will be");
			console.log(data);
			$("#responce-container").show();
			
			createFormatedOp(data, $(".content",  "#responce-container"));
		});
	});

	$("#responce-container").hide();
});