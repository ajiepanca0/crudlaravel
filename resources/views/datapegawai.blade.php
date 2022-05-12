<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
   
    <title>DATA PEGAWAI</title>
  </head>
  <body>
    <h1 class="text-center mb-4">DATA PEGAWAI</h1>


    <div class="container">
        <a href="/tambahpegawai" class="btn btn-success mb-4">TAMBAH</a>
        
        <div class="row">

          <div class="col-auto">
            <form action="/pegawai" method="GET">
            <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
            </form>
          </div>

          <div class="col-auto">
            <a href="/exportpdf" class="btn btn-info mb-4">Export PDF</a>
          </div>
  

            {{-- @if ($message = Session::get('success'))

            <div class="alert alert-success" role="alert">
                {{$message}}
            </div>
                
            @endif --}}

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">No Telpon</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Aksi</th>
        
                  </tr>
                </thead>
                <tbody>

                    @php
                     $no = 1;   
                    @endphp
                    @foreach ($data as $index => $row)
                        
                  <tr>
                    <th scope="row">{{$index + $data->firstItem()}}</th>
                    <td>{{$row->nama}}</td>
                    <td>
                        <img src="{{asset('fotopegawai/'.$row->foto)}}"alt = "" style="width: 40px;">
                    </td>
                    <td style="text-transform: uppercase">{{$row->jeniskelamin}}</td>
                    <td>0{{$row->notelpon}}</td>
                    <td>{{$row->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="/deletedata/{{$row->id}}" class="btn btn-danger delete m-2" data-id="{{$row->id}}" data-nama="{{$row->nama}}" >Hapus</button>
                        <a href="/tampildata/{{$row->id}}" class="btn btn-warning">Edit</a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
              {{$data->links()}}
        </div>

    </div>


    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>  </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>

    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    $('.delete').click(function(){
        var namapegawai = $(this).attr('data-nama');
        var idpegawai = $(this).attr('data-id');
    swal({
        title: "Yakin?",
        text: "Kamu yakin ingin menghapus data pegawai dengan nama "+namapegawai+"",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            window.location = "/deletedata/"+idpegawai+""
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Data tidak jadi dihapus");
        }
      });
  }); 
  </script>
  
<script>
  @if (Session::has('success'))
    toastr.success("{{Session::get('success')}}") 
    @endif
    </script>

</html>