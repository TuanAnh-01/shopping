<x-app-layout>
    
    <head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>SB Admin 2 - Tables</title>
    
        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    
        <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    </head>
    
    <body id="page-top">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Status
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email </th>
                                <th>Note</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                        @foreach($history as $h)
                            <tr>
                                
                                <td>{{ $h->name }}</td>
                                <td>{{ $h->phone }}</td>
                                <td>{{ $h->email }}</td>
                                <td>{{ $h->note }}</td>
                                <td>${{number_format($h->total, 0, ',', '.')}}</td>
                                @if($h->status == 'Wait for confirmation')
                                <td style="color:rgb(16, 19, 17)">{{ $h->status }}</td>
                                @elseif($h->status == 'Confirmation failed')
                                <td style="color: red">{{ $h->status }}</td>
                                @else
                                <td style="color: green">{{ $h->status }}</td>
                                @endif
                                <td><a href="{{ route('order_detail', $h->id) }}" class="btn btn-primary">Order details</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    
        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    
        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>
    
    </body>
    </x-app-layout>
    