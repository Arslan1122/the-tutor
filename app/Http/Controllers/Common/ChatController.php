<?php

namespace App\Http\Controllers\Common;



use App\Http\Controllers\Controller;
use App\Models\ChatRoom;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class ChatController extends Controller
{
    public function show($user_id=null){


            $loginUser = Auth::user()->id;
//            $users = DB::select("select users.id, users.name,users.is_admin, teacher_profiles.profile_img,student_profiles.profile_img as student_img , count(is_read) as unread from users
//           LEFT JOIN chat_rooms on users.id =chat_rooms.from and is_read=0 and chat_rooms.to=" . $loginUser . "
//           LEFT JOIN teacher_profiles on users.id=teacher_profiles.user_id
//           LEFT JOIN student_profiles on users.id=student_profiles.user_id
//           where users.id !=" . $loginUser . " or chat_rooms.from = ". $loginUser ." group by users.id, users.name,users.is_admin,teacher_profiles.profile_img,student_img
//           ORDER BY unread DESC");
//            dd($users);

      $users=DB::table('chat_rooms')
          ->leftJoin('users','users.id','=','chat_rooms.from')
          ->leftJoin('teacher_profiles','users.id','=','teacher_profiles.user_id')
          ->leftJoin('student_profiles','users.id','=','student_profiles.user_id')
          ->where('chat_rooms.from',$loginUser)
          ->where('users.id','!=',$loginUser)
          ->orWhere('chat_rooms.to',$loginUser)
          ->select('users.id', 'users.name','users.is_admin', 'teacher_profiles.profile_img','student_profiles.profile_img as student_img'  )

          ->get();




            return view('common.chatroom.index', compact('users','user_id'));





    }
    public function singleChatBox($id){
        $my_id = Auth::id();
        ChatRoom::where(['from' => $id, 'to' => $my_id])->update(['is_read' => 1]);
        //All message of selected user
        //getting those message which is from=Auth::id() and to=user_id or from=user_id and to:Auth::id()
        $user = DB::table('users')
//             ->leftJoin('teacher_profiles','users.id','=','teacher_profiles.user_id')
//             ->leftJoin('student_profiles','users.id','=','student_profiles.user_id')
//            ->select('users.id', 'users.name','users.is_admin', 'teacher_profiles.profile_img','student_profiles.profile_img as student_img' )
            ->where('id', $id)
            ->first();
        $messages = ChatRoom::with('user')->where(function ($query) use ($id, $my_id) {
            $query->where('from', $my_id)->where('to', $id);
        })->orwhere(function ($query) use ($id, $my_id) {
            $query->where('from', $id)->where('to', $my_id);
        })->get();





        return view('common.chatroom.single-chatbox', compact('messages', 'user'));

    }
    public function sendMessage(Request $request){

        $new_img='';
        $msg = new ChatRoom();
        if($request->file!="undefined"){
            $file=$request->file;
            $new_img='chatfile'.time().uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/chats/'),$new_img);
            $msg->file = $new_img;

        }
        $from = Auth::user()->id;
        $to = $request->to;
        $msg->to = $request->to;
        $msg->from = Auth::user()->id;
        $msg->message = $request->msg;

        $msg->is_read = 0;
        $msg->save();

        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => true
        );
        $pusher = new pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data = ['from' => $from, 'to' => $to,'img','file'=>$new_img];





        $pusher->trigger('my-channel', 'my-event', $data);


    }
    public function getMessage($id)
    {
        $my_id = Auth::id();

        //All message of selected user
        //getting those message which is from=Auth::id() and to=user_id or from=user_id and to:Auth::id()

        $user = User::where('id', $id)->first();

        $messages = ChatRoom::with('user')->where(function ($query) use ($id, $my_id) {
            $query->where('from', $my_id)->where('to', $id);
        })->orwhere(function ($query) use ($id, $my_id) {
            $query->where('from', $id)->where('to', $my_id);
        })->get();
        return view('ajax.get-message', compact('messages', 'user'));
    }

    public function createNewChat($id){
        $my_id=Auth::id();
        $chatExist = ChatRoom::where(function ($query) use ($id, $my_id) {
            $query->where('from', $my_id)->where('to', $id);
        })->orwhere(function ($query) use ($id, $my_id) {
            $query->where('from', $id)->where('to', $my_id);
        });
        if($chatExist->doesntExist()){
            ChatRoom::create([
                'to'=>$id,
                'from'=>$my_id,
                'message'=>'hiii'
            ]);
        }
    }
}
