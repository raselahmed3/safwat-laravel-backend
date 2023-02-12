<div class="relative overflow-x-auto  max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <form class="py-4" wire:submit.prevent="formSubmit">
           <label for="helper-text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">WhatsApp Number</label>
           <div class="flex gap-2 items-center">
               <input type="number" id="helper-text" wire:model="phone_number" required aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type WhatsApp Number">
               <button type="submit" class="py-2 px-4 rounded text-white bg-blue-500">Save</button>
           </div>
        @error('phone_number')
        <p class="text-red-600 text-sm py-2">{{$message}}</p>
        @enderror
    </form>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
              Phone Number
            </th>
            <th scope="col" class="px-6 py-3">
               Actions
            </th>
        </tr>
        </thead>
        <tbody>
            @foreach($numbers as $number)
               <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4">
               {{$number->phone_number}}
            </td>
            <td class="px-6 py-4">
              <div class="flex items-center gap-2">
                  <button wire:click="edit({{$number->id}})" class="bg-green-500 text-white py-1 px-2 rounded">Edit</button>
                  <form wire:submit.prevent="delete({{$number->id}})">
                      <button onclick='return confirm("Want to delete?")'  class="bg-red-500 text-white py-1 px-2 rounded">Delete</button>
                  </form>
              </div>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>

   @if($modal)
       <!-- Main modal -->
           <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
               <div class="absolute w-full h-full bg-gray-300 left-0 top-0 opacity-25 z-10"></div>
               <div class="flex justify-center items-center h-full">
                   <!-- Modal content -->
                   <div class="relative bg-white rounded-lg shadow w-[500px] dark:bg-gray-700 z-20">
                       <button wire:click="modal('close')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                           <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                           <span class="sr-only">Close modal</span>
                       </button>
                       <div class="px-6 py-6 lg:px-8">
                           <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Number</h3>
                           <form class="py-4" wire:submit.prevent="update">
                               <label for="e_phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">WhatsApp Number</label>
                               <div class="flex gap-2 items-center">
                                   <input type="number" id="e_phone_number" wire:model="e_phone_number" required aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type WhatsApp Number">
                                   <button type="submit" class="py-2 px-4 rounded text-white bg-blue-500">Update</button>
                               </div>
                               @error('e_phone_number')
                               <p class="text-red-600 text-sm py-2">{{$message}}</p>
                               @enderror
                           </form>
                       </div>
                   </div>
               </div>
           </div>
   @endif

   <div class="text-white py-4">
       {{$numbers->links()}}
   </div>
</div>

