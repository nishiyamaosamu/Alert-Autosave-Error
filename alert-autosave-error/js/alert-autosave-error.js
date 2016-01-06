jQuery(document).on( 'after-autosave.edit-post', function( event, data ) {
    if (data.success == false ){
        alert( data.message );
    }
});
