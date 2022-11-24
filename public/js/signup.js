$(document).ready(function(){
    var name = "";
    var email = "";
    var phone = "";
    var password = "";
    var photo = "";
    var name_regex = /^[a-z ]+$/i;
    var email_regex = /^[a-z ]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/;
    var phone_regex = /^\+?([7])\)?[ ]?([0-9]{3})[ ]?([0-9]{3})[ ]?([0-9]{4})$/;
    var password_regex = /^(?=.*\d)(?=.*[a-z])(.{6,15})$/; 
    var image_regex = /(\.jpg|\.jpeg|\.png)$/i;
    //------Name Validation----------
    $("#name").focusout(function(){
        var store = $.trim($("#name").val());
        if(store.length == ""){
            $(".name_error").html("Қолданушыны атыңызды кіргізіңіз");
            if($(".name_error").hasClass("success_color")){
                $(".name_error").removeClass("success_color");
                //name = "";
            }
            $("#name").addClass()
            $(".name_error").addClass("error_color");
        }else if(name_regex.test(store)){
            
            $(".name_error").addClass("success_color");
            $(".name_error").removeClass("error_color");
            $(".name_error").html(store);

        }else{
            $(".name_error").html("Қолданушыны атыңыз жарамсыз");   
            name = "";
            if($(".name_error").hasClass("success_color")){
                $(".name_error").removeClass("success_color");
            }
            
            $(".name_error").addClass("error_color");
        }
    });
    //---------End Name Validation---------

    //---------Email Validation------------

    $("#email_address").focusout(function(){
        var email_store = $.trim($("#email_address").val());
        if(email_store.length == ""){
            $(".email_error").html("Эпошта адресіңізді кіргізіңіз");   
            email = "";
            if($(".email_error").hasClass("success_color")){
                $(".email_error").removeClass("success_color");
            }
            
            $(".email_error").addClass("error_color");

        }else if(email_regex.test(email_store)){
            $(".email_error").addClass("success_color"); 
            $(".email_error").removeClass("error_color");
            $(".email_error").html(email_store); 

        }else{
            $(".email_error").html("Электрондық пошта жарамсыз."); 
            $(".email_error").addClass("error_color"); 
            $(".email_error").removeClass("success_color");
            email = "";
        }
    });
    //---------End Email Validation---------

    //---------Phone Validation------------
     $("#phone_number").focusout(function(){
        var phone_store = $.trim($("#phone_number").val());
        if(phone_store.length == ""){
            $(".phone_error").html("Телефон нөмеріңізді кіргізіңіз");   
            phone = "";
            if($(".phone_error").hasClass("success_color")){
                $(".phone_error").removeClass("success_color");
            }
            $(".phone_error").addClass("error_color");

        }else if(phone_regex.test(phone_store)){
            $(".phone_error").addClass("success_color"); 
            $(".phone_error").removeClass("error_color");
            $(".phone_error").html(phone_store); 

        }else{
            $(".phone_error").html("Телефон нөмеріңіз жарамсыз."); 
            $(".phone_error").addClass("error_color"); 
            $(".phone_error").removeClass("success_color");
            phone = "";
        }
     });
     //---------End Phone Validation---------

     //---------Password Validation----------
     $("#password").focusout(function(){
         var password_store = $.trim($("#password").val());
         if(password_store.length == ""){
            $(".password_error").html("Құпия сөзіңізді кіргізіңіз");   
            
            if($(".password_error").hasClass("success_color")){
                $(".password_error").removeClass("success_color");
            }
            $(".password_error").addClass("error_color");
            password = ""

        }else if(password_regex.test(password_store)){
            $(".password_error").addClass("success_color"); 
            $(".password_error").removeClass("error_color");
            $(".password_error").html(password_store); 

        }else{
            $(".password_error").html("Құпия сөзіңіз жарамсыз."); 
            $(".password_error").addClass("error_color"); 
            $(".password_error").removeClass("success_color");
            password = "";
        }

     });

     //---------End Password Validation---------

     //---------Image Validation----------
     $("#profile_photo").focusout(function(){
        var photo_store = $("#profile_photo").val();
        var fileInput = document.getElementById('profile_photo');
        var filePath = fileInput.value;
        var getP = fileInput.getName;
        if(!image_regex.exec(filePath)){
            $(".photo_error").html("Тек ғана jpeg, jpg, png түріндегі файлдарды жүктей аласыз.");  
            photo = "";
            if($(".photo_error").hasClass("success_color")){
                $(".photo_error").removeClass("success_color");
            }
            $(".photo_error").addClass("error_color");
        }else if(image_regex.exec(filePath)){
            $(".photo_error").addClass("success_color"); 
            $(".photo_error").removeClass("error_color");
            $(".photo_error").html("Сурет сәйкес келді"); 

        }else{
            $(".photo_error").html("Тек ғана jpeg, jpg, png түріндегі файлдарды жүктей аласыз."); 
            $(".photo_error").addClass("error_color"); 
            $(".photo_error").removeClass("success_color");
            photo = "";
        }

     });

        //---------End Image Validation---------

        //---------Submit Form----------

    $("#formsubmit").click(function(e){
        //e.preventDefault();
        if(name.length == ""){
            $(".name_error").html("Аты жөніңізді кіргізіңіз");
            $(".name_error").addClass("error_color");
            $(".name_error").removeClass("success_color");
            name = "";
        }
        if(name.length != ""){
            $("#regform").submit();
        }

    });

});
