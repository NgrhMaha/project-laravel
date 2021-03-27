<x-template-layout>
    <div class>
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
          {{$title}}
        </h2>
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <form action="{{(isset($produk))?route('produk.update',$produk->id):route('produk.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($produk))
            @method('PUT')
        @endif
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-700">
                  Nama Produk
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="title" id="title" value="{{(isset($produk))?$produk->title:old('title') }}" class="@error('title') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="nama produk">
                </div>
                <div class="text-xs text-red-600">@error('title') {{$message}} @enderror</div>
              </div>
            </div>  
          </div>

          <div class="px-3 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700">
                  Deskripsi Produk
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="description" id="description" value="{{(isset($produk))?$produk->description:old('description') }}" class="@error('title') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="nama produk">
                </div>
                <div class="text-xs text-red-600">@error('description') {{$message}} @enderror</div>
              </div>
            </div>
          </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">
                Gambar Produk
              </label>
              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  @if (isset($produk) && $produk->cover!='')
                    <img src="{{asset('storage/'.$produk->cover)}}" class="w-16" alt="">
                  @else
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  @endif
                  <div class="flex text-sm text-gray-600">
                    <label for="cover" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                      <span>Upload a file</span>
                      <input id="cover" name="cover" type="file" class="sr-only">
                    </label>
                    <p class="pl-1">or drag and drop</p>
                  </div>
                  <p class="text-xs text-gray-500">
                    PNG, JPG, GIF up to 10MB
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
      </form>
        </div>
    </div>
</x-template-layout>