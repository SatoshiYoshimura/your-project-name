<?php
  use Illuminate\Auth\UserInterface;
  use Illuminate\Auth\Reminders\RemindableInterface;

  class User extends Eloquent implements UserInterface, RemindableInterface {

    /**
     * このモデルで使用されるデータベース名
     *
     * @var string
     */
    protected $table = 'users'; // デフォルト通りのため、必要なし

    /**
     * JSON形式への変換時に、対象外にするフィールド
     *
     * @var array
     */
    protected $hidden = array('password');

    // 以下のプロパティ追加
    /**
     * 複数代入禁止フィールド指定
     *
     * @var array
     */
    protected $guarded = array('id');

    /**
     * ユーザーを一意に特定するIDを取得
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
      return $this->getKey();
    }

    /**
     * ユーザーのパスワードを取得
     *
     * @return string
     */
    public function getAuthPassword()
    {
      return $this->password;
    }

    /**
     * パスワードリマンダーを送信するメールアドレスの取得
     *
     * @return string
     */
    public function getReminderEmail()
    {
      return $this->email;
    }

    // 以下のメソッド追加
    /**
     * パスワードセッター
     *
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
      $this->attributes['password'] = Hash::make($value);
    }

    public function getRememberToken()
    {
          return $this->remember_token;
    }

    public function setRememberToken($value)
    {
          $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
          return 'remember_token';
    }
  }
?>

