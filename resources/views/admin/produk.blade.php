<x-template-layout>
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate px-5">
          {{$title}}
    </h2>
    <div class="grid grid-cols-12">
          <div class="col-span-6 p-4">
            <a href="{{route('produk.create')}}">  <button type="button" class="focus:outline-none text-purple-600 text-sm py-2.5 px-5 rounded-md hover:bg-purple-100">Tambah</button></a>
            <a href=""><button type="button" class="focus:outline-none text-yellow-600 text-sm py-2.5 px-5 rounded-md hover:bg-yellow-100">Hapus</button></a>
          </div>
          <div class="col-span-6 p-4 flex justify-end">
            <div class="relative text-gray-600">
              <input type="search" name="serch" placeholder="Search" class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
                <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                  <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                  </svg>
                </button>
            </div>
          </div>
    </div>
    <section class="text-gray-600 body-font">
      <div class="container px-5 py-5 mx-auto">
        <div class="flex flex-wrap -m-4">
        @foreach ($produk as $item)
          <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
            <a class="block relative h-48 rounded overflow-hidden">
              <img alt="ecommerce" class="object-cover object-center w-40 h-40" src="{{asset('storage/'.$item->cover)}}">
            </a>
            <div class="mt-4">
              <h2 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{$item->title}}</h2>
              <h2 class="text-gray-900 title-font text-lg font-medium">{{$item->description}}</h2>
              <form action="{{route('produk.destroy',$item->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="{{route('produk.edit',$item->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-2 rounded">Edit</a>
                  <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-medium py-1.5 px-2 rounded">Del</button>
              </form>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
</x-template-layout>