@extends('app')
@section('container')
<div class="w-full h-full">
    <div class="w-full flex justify-center mt-28">
        <div class="w-2/3 bg-white rounded shadow-md p-2">
            <div class="create_section border-b-2 border-violet-400 pb-3">
                <form action="{{ URL('category') }}" method="POST">
                  @csrf
                    <div class="form-group flex items-center space-x-2">
                        <div class="relative">
                            <input type="text" id="name_category" name="name_category"
                                class="block px-6 py-3 w-full text-sm text-gray-900 bg-transparent rounded border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="name_category"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama
                                Kategori</label>
                        </div>
                        <div class="btn_submit pt-2">
                            <button type="submit"
                                class="text-white bg-violet-400 hover:bg-violet-600 focus:ring-4 focus:ring-violet-300 font-medium rounded text-sm w-full py-3 px-6 mr-2 mb-2 dark:bg-violet-600 dark:hover:bg-violet-700 focus:outline-none dark:focus:ring-violet-800 flex items-center"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                                Tambah Kategori</button>
                        </div>
                    </div>
                </form>
            </div>
            @if ($mess = Session::get('success'))
            <div class="alert_success w-full mt-5 p-2 text-center bg-green-400 text-white rounded-md">
              <p>{{ $mess }}</p>
            </div>
            @elseif ($mess = Session::get('delete'))
            <div class="alert_success w-full mt-5 p-2 text-center bg-red-400 text-white rounded-md">
              <p>{{ $mess }}</p>
            </div>
            @endif
            <div class="table_section mt-5">
                <div class="overflow-x-auto relative">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-violet-400 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Category Name
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($categories as $key => $category)
                          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                              <td class="py-4 px-6 bg-gray-100 text-gray-500" id="showCategory{{ $category->id }}">
                                {{ $category->name_category }}
                              </td>
                              <td class="py-4 px-6">
                                 <div class="flex items-center space-x-3">
                                   <button type="button" data-modal-toggle="cat_modal{{ $category->id }}" class="rounded bg-yellow-400 text-white p-2 px-6" id="editBtn">Edit</button>
                                   <form action="{{ URL("category/" . $category->id) }}" method="POST">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="rounded bg-red-400 text-white p-2 px-6" onClick="return confirm('Kategori Akan Dihapus?')">Delete</button>
                                   </form>
                                 </div>
                              </td>
                          </tr>
                          <div id="cat_modal{{ $category->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="cat_modal{{ $category->id }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                      <h3 class="mb-4 text-xl font-medium text-gray-500 dark:text-white">Update Category</h3>
                                        <form class="space-y-6" action="{{ URL("category/" . $category->id) }}" method="POST">
                                          @csrf
                                          @method("PUT")
                                          <div class="relative">
                                            <input type="text" id="floating_outlined" name="name_category"
                                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-600 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " value="{{ old('name_category', $category->name_category) }}" />
                                            <label for="floating_outlined"
                                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama Category</label>
                                        </div>
                                        <div class="flex justify-center mt-3">
                                          <button class="p-2 rounded bg-green-400 flex items-center space-x-2">
                                            <span class="text-white uppercase">Update</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-6 h-6 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                          </svg>
                                          </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                          </div>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
