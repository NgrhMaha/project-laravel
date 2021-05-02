<x-template-layout>
    <div>
        <div class="">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <div class="grid grid-cols-12">
          <div class="col-span-6 p-4">
            <a href="{{route('costumer.create')}}">  <button type="button" class="focus:outline-none text-purple-600 text-sm py-2.5 px-5 rounded-md hover:bg-purple-100">Tambah</button></a>
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
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">
                Checklist
              </th>
              <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">
                No
              </th>
              <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">
                Nama Costumer
              </th>
              <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">
                Alamat
              </th>
              <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">
                No Hp
              </th>
              <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">
                Aksi
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <?php $nomor=1; ?>
            @foreach ($costumer as $item)
            <tr>
              <td class="px-6 py-3"><input type="checkbox" name="" id=""></td>
              <td class="px-6 py-3">{{$nomor}}</td>
              <td class="px-6 py-3">{{$item->nama}}</td>
              <td class="px-6 py-3">{{$item->alamat}}</td>
              <td class="px-6 py-3">{{$item->nohp}}</td>
              <td class="px-6 py-3">
                <form action="{{route('costumer.destroy',$item->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('costumer.edit',$item->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Del</button>
                </form>
              </td>
            </tr>
            @endforeach
            <?php $nomor++; ?>
          </tbody>
        </table>
      </div>
        </div>
    </div>
</x-template-layout>