
<div>
  
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
  
    @if($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif
  
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 dd" id="nestable-wrapper">
        	  <ol class="dd-list list-group bg-white p-4 flex flex-col rounded-md">
                @foreach($categories as $k => $category)
                    <li class="dd-item list-group-item relative block p-2 bg-white border border-[#ccc] mb-1" data-id="{{ $category['category_id'] }}" >
                        <div class="dd-handle text-lg" >{{ $category['name'] }}</div>
                        <div class="dd-option-handle">
                            <a href="#" wire:click="edit({{$category['category_id']}})" class="btn btn-success btn-sm bg-[#28a745] rounded-full inline-block py-2 px-4 text-white" >Edit</a> 
                            <a wire:click="deleteCategory({{$category['category_id']}})" href="#" class="btn btn-danger btn-sm bg-[#dc3545] rounded-full inline-block py-2 px-4 text-white" >Delete</a> 
                        </div>

                        @if(!empty($category->categories))
                            @include('livewire.child-category-view', [ 'category' => $category])
                        @endif
                    </li>
                @endforeach
            </ol>
            
        </div>
    </div>
    <div class="pb-4">
        <form>
            <textarea style="display: none" wire:model="nested_category_array" id="nestable-output" wire:change="changeEvent()" ></textarea>
            <button wire:click.prevent="saveNestedCategories()" class="btn btn-success bg-[#233876] rounded-full block py-4 px-6 text-white w-auto mx-auto my-4 font-bold">Save category</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 --><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>

<script src="{{ url('category/js/jquery.nestable.js') }}"></script>


<script src="{{ url('category/js/style.js') }}">
</script>

<script src="https://cdn.tailwindcss.com"></script>







