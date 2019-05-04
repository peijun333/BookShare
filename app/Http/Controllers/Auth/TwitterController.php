<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;

class TwitterController extends Controller
{

    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback(){
        try {
            $userSocial = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect()->route('/')->withErrors('ユーザー情報の取得に失敗しました。');
        }
        $user = User::where(['twitter_id' => $userSocial->getNickname()])->first();
        
        if($user){
            // twitter id　が変更されている場合、DBアップデード
            if($user->twitter_id  !== $userSocial->getNickname()){
                $user->twitter_id = $userSocial->getNickname();
                $user->save();
            }
            
            Auth::login($user, true);
            return redirect('/');
        }else{
            //twitter_idがなければユーザ登録
            $newuser = new User;
            $newuser->name = $userSocial->getName();
            $newuser->twitter_id = $userSocial->getNickname();
            $img = file_get_contents($userSocial->avatar_original);
            if ($img !== false) {
                $file_name = $userSocial->id . '_' . uniqid() . '.jpg';
                Storage::put('public/profile_images/' . $file_name, $img);
                $newuser->avatar = $file_name;
            }   
            $newuser->save();
            Auth::login($newuser, true);
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        // 各自ログアウト処理
        // 例
        // Auth::logout();
        return redirect('/');
    }
}
