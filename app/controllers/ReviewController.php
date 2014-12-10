<?php
class ReviewController extends BaseController{

  public function add(){
      $inputs = Input::only( array ( 'title', 'body' ) );

      $rules = array (
        'title' => array ( 'required', 'max:32' ),
        'body' => array ( 'required', 'max:200' ),
      );

      $val = Validator::make( $inputs, $rules );

      if ( $val->fails() )
      {
        return Redirect::back()->withErrors( $val )->withInput();
      }

      Review::create( $inputs );

      return Redirect::back();
  }
}
?>
