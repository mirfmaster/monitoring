<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Hash;
use Session;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('admin.Priviledges.profile', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user = User::where('id', $user->id)->first();
        $user->name = $request->name;
        $user->save();
        return redirect()->route('user.edit',$user->id)->with("sucMsg","Name changed successfully");
    }

    public function password()
    {
        $user = Auth::user();
        return view('admin.Priviledges.password', compact('user'));
    }

    public function avatar(Request $request)
    {
        $user = Auth::user();
        return view('admin.Priviledges.avatar', compact('user'));
    }

    public function changePassword(Request $request)
    {
        $newHash=Hash::make($request->new);
        $userId=Auth::user()->id;
        $userPassword=Auth::user()->password;
        if(Hash::check($request->old,$userPassword)){
            if(!Hash::check($request->new,$userPassword)){
                if ($request->new===$request->confirmation) {
                    $user = User::find($userId)->firstOrFail();
                    $user->password = Hash::make($request->new);
                    $user->where('id', '=', $userId)->update(['password' => $user->password]);
                    return redirect()->back()->with("sucMsg","Password changed successfully !");
                }
                else
                {
                    return redirect()->back()->with("errMsg","Your new password is mismatch. Please try again.");   
                }
            } else {
                return redirect()->back()->with("errMsg","New Password cannot be same as your current password. Please choose a different password.");
            }
        } else{
            return redirect()->back()->with("errMsg","Your password is wrong");
        }
    }

    public function updateAvatar(Request $request)
    {
        $user=new User;
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,|max:10000',
        ]);
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $avatar = time().'.'.$image->getClientOriginalExtension();
                $email=Auth::user()->email;
                $target_dir = public_path('avatars/'.$email);
                $prevImage=$target_dir."/".Auth::user()->avatar;
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                if($user->avatar!=NULL){
                    chmod($prevImage,0777);
                    unlink($prevImage);
                }
                $image->move($target_dir, $avatar);
                $user->where('email', '=', $email)->update(['avatar' => $avatar]);
                return redirect()->back()->with("sucMsg","Changes successfully!");
            }
    }

    public function removeAvatar(request $request)
    {
        $id=Auth::user()->id;
        $user = User::where('id', $id)->first();
        $file= public_path("avatars/".$user->email."/".$user->avatar);
        if(unlink($file)){
            $user->avatar=NULL;
            $user->save();
            return redirect()->back()->with("sucMsg","Avatar deleted!");
        } else {
            return redirect()->back()->with("errMsg","Cant delete file, please contact administrator");
        }
        
    }
}
