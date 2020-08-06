@extends('layouts.admin-master')

@section('title')
Labs
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Master Data Labs</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
          
                      <div class="mt-3">
                        <a href="{{route('labs.create')}}" class="btn btn-primary mb-5 float-right">Tambah Sub Lab</a>
                      </div>
          
                      <div class="table-responsive">
                      
                        <table class="table table-striped table-sm" id="tablelab">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Sub Lab</th>
                            </tr>
                          </thead>
                          <tbody>
                              @php
                                  $no = 1;
                              @endphp
                              @foreach ($labs as $item)   
                              <tr>
                                  <td>{{$no++}}</td>
                                  <td>
                                      {{$item->sub_lab}} <br>
                                      <a href="{{route('labs.edit', $item->id)}}">Edit</a> <a href="javascript:void(0)" onclick="myConfirm({{$item->id}})">Delete</a>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
        
        
      </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
    function myConfirm(id) {
        var r = confirm("Yakin ingin menghapus ?");
        if (r) {
          $.ajax({
            url : "/labs/"+id,
            type: 'DELETE',
            success: function(result) {
              alert('User deleted successfully.')
              $('#tablelab').load(location.href + " #tablelab")
            }
          })
        }
      }
</script>
@endpush