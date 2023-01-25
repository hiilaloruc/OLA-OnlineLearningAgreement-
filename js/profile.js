var frm = $('#ModifierMdp');
    
frm.submit(function (e) {
    $( "#alert1" ).remove();
    $(".insert-alert").prepend(' <div id="alert1"  role="alert"> </div>');
    e.preventDefault();
 
    $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
        success: function (data) {
           if(data==true){
            $("#alert1").removeClass();
            $("#alert1").addClass( "alert alert-success alert-dismissible fade show" );
            data = "Le mot de passe a été modifié";
           }  else{
            $("#alert1").removeClass();
            $( "#alert1").addClass( "alert alert-danger alert-dismissible fade show" );
           }
           
           
    $("#alert1").html("<strong>" + data + "</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'> &times;</span> </button> ");
        },
        error: function (data) {
            // console.log('An error occurred.');
          
        },
       
    });
    $("#mdpa").val('');
    $("#nmdp").val('');
    $("#cnmdp").val('');
});