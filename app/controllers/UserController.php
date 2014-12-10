<?php
class UserController extends BaseController {

    /**
     * レスポンスで必ず使用するレイアウト
     */
    protected $layout = 'layouts.master';

    /**
     * ユーザープロファイル表示
     */
    public function showProfile()
    {
        $this->layout->content = View::make('user.profile');
    }

}
?>
