$(function(){
    //get the click of modal button to create / update item
    //we get the button by class not by ID because you can only have one id on a page and you can
    //have multiple classes therefore you can have multiple open modal buttons on a page all with or without
    //the same link.
//we use on so the dom element can be called again if they are nested, otherwise when we load the content once it kills the dom element and wont let you load anther modal on click without a page refresh
    $(document).on('click', '.showModalButton', function(e){
        e.preventDefault();

            $.pjax.reload({container: "#captchaForm", async: false});
            $('#modal').modal('show');
            $("#verifyform-verifycode-image").click();
    });

});