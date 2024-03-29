<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;







class ProfileController extends Controller
{
    public function index(User $user)
    {


        $follows =(auth()->user()) ? auth()->user()->following->contains($user):false;

        $postCount=Cache:: remember(
            'count.posts.' . $user->id,
             now()->addSeconds(30),
             function() use($user){
                return $user->posts->count();
        });

        //$followersCount=$user->profile->followers->count();

        
        $followingCount=Cache:: remember(
            'count.posts.' . $user->id,
             now()->addSeconds(30),
             function() use($user){
                return $user->following->count();
        });


        return view('profiles.index',compact('user','follows','postCount','followingCount'));
    }
    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);

        return view('profiles.edit',compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update',$user->profile);

        $data=request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'',

        ]);


        if(request('image')){
            $imagePath=(request('image')->store('profile','public'));

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(100,100);
        $image->save();

        $imageArray=['image'=>$imagePath];

        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ??[]

        ));

        return redirect("/profile/{$user->id}");
    }



}
