$('.carousel').carousel({
	interval:9000
})

$("[data-toggle=popover]").popover({
	trigger: "click",	
    html: true,
	content: function() {
          return $('#popover-content').html();
        }
});

/*Función para Modal de Video - Pitch*/
/* blur on modal open, unblur on close */
$('#myModal').on('show.bs.modal', function () {
   $('.container').addClass('blur');
})

$('#myModal').on('hide.bs.modal', function () {
   $('.container').removeClass('blur');
})