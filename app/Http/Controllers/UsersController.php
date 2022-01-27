<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateInfo;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
      // user profile
      public function user()
      {
          return Auth::user();
      }

      // Update info

      public function updateInfo()
      {
          $user = Auth::user();

        //   $user->update($request->only('name','user_name','email','avatar'));

          return response(Auth::user(),Response::HTTP_ACCEPTED);
      }

}
