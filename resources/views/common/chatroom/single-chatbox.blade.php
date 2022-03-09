<div class="message-box" id="add-data">
    <div class="head-box-1">

        <ul class="msg-box list-inline text-left d-inline-block float-left">
            <li> <i class="fas fa-arrow-left" id="back"></i> </li>
            <li> <img src="https://i.ibb.co/fCzfFJw/person.jpg" alt="" width="40px"> <span> {{$user->name}} </span> <br>
            </li>
        </ul>


    </div>

    <div class="msg_history">
        @foreach($messages as $message)
            @if(!empty($message->message) || !empty($message->file) )
        <div class="{{$message->from==Auth::id() ? 'outgoing_msg' : 'incoming_msg'}}">
            @if($message->from!=Auth::id())
            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
            @endif
                <div class="{{$message->from==Auth::id() ? 'sent_msg' : 'received_msg'}}">
                    @if($message->from!=Auth::id())
                <div class="received_withd_msg">
                    @endif
                    <p>{{$message->message}}</p>
                    @if($message->file)
                        @php
                            $file=explode('.',$message->file)
                        @endphp
                        @if($file[1]=="pdf")
                            <a href="{{url('upload/chats/'.$message->file)}}" target="_blank">
                                <img src="{{asset('upload/chatdef.png')}}" alt="image"
                                     class="{{$message->from==Auth::id()?'float-right' : 'float-left'}}"
                                     style="height:100px;">
                            </a>
                        @else
                            <a href="{{url('upload/chats/'.$message->file)}}" target="_blank">
                                <img src="{{asset('upload/chats/'.$message->file)}}" alt="image"
                                     class="{{$message->from==Auth::id()?'float-right' : 'float-left'}}"
                                     style="height:100px;">
                            </a>
                        @endif
                    @endif
                    <time datetime="2017-08-08 mt-1"></time>

                    <span class="time_date"> {{$message->created_at->format('d M Y h:i')}}</span>
                    @if($message->from!=Auth::id())
                </div>
                        @endif
            </div>
        </div>
            @endif
            @endforeach

    </div>

    <div class="send-message">
        <form action="" method="">
            <textarea cols="10" rows="2" class="form-control" id="message" name="message" placeholder="Type your message here ..."> </textarea>
            <ul class="list-inline">
                <li>
                    <i> <label for="actual-btn" style="cursor:pointer"><i class="fas fa-paperclip"></i> </label>
                    </i>
                    <i style="width:400px" > <label id="file-name"> </label> </i>
{{--                    <a href="javascript:void 0" id="attach">  <i class="fas fa-paperclip"></i> </a>--}}
                    <input type="file" name="file" id="actual-btn" hidden  />

                </li>
                <li><a href="javascript:void 0" id="sendmessage"><i class="fas fa-paper-plane"></i> </a> </li>
            </ul>
        </form>
    </div>
    <div class="progress" >
        <div id="bar"></div >
        <div class="percent">0%</div >
    </div>


</div>
