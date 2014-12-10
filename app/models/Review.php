<?php
  class Review extends Eloquent {

    /**
     * このモデルで使用されるデータベース名
     *
     * @var string
     */
    protected $table = 'reviews'; // デフォルト通りのため、必要なし

    // 以下のプロパティ追加
    /**
     * 複数代入禁止フィールド指定
     *
     * @var array
     */
    protected $guarded = array('id');
  }
?>
