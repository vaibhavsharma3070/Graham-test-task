<div class="container mx-auto">
    <div class="bg-white p-4 shadow-md my-4">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12">
                <h2 class="text-lg font-bold pb-4"> {{ (isset($category['category_id']))? "Edit" : "Create" }} Category Form</h2>
            </div>
        </div>

        <div class="">
        <form >
           
            @if(isset($category['category_id']))
                <input type="hidden" name="category_id" value="{{ $category['category_id'] }}" >
            @endif
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <label for="exampleFormControlInput1" class="block mb-2">Name</label>
                    <input type="text" class="p-2 w-full border border-[#ccc]" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="name">
                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-span-12">
                    <label for="exampleFormControlInput2" class="block mb-2">Parent Category ID:</label>
                    <select wire:model="parent_id" class="form-control p-2 w-full border border-[#ccc]">
                        <option value="">Choose One</option>
                        @foreach($cate_list as $k => $v)
                            <option value="{{ $v['category_id'] }}" {{ (isset($category['parent_id']) && $category['parent_id'] == $v['category_id'])? 'selected="selected"' : '' }} >{{ $v['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-12">
                    <button wire:click.prevent="update()" class="bg-[#233876] rounded-full inline-block py-3 px-6 text-white">Save</button>
                    <button wire:click.prevent="cancel()" class="bg-[#dc3545] rounded-full inline-block py-3 px-6 text-white">Cancel</button>
                </div>
            </div>     
        </form>
        </div>
    </div>
</div>
     

