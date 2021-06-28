<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\ProductCategory;

class Select extends Component
{

  public $name = 'category_id';
  public $selected = 0 ,$except = 0;
  public $type = 0;

  function branch( $item){
      if($this->except == $item->id ) return;
      if($item->parent_id && $this->except == $item->parent_id ) return;
      if(empty($this->selected))
          return "<option value='$item->id' >$item->name</option>";
      return ($this->selected == $item->id ) ?
        "<option selected value='$item->id' >$item->name</option>"  :
        "<option value='$item->id' >$item->name</option>";
  }


  function tree(){
    $options = "<option value='0' >----</option>";
    foreach(ProductCategory::root()->whereTypeId($this->type)->get() as $category){
        $options .=  $this->branch($category);
        foreach($category->tree() as $branch){
          $branch->name =  '--'.Str::padLeft( $branch->name, $branch->level, '--');
          $options .=  $this->branch($branch);
        }
    }
    return $options;
  }

  public function render()
  {
      return view('livewire.category.select')->with([
          'tree'  =>  $this->tree()
      ]);
  }

}
