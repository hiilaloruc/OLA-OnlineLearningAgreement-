var bookId;

$('#Modal').on('show.bs.modal', function(e) { 
     bookId = $(e.relatedTarget).data('book-id');
     document.getElementById("suppBtn").name = bookId;
  
    });
    
function supprimer(){
  
     $.ajax({
        url: "supp_utilisateur.php",
        type: "post",
        data: {id : bookId} ,
        success: function (response) {
            $('#Modal').modal('hide');
            $('table#table tr#'+bookId).remove(); 
        
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });

}