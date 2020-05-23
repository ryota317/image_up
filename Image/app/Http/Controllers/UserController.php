<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    //
public function get_user_info(){

    $user = \Auth::user();
    $user_id = $user->id;
    $image = new Image();

    // $images = $image->find($user_id);
    // $images = Image::where('contributor', $user_id);
    // $images[] = Image::where('contributor', $user_id);

    $images = DB::table('images')->where('contributor', $user_id)->get();



    return view('/user-info' , ['user' => $user ,'images' => $images]);
}

}
