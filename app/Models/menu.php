<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Summary of Menu
 */
class Menu extends Model
{
    use HasFactory;
    /**
     * Summary of filltable
     * @var array
     */
    protected $fillable = [ //phương thức protected là bắt buộc để trường name hợp lệ
        'name',
        'parent_id',
        'description',
        'content',
        'active'
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
