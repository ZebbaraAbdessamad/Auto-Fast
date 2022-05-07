 <!-- End Page-content -->

                
 <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © My car .
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by abdessamad zebbara
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
<!-- end main content-->




          <!-- ajax change password -->

          <script>

                $(document).ready(function(){
                           
                $('#change2').click(function(e){
                e.preventDefault();
                $('.error2').html('');

                /*Ajax Request Header setup*/
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('formP2')
                    }
                });
                
                // $('#change2').html('Sending..');
                
                /* Submit form data using ajax*/
                $.ajax({

                    url: "{{route('user.passProf')}}",
                    method: 'POST',
                    data: $('#formP2').serialize(),
                    
                                      
                                      
                    success: function(response){
                            //------------------------

                            console.log(response);
                            var  success = response.success;
                            var password_success = success;

                            $('.success2').html(`<div class="alert alert-success" style="margin-right:3px;">
                                                <span>  ${password_success}</span>
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                                                                </div>`);
                      
                            
                },
                                                                      
                error: function(response){
                   
                        console.log(response.responseJSON.errors);
                        var errors = response.responseJSON.errors;
                        var password_errors = '';
                        errors.password.forEach(function(element) {
                                                        password_errors =   password_errors + `<li>${element}</li>`;
                                                            });
                        $('.error2').html(`<div class="text-danger">
                                            <ul style="    list-style-type: none; padding-left: 0px;">
                                                ${password_errors}
                                            </ul>
                                            </div>`);
                       
                },
                
                                    });
                                        
                                    });
                                    });
 </script>
        <!-- end ajax -->

        <!-- show password -->
<script>
    $('.clk').on('click', function(e) {
        if ($(this).closest(".form-group").children('.myInput').attr('type') === "password") {
            $(this).closest(".form-group").children('.myInput').attr('type', "text");
        } else {
            $(this).closest(".form-group").children('.myInput').attr('type', "password");
        }

    })

</script>