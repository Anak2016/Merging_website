
@extends('layouts.app')
@section('title', 'contact')
@section('data-page-id', 'contact')

@section('content')



<div id="content"><!--content start -->
    <div class="container"><!--container start-->
        <div class="col-md-12"><!--col-md-12 start-->
            <ul class="breadcrumb"><!--breadcrumb start -->
                <li>
                    <a href="/sam_public/">Home</a>
                </li>
                <li>
                    Contact Us
                </li>
            </ul>
        </div> <!--col-md-12 end-->

        <div class="col-md-12"><!--col-md-9 -->
            <div class="box"><!--box start -->
                <div class="box-header"><!--box-header -->
                    <center><!--center start -->
                        <h2>Contact Us</h2>
                        <p class="text-muted">
                            If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.
                        </p>
                    </center>
                </div>

                <form action="contact.php" method="post"><!--form start -->
                    <div class="form-group"><!--form-group start -->
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group"><!--form-group start -->
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>

                    <div class="form-group"><!--form-group start -->
                        <label>Subject</label>
                        <input type="text" class="form-control" name="subject" required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>Message</label>
                        <textarea class="form-control" name="message"></textarea>
                    </div>
                    <div class="text-center"><!--text-center -->
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-user-md"></i>Send Message
                        </button>
                    </div>


                </form>

                



            </div>
        </div>


</div> <!--container end-->
</div> <!--content end-->
@stop