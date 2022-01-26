<?php

namespace App\Http\Controllers\Api\Test\Rest;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    /**
     * @param Blog $item
     * @return mixed
     */
    public function destroy(Blog $item)
    {
        return $item->delete();
    }
}


// TODO::存在しないリソースへの通信 200 ok
// http://localhost/api/users/11


// TODO::成功時  200 ok
// データは消えている(message 無いからわからん)