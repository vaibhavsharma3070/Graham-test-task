<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class Category extends Component
{
	protected $listeners = ['get_cate' => 'get_data'];
	public $name, $parent_id, $category_id ,$nested_category_array, $city_id;
	public $updateMode = false;
	public function get_data(){
		return CategoryModel::where(['parent_id' => 0])->orderBy('sort_order', 'ASC')->get();
	}
	protected $rules = [
        'name'=>'required'     
    ];
    public function render()
    {
    	$this->emit('get_cate');
    	 $info = [
            'categories' => $this->get_data(),
            'cate_list' => CategoryModel::orderBy('name', 'ASC')->get(),
        ];

        return view('livewire.category', $info);
    }
    public function resetFields(){
        $this->name = '';
        $this->category_id = 0;
        $this->parent_id = 0;
    }
    public function create()
    {
    	 $info = [
            'categories' => CategoryModel::orderBy('name', 'ASC')->get(),
        ];
        return view('livewire.create', $info);
    }
     public function store(){
     	$validatedDate = $this->validate([
            'name' => 'required',
            
        ]);
        $data = [
        	'name' => $this->name,
        	'parent_id' => (!empty($this->parent_id))? $this->parent_id : 0,

        ];
  
        CategoryModel::create($data);
  
        session()->flash('message', 'Category Created Successfully.');
        $this->emit('get_cate');
        $this->resetFields();
     }
     public function deleteCategory($id){
     	$category = CategoryModel::find($id);
        $category->delete();
         $this->emit('get_cate');
     }
	public function edit($id){
     	$category = CategoryModel::find($id);
     	$this->name = $category->name;
     	$this->parent_id = $category->parent_id;
     	$this->category_id = $category->category_id;
        $this->updateMode = true;
       
     }
    public function cancel()
    {
        $this->updateMode = true;
        $this->resetFields();
    }
    public function update(){

        // Validate request
        $this->validate();

        try{

            // Update category
            CategoryModel::find($this->category_id)->fill([
                'name'=>$this->name,
                'parent_id' => (!empty($this->parent_id))? $this->parent_id : 0,
            ])->save();

            session()->flash('success','Category Updated Successfully!!');
            $this->cancel();
            $this->emit('get_cate');
            $this->updateMode = true;
        }catch(\Exception $e){
            session()->flash('error','Something goes wrong while updating category!!');
            $this->cancel();
             $this->updateMode = true;
        }
    }
   
    public function saveNestedCategories(){
    	


    }
    public function recur1($nested_array=[], &$simplified_list=[]){
        
        static $counter = 0;
        
        foreach($nested_array as $k => $v){
            
            $sort_order = $k+1;
            $simplified_list[] = [
                "category_id" => $v['id'], 
                "parent_id" => 0, 
                "sort_order" => $sort_order
            ];
            
            if(!empty($v["children"])){
                $counter+=1;
                $this->recur2($v['children'], $simplified_list, $v['id']);
            }

        }
    }
    public function recur2($sub_nested_array=[], &$simplified_list=[], $parent_id = NULL){
        
        static $counter = 0;

        foreach($sub_nested_array as $k => $v){
            
            $sort_order = $k+1;
            $simplified_list[] = [
                "category_id" => $v['id'], 
                "parent_id" => $parent_id, 
                "sort_order" => $sort_order
            ];
            
            if(!empty($v["children"])){
                $counter+=1;
                return $this->recur2($v['children'], $simplified_list, $v['id']);
            }
        }
    }

   


}
