<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;
	public function __construct($oldCart){
		if($oldCart){
			$this->items= $oldCart->items;
			$this->totalQty= $oldCart->totalQty;
			$this->totalPrice= $oldCart->totalPrice;
		}
	}
	public function add($item, $id){
		$giohang = ['qty'=>0,'price' => $item->dongia,'item'=>$item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['qty']++;
		$giohang['price']= $item->dongia * $giohang['qty'];
		$this->items[$id] = $giohang;
		$this->totalQty++;
		$this->totalPrice += $item ->dongia;
	}
	public function addmany($item, $old, $sl, $id){
		$this->totalPrice -= $item->dongia*$old;
		$giohang = ['qty'=>0,'price' => $item->dongia,'item'=>$item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['qty'] = $sl;
		$giohang['price']= $item->dongia * $giohang['qty'];
		$this->items[$id] = $giohang;
		$this->totalQty = $sl;
		$this->totalPrice += $giohang['price'];
	}
	//xoa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['dongia'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['dongia'];
		if($this->items[$id]['qty']<=0){
			unset($this-> items[$id]);
		}
	}
	//xoa nhieu
	public function removeItem($id){
		$this->totalQty -= $this-> items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this -> items[$id]);
	}


	
}
