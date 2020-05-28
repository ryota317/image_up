<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\EmailChangeRequest;
use App\Image;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function get_user_info(Request $request){

        $user = \Auth::user();
        $user_id = $user->id;
        $image = new Image();

        // $images = $image->find($user_id);
        // $images = Image::where('contributor', $user_id);
        // $images[] = Image::where('contributor', $user_id);
        $images = DB::table('images')->where('contributor', $user_id)->get();


        if(isset($request->del)){
             return view('/user-info' , ['user' => $user ,'images' => $images,'del_msg' => '画像を削除しました']);

        }else if(isset($request->name_change)){
             return view('/user-info' , ['user' => $user ,'images' => $images,'change_msg' => 'ユーザ名変更しました']);
        }else if(isset($request->email_change)){
            return view('/user-info' , ['user' => $user ,'images' => $images,'email_msg' => 'メールアドレスを変更しました']);
        }else{
            return view('/user-info' , ['user' => $user ,'images' => $images]);
        }
    }

    public function user_name_change(Request $request){

        $user = \Auth::user();
        $user->name = $request->new_name;
        $user->save();
        $user_info = $this->get_user_info($request);

        return $user_info;
    }

    public function user_email_change(EmailChangeRequest $request){
   
        $user = \Auth::user();
        $new_email = $request->new_email;
        $old_email = $user->email;

        if( $new_email == $old_email){

            return  back()->with('message', '新しいメールアドレスを指定してください');
        }

        $user->email = $request->new_email;
        $user->save();
        $user_info = $this->get_user_info($request);
        
        return $user_info;
    }
}
