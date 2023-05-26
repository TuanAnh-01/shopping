<?php

namespace App\Admin\Actions\Order_details;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Replicate extends RowAction
{
    public $name = 'Order details';

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function href()
    {
        return " orders/{$this->id}";
    }

}