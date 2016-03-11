$(function(){
    $('.zan').click(function(){
      var id=$(this).find('input').val();
      $.ajax({
               type: "POST",
               url: "zan",
               data:{"qid":id},   
              success: function(){
                    window.location.reload();
         }

      });

    });
     $('.za').click(function(){
      var id=$(this).find('input').val();
      $.ajax({
               type: "POST",
               url: "za",
               data:{"qid":id},
              success: function(){
                    window.location.reload();
         }

      });

    });
});