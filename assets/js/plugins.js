$(document).ready(function() {

	$(".dropdown-button").dropdown();
	$(".modal").modal();
	$(".button-collapse").sideNav();
	$('select').material_select();
	$('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15, // Creates a dropdown of 15 years to control year,
	    today: 'Today',
	    clear: 'Clear',
	    close: 'Ok',
	    closeOnSelect: false // Close upon selecting a date,
	});
	$('.carousel.carousel-slider').carousel({ fullWidth: true });
    Materialize.toast('Bienvenido a Powlish', 4000, 'purple') // 4000 is the duration of the toast
    $('.slider').slider('pause');
 	$('.parallax').parallax();

});
