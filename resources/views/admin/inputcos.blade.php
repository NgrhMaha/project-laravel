<x-template-layout>
    <div class>
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
          {{$judul}}
        </h2>
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <form action="{{(isset($costumer))?route('costumer.update',$costumer->id):route('costumer.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($costumer))
            @method('PUT')
        @endif
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="nama" class="block text-sm font-medium text-gray-700">
                  Nama 
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="nama" id="nama" value="{{(isset($costumer))?$costumer->nama:old('nama') }}" class="@error('title') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="nama.CELL">
                </div>
                <div class="text-xs text-red-600">@error('nama') {{$message}} @enderror</div>
              </div>
            </div>  
          </div>

          <div class="px-3 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="alamat" class="block text-sm font-medium text-gray-700">
                  Alamat
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="alamat" id="alamat" value="{{(isset($costumer))?$costumer->alamat:old('alamat') }}" class="@error('title') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Alamat">
                </div>
                <div class="text-xs text-red-600">@error('alamat') {{$message}} @enderror</div>
              </div>
            </div>
          </div>
 
          <div class="px-3 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="nohp" class="block text-sm font-medium text-gray-700">
                  No Handphone
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="nohp" id="nohp" value="{{(isset($costumer))?$costumer->nohp:old('nohp') }}" class="@error('title') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="nomor handphone">
                </div>
                <div class="text-xs text-red-600">@error('alamat') {{$message}} @enderror</div>
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