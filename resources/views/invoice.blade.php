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
<!-- Modal for Adding New Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Customer Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('cus_submit') }}">
                    @csrf
                    <div class="row g-3">
                        <!-- Customer Name -->
                        <div class="col-md-6">
                            <label for="customer" class="form-label">Customer</label>
                            <select name="customer" id="">
                                @if (isset($userdetails))
                                @foreach ($userdetails as $customer )
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach
                                @else
                                <option disabled >No customers</option>
                                @endif
                               
                            </select>
                            <input type="hidden" name="operation" value="create">
                        </div>

                        <!-- Date -->
                        <div class="col-md-6">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" id="date" name="date" class="form-control">
                            <input type="hidden" name="mode" value="invoice">
                            <input type="hidden" name="operation" value="create">

                        </div>

                        <!-- Amount -->
                        <div class="col-md-6">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" id="amount" name="amount" class="form-control">
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="unpaid">unpaid</option>
                                <option value="paid">paid</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </div>
                </form>
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
                <th scope="col" class="place">Customer</th>
                <th scope="col" class="place">Date</th>
                <th scope="col" class="place">Amount</th>
                <th scope="col" class="place">Status</th>
                <th scope="col" class="place">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $key => $invoice)
                <tr>
                    <td class="place">{{ $invoice->customer->name }}</td>
                    <td class="place">{{ $invoice->date }}</td>
                    <td class="place">{{ $invoice->amount }}</td>
                    <td class="place">{{ $invoice->status }}</td>
                    <td> 
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customermodal{{$key}}">
                            Edit
                        </button>
                    </td>

                    <!-- Modal for Editing Data -->
                    <div class="modal fade" id="customermodal{{$key}}" tabindex="-1" aria-labelledby="customermodal{{$key}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="customermodal{{$key}}Label">Edit Customer Info</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('cus_submit') }}">
                                        @csrf
                                        <div class="row g-3">
                                            <!-- Customer Name -->
                                            <div class="col-md-6">
                                                <label for="customer" class="form-label">Customer</label>
                                                <select id="customer" name="customer" class="form-control">
                                                    @foreach ($userdetails as $userdetail)
                                                    <option value="{{$userdetail->id}}" @if($invoice->customer->id == $userdetail->id) selected @endif>{{$userdetail->name}}</option>
                                                    @endforeach
                                                    
        
                                                </select>
                                                <input type="hidden" name="operation" value="edit">
                                                <input type="hidden" name="invoiceId" value="{{$invoice->id}}">
                                            </div>

                                            <!-- Date -->
                                            <div class="col-md-6">
                                                <label for="date" class="form-label">Date</label>
                                                <input type="date" id="date" name="date" value="{{$invoice->date}}" class="form-control">
                                                <input type="hidden" name="mode" value="invoice">

                                            </div>

                                            <!-- Amount -->
                                            <div class="col-md-6">
                                                <label for="amount" class="form-label">Amount</label>
                                                <input type="number" id="amount" name="amount" value="{{$invoice->amount}}" class="form-control">
                                            </div>

                                            <!-- Status -->
                                            <div class="col-md-6">
                                                <label for="status" class="form-label">Status</label>
                                                <select id="status" name="status" class="form-control">
                                                    <option value="pending" @if($invoice->status == 'pending') selected @endif>Pending</option>
                                                    <option value="completed" @if($invoice->status == 'completed') selected @endif>Completed</option>
                                                    <option value="cancelled" @if($invoice->status == 'cancelled') selected @endif>Cancelled</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-primary w-100">Update</button>
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