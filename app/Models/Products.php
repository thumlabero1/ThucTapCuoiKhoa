<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [ //phương thức protected là bắt buộc để trường name hợp lệ
        'ProductName',
        'Description',
        'Price',
        'Quantity',
        'Manufacturer',
    ];

    
	/**
	 * @return mixed
	 */
	public function getFilltable() {
		return $this->filltable;
	}
	
	/**
	 * @param mixed $filltable 
	 * @return self
	 */
	public function setFilltable($filltable): self {
		$this->filltable = $filltable;
		return $this;
	}

}
