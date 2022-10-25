$(document).ready(function(){  
    $('#login_button').click(function(){
var email = $("#email").val();  
         var password = $("#password").val(); 

         var data = "email=" + email + "&password=" + password;

         $.ajax({ 
            method:"post", 
            url: "http://localhost/guvi-intern/php/login.php",  
            data: data,
            success: function(data){
                               $("#msg").html(data);
                               }
                            })

    })
})
