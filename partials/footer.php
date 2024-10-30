</div>
      <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/jquery-3.7.1.min.js"></script>
      <script>
        $(document).ready(function(){
          $(window).scroll(function(){
            if($(window).scrollTop()>0){
              $("nav").css("background-color","rgba(19,53,123,0.4)");
              $('.user-menu').css("background-color","transparent");
            }else{
             $("nav").css("background-color","#13357B");
            }
          })
        });
      </script>
      <script>
        $(document).ready(function(){
          $("#email").change(function(){
            var data = $(this).val();
            var data2send = {"email":data};
            $.get("process/validate_email.php",data2send, function(rsp){
              $('#email_feedback').html(rsp);
              $('#email_feedback').addClass('text-info');
              if(rsp == "Email has been taken"){
                $('#btnregister').attr('disabled', 'disabled')
              }else{
                $('#btnregister').removeAttr('disabled')
              }
           
            }); 
          });
        });
      </script>

      
</body>
</html>