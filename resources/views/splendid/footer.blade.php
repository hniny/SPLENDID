<footer>
    <div class="footer">
        <div class="container">
            <div class="row adjust">
                <div class="col-md-4 col-sm-4">
                <a href="/about"><img src="/images/BG_(Black).png" alt="logo" width="80px" />
                    <span class="logotext">SPLENDID</span>
                    <p class="pt-1 fan"><span>Splendid, one of the top resellers in Myanmar, operates as a Gaming Products retail store having a strong partnership with well-known global brands and providing best price,best products and service to our customers.</span> </p></a> 
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2 col-sm-2">
                    <h5 class="contacttitle">Quick Link</h5>
                    <ul class="list-unstyled">
                        <li><a href="/" class="linkmenu">Home</a></li>
                        <li><a href="/about" class="linkmenu">About Us</a></li>
                        <li><a href="/contact" class="linkmenu">Contact Us</a></li>
                        <li><a href="/promotions" class="linkmenu">Promotion Items</a></li>
                        
                        
                        
                    </ul>
                </div>
                <div class="col-md-2 col-sm-2">
                    <h5 class="contacttitle">Contact Us</h5>
                    <table>
                        <tr>
                            <td>
                                 <i class="fab fa-facebook-f"></i>
                                
                            </td>
                            <td>
                                <a href="https://www.facebook.com/splendid.myanmar/" class="login"> Facebook</a>
                                
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <i class="fab fa-youtube"></i>
                                
                            </td>
                            <td><a href="https://www.youtube.com/channel/UCkM7jOs4kHg8rpri6e_jhCA?reload=9" class="login">Youtube</a></td>
                            
                        </tr>
                        
                        
                    </table>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h5 class="contacttitle">Subscribe for products news</h5>
                    @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
                    <p class="text"> Keep in touch with us!</p>
                    
                    <form action="/subscribe" method="post" >
                        {{ csrf_field() }}
                       <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="email" class="form-control email" placeholder="Enter Email">
                            <span class="input-group-btn">
                            <button type="submit" class="btn email" style="background-color:#E91D24;color: white;">Subscribe</button>
                            
                        </div>
                    </div>
                        
                        
                    </form>
                </div>
                
            </div>
            
        </div>
        
    </div>
    <p class="copyright mt-3">Copyright © 2019 Spendid Inc. All rights reserved</p>
    
</footer>

</div>

{{-- <script src="{{ asset('../js/jquery.min.js') }}"></script> --}}

<script src="{{asset('la/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('../js/popper.min.js') }}"></script>

<script src="{{ asset('../js/bootstrap.min.js') }}"></script>

<!-- <script src="./js/bootstrap-dropdownhover.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/owl.carousel.min.js"></script>
<script>
    
    function showCart() {
        $.ajax({
            type:'get',
            url:'/showShoppingCartCount',
            success:function(data){
                if(data.count>=1 )
                {
                    $('.lbcount').show();
                    $('#show-count').html(data.count);
                }
                else{
                    $('.lbcount').hide();
                }
               
            }
        });
    }
    showCart();
</script>
@stack('script')

</body>



</html>