$(document).ready(function (){
    $(document).on("click", "#btn-register", function (){
        var name=$("#name").val();
        var email=$("#email").val();
        var password=$("#password").val();
    
    
        if(name == "" || email == "" || password == "")
        {
    $('#msg').html("Please fill the required details")
        }
        else{
            $.ajax({
                url: 'http://localhost/guvi-intern/php/register.php',
                method: 'post',
                data:
                                {
                                    name:name,
                                    email:email,
                                    password:password
                
                                },
                success: function (data) {
                    $('#msg').html(data);
                },
    
            })
        }
    })
    })
       