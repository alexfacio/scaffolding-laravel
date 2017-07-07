// binds form submission and fields to the validation engine
$("#frm_login, .frm_login").validationEngine({
    autoPositionUpdate:true,
    focusFirstField : true ,
    validateNonVisibleFields:false,
    updatePromptsPosition: true,
    scroll:false,
    autoHidePrompt: true,
    autoHideDelay: 5000,
    fadeDuration: 400,
    promptPosition : "topLeft",
    /*onFieldSuccess: function(){
        $("#form_details").validationEngine('updatePromptsPosition');
    }*/
});