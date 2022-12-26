       @extends('layout.index')
       @section('content')
       <div class="container">

       	<!-- slider -->
       	@include('layout.slide')
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
           @include('layout.menu')

           <div class="col-md-9">
             <div class="panel panel-default">            
              <div class="panel-heading" style="background-color:#337AB7; color:white;" >
               <h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
            </div>

            <div class="panel-body">
               <!-- item -->
               <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
               
               <div class="break"></div>
               <h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
               <p>180 Cao Lỗ, p4, q8</p>

               <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
               <p>180 Cao Lỗ, p4, q8</p>

               <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
               <p>180 Cao Lỗ, p4, q8</p>



               <br><br>
               <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
               <div class="break"></div><br>
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.9544103877593!2d106.67564341435995!3d10.737997192347644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f62a90e5dbd%3A0x674d5126513db295!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgU8OgaSBHw7Ju!5e0!3m2!1svi!2s!4v1671868561043!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
         </div>
      </div>
   </div>
   <!-- /.row -->
</div>
@endsection