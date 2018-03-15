jQuery(document).ready(function($){
 
    $('body').delegate('.upload-image-btn', 'click', function(e){
         e.preventDefault();
 
         var $image = $(this).siblings('.image-preview');
         var $input = $(this).siblings('.image-url');
         var $remove_btn = $(this).siblings('.remove-image-btn');
 
         var uploader = wp.media({
             title: 'Choisir une image',
             button: {
                 text: 'Sélectionner'
             },
             multiple:false
         })
         .on('select', function(){
             var attachment = uploader.state().get('selection').first().toJSON();
 
             $image.attr('src', attachment.url).removeClass('hidden');
             $remove_btn.removeClass('hidden');
             $input.val(attachment.url);
 
         }).open();
     });
 
     $('body').delegate('.remove-image-btn', 'click', function(e){
         var $image = $(this).siblings('.image-preview');
         var $input = $(this).siblings('.image-url');
 
         $image.addClass('hidden');
         $(this).addClass('hidden');
         $input.val('');
     });
});