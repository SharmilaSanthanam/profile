$(document).ready(function (){
    $(document).on("click", "#btn-register", function (e){
        e.preventDefault();
        var name=$("#name").val();
        var mobile=$("#mobile").val();
        var country=$("#country").val();
    
    
        if(name == "" || mobile == "" || country == "")
        {
    $('#msg').html("Please fill the required details")
        }
        else{
            $.ajax({
                url: 'http://localhost/guvi-intern/php/profile.php',
                method: 'post',
                data:
                                {
                                    name:name,
                                    mobile:mobile,
                                    country:country
                
                                },
                success: function (data) {
                    $('#msg').html(data);
                },
    
            })
        }
    })
    })
       

   