// JavaScript Document
$(document).ready(function(){
						   
// CLEAR FIELDS
$.fn.search = function() {
return this.focus(function() {
	if( this.value == "Search IndiBlogger" ) {
		this.value = "";
	}
}).blur(function() {
	if( !this.value.length ) {
		this.value = this.defaultValue;
	}
});
};
$(".clearme").search();
// CLEAR FIELDS


}); // END Document Ready