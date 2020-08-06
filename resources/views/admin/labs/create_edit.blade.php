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
          
                      <div class="table-responsive">
                      
                        <form action="{{isset($labs) ? route('labs.update', $labs->id) : route('labs.store')}}" method="POST" enctype="multipart/form-data">
                            @isset($labs)
                                @method('PUT')
                            @endisset
                            @csrf
                            <div class="form-group">
                                <label for="sub_lab">Sub Lab</label>
                                <input type="text" name="sub_lab" id="" value="{{isset($labs) ? $labs->sub_lab : ''}}" class="form-control">
                            </div>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-primary float-left">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                        
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
@endpush