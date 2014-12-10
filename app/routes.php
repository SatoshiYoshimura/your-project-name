<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
 */

Route::get('/', function()
{
  return View::make('hello');
});

Route::get('users', function()
{
  $users = User::all();
  return View::make('users')->with('users',$users);

});

Route::get( '/user/add', function()
{
  return View::make( 'user.create' );
} );

Route::post( '/user/add',
  array ( 'before' => 'csrf', function()
  {
    $inputs = Input::only( array ( 'username', 'email', 'password' ) );

    $rules = array (
      'username' => array ( 'required', 'min:4', 'max:32', 'unique:users' ),
      'password' => array ( 'required', 'min:6', 'max:30' ),
      'email' => array ( 'required', 'email', 'max:320', 'unique:users' ),
    );

    $val = Validator::make( $inputs, $rules );

    if ( $val->fails() )
    {
      return Redirect::back()->withErrors( $val )->withInput();
    }

    User::create( $inputs );

    return Redirect::back();
    }
  )
);

// Laravel4の新機能

Route::model( 'user', 'User' );  // {user}とUserクラスを結びつける

Route::get( '/user/{user}', // 存在しないIDなら、404
  function(User $user)
  {
    // この時点で$userは存在しているレコード
    return View::make( 'user.update' )->with( 'user', $user );
  }
);

Route::post( '/user/{user}', // 存在しないIDなら、404
  array ( 'before' => 'csrf', function(User $user)
  {
    // この時点で$userは存在しているレコード
    $inputs = Input::only( array ( 'username', 'email', 'password' ) );

    $rules = array (
      'username' => array ( 'required', 'min:4', 'max:32', 'unique:users,username,'.$user->id ),
      'password' => array ( 'required', 'min:6', 'max:30' ),
      'email' => array ( 'required', 'email', 'max:320', 'unique:users,email,'.$user->id ),
    );
    $val = Validator::make( $inputs, $rules );

    if ( $val->fails() )
    {
      return Redirect::back()->withErrors( $val )->withInput();
    }

    $user->fill( $inputs )->save();

    return Redirect::back();
    }
  )
);

Route::get( '/review/add', function(){
  return View::make( 'review.add' );
});

Route::post('/review/add', array ( 'before' => 'csrf', 'uses' =>'ReviewController@add'));
