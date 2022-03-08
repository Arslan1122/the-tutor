
@php
    if(Auth::user()->hasRole("student")){
    $extnd='student.layout.master';
}

        elseif(Auth::user()->hasRole("teacher")){
     $extnd='teacher.layout.master';
        }

        else{
            $extnd='admin.layout.master';
        }
@endphp

@extends($extnd)



@section('style')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <style>


        .outln:focus{
            outline-style: none;
        }
        .progress { position:relative; width:100%; display:none}
        #bar { background-color: #4159f3; width:0%; height:20px; }
        .percent { position:absolute; display:inline-block; left:50%; color: #ffffff;}

        section{
            padding-top: 60px;
            padding-bottom: 60px;

        }
        ::-webkit-scrollbar {
            width: 2px;
        }

.active{
    color:#a7a4f6 !important;
}
        ::-webkit-scrollbar-thumb {
            background: #000;
            border-radius: 5px;
        }
        .chat-list-box {
            display: inline-block;
            max-height: 600px;
            overflow:scroll;
            width: 100%;
            background: #fff;
            box-shadow: 0px 10px 30px 0px rgba(50, 50, 50, 0.16);
        }

        .flat-icon li{
            display: inline-block;
            padding: 0px 8px;
            vertical-align: middle;
            position: relative;
            top: 7px;
        }

        .flat-icon a img {
            width: 22px;
            border-radius: unset !important;
        }

        ul.list-inline.text-left.d-inline-block.float-left {
            margin-bottom: 0;
        }

        .chat-list-box ul li img {
            border-radius: 50px;
        }

        .message-box{
            display: inline-block;
            width: 100%;
            background: #fff;
            box-shadow: 0px 10px 30px 0px rgba(50, 50, 50, 0.16);
        }

        .msg-box li{
            display:inline-block;
            padding-left: 10px;
        }

        .msg-box img{
            border-radius:50px;
        }

        .msg-box li span{
            padding-left:8px;
            color:#545454;
            font-weight:550;
        }

        .head-box {
            display: flow-root;
            padding: 26px;
            background: #6964f7;
        }
        .head-box ul li a{
            color:#fff;
        }
        .chat-person-list{
            padding:14px;
        }
        .chat-person-list ul li img{
            width:30px;
            border-radius:50px;
        }

        .chat-person-list ul li span {
            padding-left: 7px;
        }

        .chat-person-list ul li {
            line-height: 55px;
        }

        span.chat-time {
            float: right;
            font-size: 12px;
        }

        .head-box-1{
            display: flow-root;
            padding: 18px;
            background: #6964f7;
        }
        .head-box-1 ul li i{
            color:#fff;
            cursor:pointer;
        }
        .head-box-1 ul li span{
            color:#fff;
            position:relative;
            top:0px;
        }
        .msg_history {
            padding: 10px;
            height:415px;
            overflow: overlay;
        }
        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }
        .timee{
            position: absolute;
            left: 115px;
            top: 30px;
            color: #fff;}

        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }
        .received_withd_msg {
            width: 57%;
        }
        .received_withd_msg p {
            background: rgb(152 149 244 / 86%) none repeat scroll 0 0;

            border-radius: 3px;
            color: #ffffff;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 22px;
            width: 100%;
            border-bottom-right-radius: 50px;
            border-top-left-radius: 50px;
        }
        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }
        .incoming_msg_img img {
            width: 100%;
            border-radius: 50px;
            float: left;
        }
        .outgoing_msg {
            overflow: hidden;
            margin: 10px 0 10px;
        }
        .sent_msg {
            float: right;
            width: 46%;
        }
        .sent_msg p {
            background: #ddd;
            border-radius: 3px;
            font-size: 14px;
            margin: 0;
            color: #333;
            padding: 5px 10px 5px 22px;
            width: 100%;
            border-bottom-right-radius: 50px;
            border-top-left-radius: 50px;
        }
        .chat-person-list ul li a {
            color: #545454;
            text-decoration: none;
        }
        .attachement {
            background: #777;
            position: absolute;
            width: 220px;
            right: 30%;
            top: 42px;
            display: none;
        }
        .attachement ul li {
            display: -webkit-inline-box;
            margin: 0px 19px 15px 20px;
        }
        .attachement ul li a{
            color:#fff;
        }

        .setting-drop{
            display: none;
            position: absolute;
            width: 130px;
            height: 148px;
            right: 0;
            top: 42px;
            background: #ffffff;
            color: #545454;
            box-shadow: 1px 1px 15px 1px #0000001f;
        }

        .send-message {
            padding: 15px;
            background: #6964f7;
            height: auto;
        }
        .send-message textarea:focus {
            box-shadow: none;
            outline: none;
            border-color:#ddd;
        }
        .send-message ul li {
            display: -webkit-inline-box;
            padding-left: 15px;
        }
        .send-message ul li i{color:#0056b3;}
        .send-message ul li a{color:#0056b3;}
        .send-message ul {
            position: absolute;
            right: 45px;
            top: 88%;
            border-left: 1px solid #9c9a9a;
        }
        .send-message .form-control {
            border-radius: 50px;
        }

        @media only screen and (max-width: 800px) {

            .message-box {
                display: none;
                position:relative;
                top:-100%;
            }

        }
    </style>
@endsection
@section('content')
    <section>
        <div class="m-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="chat-list-box">
                        <div class="head-box text-light">
                            ALL USERS
                        </div>
                        <input type="hidden" id="user_id" value="{{$user_id}}">

                        <div class="chat-person-list">
                            <ul class="list-inline">
                                @foreach($users as $user)
                                <li> <a href="javascript:void(0)" class="user" id="{{$user->id}}">
                                        @if($user->profile_img)
                                        <img src="https://i.ibb.co/6JpcfrK/p4.png" alt="">
                                        @elseif($user->student_img)
                                            <img src="https://i.ibb.co/6JpcfrK/p4.png" alt="">
                                        @else
                                            <img src="https://i.ibb.co/6JpcfrK/p4.png" alt="">
                                        @endif
                                        <span > {{$user->name}}</span>
                                            @if(isset($user->unread) && $user->unread>0)
                                                <span class="pending badge badge-primary float-right ">{{$user->unread}}</span>
                                            @endif

                                         </a> </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div> <!-- col-md-4 closed -->

                <div class="col-md-8">

                    <div id="messages">

                    </div>


                </div>

            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <!-- Data tables -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

    <script>
        $(window).on('load', function() {
            var us_id=$('#user_id').val();
            if(us_id.length >0){

                $('#'+us_id).trigger('click');
            }
        });
        $(document).ready(function(){

        });

        $("#attach").click(function(){
            $(".attachement").toggle();
        });
    </script>
    <script>
        $("#dset").click(function(){
            $(".setting-drop").toggle('1000');
        });
    </script>

    <script>
        $(document).ready(function(){
            $(".flip").click(function(){
                $(".message-box").show("slide", { direction: "right" }, 10000);
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#back").click(function(){
                $(".message-box").hide("slide", { direction: "left" }, 10000);
            });
        });
    </script>

    <script>


        var receiver_id='';
        var my_id={{Auth::user()->id}};
        console.log(receiver_id);

        $(document).ready(function(){


            $('#filter').keyup(function() {
                // Retrieve the input field text and reset the count to zero
                var filter = $(this).val(),
                    count = 0;
                // Loop through the comment list
                $('#results div').each(function() {
                    // If the list item does not contain the text phrase fade it out
                    if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                        $(this).hide();  // MY CHANGE
                        // Show the list item if the phrase matches and increase the count by 1
                    } else {
                        $(this).show(); // MY CHANGE
                        count++;
                    }
                });
            });



            $('.user').click(function(){
                $('.user').removeClass('active');
                $(this).addClass('active');
                receiver_id=$(this).attr('id');
                $(this).find('.pending').remove();

                $.ajax({
                    type:"GET",
                    url:'/chatroom/'+receiver_id,
                    cache:false,
                    success: function(data){
                        $('#messages').html(data);
                        //scrollToBottom();
                        var objDiv = document.getElementById("add-data");
                        objDiv.scrollTop = objDiv.scrollHeight;

                    }
                });

            });

            $(document).on('click','#sendmessage', function(event){



                var msg=$('#message').val();
                var fuData = document.getElementById('actual-btn');
                var FileUploadPath = fuData.value;
                //To check if user upload any file
                if (FileUploadPath == '' && msg== '') {
                    alert("you cant send empty chat");
                }
                else{
                    var form_data = new FormData();
                    if(fuData.files[0]){
                        var name = fuData.files[0].name;
                        var ext = name.split('.').pop().toLowerCase();
                        if(jQuery.inArray(ext, ['pdf','png','jpg','jpeg']) == -1)
                        {
                            alert("Invalid File type. file must be pdf, png , jpg , jpeg ");

                            var oFReader = new FileReader();
                            oFReader.readAsDataURL(fuData.files[0]);
                            var f = fuData.files[0];
                            var fsize = f.size||f.fileSize;
                            if(fsize > 500000)
                            {
                                alert("Image File Size is very big");
                                return true;
                            }
                        }

                        else{
                            $('.progress').show();
                            var i = 0;
                            if (i == 0) {
                                i = 1;
                                var elem = document.getElementById("bar");
                                var width = 0;
                                var id = setInterval(frame, 10);
                                function frame() {
                                    if (width >= 100) {
                                        clearInterval(id);
                                        i = 0;
                                    } else {
                                        width++;
                                        elem.style.width = width + "%";
                                        $(".percent").text(width  + "%");
                                    }
                                }
                            }

                            form_data.append( "_token", "{{csrf_token()}}" );
                            form_data.append("file", fuData.files[0]);
                            form_data.append('msg',msg );
                            form_data.append('to',receiver_id );

                            $.ajax({
                                type:'POST',
                                url:"{{route('massage.send')}}",
                                data: form_data,

                                contentType: false,
                                cache: false,
                                processData: false,

                                success: function(data){
                                    $('.progress').hide();
                                    $('#message').val('');
                                    var objDiv = document.getElementById("add-data");
                                    objDiv.scrollTop = objDiv.scrollHeight;
                                },
                            });
                        }
                    }
                    else{

                        form_data.append( "_token", "{{csrf_token()}}" );
                        form_data.append("file", fuData.files[0]);
                        form_data.append('msg',msg );
                        form_data.append('to',receiver_id );
                        $.ajax({
                            type:'POST',
                            url:"{{route('massage.send')}}",
                            data: form_data,
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(data){
                                $('#message').val('');
                                var objDiv = document.getElementById("add-data");
                                objDiv.scrollTop = objDiv.scrollHeight;
                            },
                        });
                    }
                }




            });

            $(document).on('change','#actual-btn' ,function(e){

                var fileName = e.target.files[0].name;
                $('#file-name').text(fileName);

            });





        });









    </script>

@endsection
