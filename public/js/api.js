var EmailValidation = function(conf) {
	this.url = "http://codegeeks.in/laravel-test/public/index.php/validateEmail/";
	// this.url = "http://codegeeks.in/laravel-test/public/validateEmail/";
	this.config = conf;
}

EmailValidation.prototype.setURL = function(url) {
	// body...
	this.url = url.trim();
};

EmailValidation.prototype.validate = function(email, succ) {
	var self = this;
	var obj = {
		url: self.url + email,
		data: {},
		success: succ
	}
	console.log(obj);
	$.ajax(obj);
};
