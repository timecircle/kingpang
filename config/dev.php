<?php

return [
    'status'      =>  ['publish','draft'],
    'order_status'=>  ['order','paid','process'],
    'device'      =>  ['web','mobile'],
    'creator'     =>  ['email' => 'admin@kingpang.vn','first_password' => '123@123'],
    'packs'       =>  ['deluxe','premium'],
    'attributes'  =>  ['price','delivery','revisions','description'],
    'alias'       =>  [
      'post'      =>  'App\Models\Post',
      'product'   =>  'App\Models\Porduct',
    ],
    'app'         =>  [
      'kingpang'  => 'NgUaKXk/S3hV6HXjCuc6UegjfS0LevWr7Zrx1XNTwJo=',
      'version'   => '0.0.1',
    ],
    'state_edu'   =>  ['graduated','attending','learning','incomplete','complete'],
];
