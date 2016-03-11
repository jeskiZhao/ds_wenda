$(function(){
    $("#mei").click(function(){
      		var obj = $( '#login' );
		dialog( obj );

		obj.find( 'input[type=submit]' ).hover( function () {
			$( this ).addClass( 'login-btn-cur' );
		}, function () {
			$( this ).removeClass( 'login-btn-cur' );
		} );

		return false;
    });
    $("#bing").click(function(){
                var obj = $( '#cai' );
		dialog( obj );
    });
    $( '.close-window' ).click( function () {
		$( this ).parent().parent().fadeOut();
		$( '#background' ).hide();

		return false;
	} );
});