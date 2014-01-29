$(document).ready(function(){


	$('#contenu_list').slide();
	$('#members').slide();
	$('#products').slide();

	$('#profil #element_link2').click(function(){
		$('#profil_options').toggleClass('detailed');
	});

	
});