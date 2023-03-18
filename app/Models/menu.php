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
    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'content',
        'slug',
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
