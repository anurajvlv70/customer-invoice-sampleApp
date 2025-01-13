<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                    <!-- Button to add (green color) -->
                    
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Add
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <form method="POST" action="{{ route('cus_submit') }}">
                            @csrf
                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" name="name" 
                                           class="form-control">
                                           <input type="hidden" name="operation" value="create">
                                           <input type="hidden" name="mode" value="customer">

                                </div>

                                <!-- Age -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" 
                                           class="form-control">
                                </div>

                                

                                <!-- Phone Number -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" 
                                           class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" id="address" name="address" 
                                           class="form-control">
                                </div>
                            
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    Register
                                </button>
                            </div>
                        </form>
      </div>
 
    </div>
  </div>
</div>
                </div>
            </div>
        </div>
    </div>        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Table -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Customer List</h2>

       
 
        <!-- DataTable -->
        <table id="blood" class="table table-striped table-hover align-middle" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="place">Name</th>
                    <th scope="col" class="place">Email </th>
                    <th scope="col" class="place">Phone</th>
                    <th scope="col" class="place">Address</th> 
                    
                </tr>
            </thead>
            <tbody>
                @foreach($userdetails as $key=> $user)
                    <tr>
                        <td class="place">{{ $user->name }}</td>
                        <td class="place">{{ $user->email }}</td>
                        <td class="place">{{ $user->phone }}</td>
                        <td class="place">{{ $user->address }}</td>
                        <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customermodal{{$key}}">
Edit
</button>
</td>

<!-- Modal -->
<div class="modal fade" id="customermodal{{$key}}" tabindex="-1" aria-labelledby="customermodal{{$key}}Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="customermodal{{$key}}Label">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <form method="POST" action="{{ route('cus_submit') }}">
                            @csrf
                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" name="name" value="{{$user->name}}"
                                           class="form-control">
                                           <input type="hidden" name="operation" value="edit">
                                           <input type="hidden" name="userId" value="{{$user->id}}">
                                           <input type="hidden" name="mode" value="customer">
                                </div>

                                <!-- Age -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" value="{{$user->email}}"
                                           class="form-control">
                                </div>

                                

                                <!-- Phone Number -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" value="{{$user->phone}}"
                                           class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" id="address" name="address" value="{{$user->address}}"
                                           class="form-control">
                                </div>
                            
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    Register
                                </button>
                            </div>
                        </form>
      </div>

    </div>
  </div>
</div>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>

    <!-- Include JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            var table = $('#patient').DataTable({
                responsive: true,
                pageLength: 5, // Display 5 rows per page
                lengthMenu: [5, 10, 25, 50],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                order: [[0, 'asc']], // Default order by the first column
                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' + // Add layout options
                     't' +
                     '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'] // Export options
            });

            
        });
    </script>
</x-app-layout>
