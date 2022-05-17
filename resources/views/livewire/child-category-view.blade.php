@if(!empty($category->categories))
    <ol class="dd-list list-group bg-white p-4 flex flex-col rounded-md">
        @foreach($category->categories as $kk => $sub_category)
            <li class="dd-item list-group-item relative block p-2 bg-white border border-[#ccc] mb-1" data-id="{{ $sub_category['category_id'] }}" >
                <div class="dd-handle text-lg" >{{ $sub_category['name'] }}</div>
                <div class="dd-option-handle">
                    <a href="#" wire:click="edit({{$sub_category['category_id']}})" class="btn btn-success btn-sm btn-sm bg-[#28a745] rounded-full inline-block py-2 px-4 text-white" >Edit</a> 
                    <a href="#" wire:click="deleteCategory({{$category['category_id']}})" class="btn btn-danger btn-sm btn-sm bg-[#dc3545] rounded-full inline-block py-2 px-4 text-white" >Delete</a>
                </div>

                @include('livewire.child-category-view', [ 'category' => $sub_category])
            </li>
        @endforeach
    </ol>
@endif