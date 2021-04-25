<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Quick Access</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive table-invoice">
          <table class="table table-striped" id="siap_tagih">
            <thead>
              <tr class="text-center">
                <th>No</th>
                <th>No Order</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data['FIN']['quick_access'] as $item)
              <tr class="text-center">
                <td style="width: 50px;">
                    {{$loop->iteration}}
                </td>
                <td style="width: 120px;">
                    {{$item[0]->no_order}}
                </td>
                <td>
                  {{Dit::Rupiah(Dit::GrandTotal($item[0]->finance['id']))}}
                </td>
                <td>
                    <div class="badge badge-{{$item['badge']}}">{{Dit::Remove_($item[0]->finance['status'])}}</div>
                </td>
                <td>
                    <a href="{{route('finance.show', $item[0]->id)}}" class="btn btn-primary">Detail</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>