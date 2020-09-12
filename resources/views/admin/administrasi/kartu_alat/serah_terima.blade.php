<div class="card">
          <div class="card-header">
              <h4>Serah Terima Kartu Alat</h4>
          </div>
          <div class="card-body">
              
              <div class="card">
                  <div class="card-header" style="font-weight: bold;">
                      UPK UNTUK LABORATORIUM
                  </div>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-6">
                              <form action="{{route('administrasi.serahterima', $order->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf()  
                                <table>
                                      <tr class="text-center">
                                          <td colspan="3">Yang Menerima</td>
                                      </tr>
                                      <tr>
                                          <td class="pt-5">Tanda Tangan</td>
                                          <td class="pt-5">:</td>
                                          <td class="pl-5 pt-5">____________________________________</td>
                                      </tr>
                                      <tr>
                                          <td>Nama</td>
                                          <td>:</td>
                                          <td class="pl-5">
                                                  
                                              @if (!isset($order->serahterima['id_upk_penerima']))
                                              <select class="custom-select" name="id_upk_penerima">
                                                  <option disabled>-- Pilih --</option>
                                                  @foreach ($user as $item)
                                                      <option value="{{$item->id}}">{{$item->name .' ('. $item->sub_role .')'}}</option>
                                                  @endforeach
                                                </select>
                                              @else 
                                              {{Dit::getUser($order->serahterima['id_upk_penerima'])->name}}
                                              @endif
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>Instansi</td>
                                          <td>:</td>
                                          <td class="pl-5">
                                              @if (isset($order->serahterima['id_upk_penerima']))
                                                {{Dit::getRole($order->serahterima['id_upk_penerima'])}}
                                              @endif
                                            </td>
                                      </tr>
                                      <tr>
                                          <td></td>
                                          <td></td>
                                          <td class="pt-3">
                                              @if (!isset($order->serahterima['id_upk_penerima']))
                                                <button type="submit" class="btn btn-primary float-right btn-sm"><i class="fas fa-save"></i> Simpan</button>
                                              @else 
                                                  <button type="button" class="btn btn-primary float-right btn-sm"><i class="fas fa-pencil-alt"></i> Edit</button>
                                              @endif
                                          </td>
                                      </tr>
                                  </table>
                              </form>
                          </div>

                          <div class="col-6">
                              <form action="{{route('administrasi.serahterima', $order->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf()  
                                <table>
                                      <tr class="text-center">
                                          <td colspan="3">Yang Menyerahkan</td>
                                      </tr>
                                      <tr>
                                          <td class="pt-5">Tanda Tangan</td>
                                          <td class="pt-5">:</td>
                                          <td class="pl-5 pt-5">____________________________________</td>
                                      </tr>
                                      <tr>
                                          <td>Nama</td>
                                          <td> : </td>
                                          <td class="pl-5">
                                              @if (!isset($order->serahterima['id_upk_penyerah']))
                                                {{-- <select class="custom-select" name="id_upk_penyerah">
                                                    <option disabled>-- Pilih --</option>
                                                    @foreach ($user as $item)
                                                        <option value="{{ $item->id == \Auth::user()->id ? \Auth::user()->id : $item->id }}" {{Dit::Selected($item->id, \Auth::user()->id)}}>{{ $item->id == \Auth::user()->id ? \Auth::user()->name : $item->name }}</option>
                                                    @endforeach
                                                  </select> --}}
                                                <input type="text" readonly id="" class="form-control" value="{{\Auth::user()->name}}">
                                                <input type="text" name="id_upk_penyerah" hidden id="" class="form-control" value="{{\Auth::user()->id}}">
                                              @else 
                                              {{Dit::getUser($order->serahterima['id_upk_penyerah'])->name}}
                                              @endif
                                              
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>Instansi</td>
                                          <td> : </td>
                                          <td class="pl-5">
                                            @if(isset($order->serahterima['id_upk_penyerah']))
                                            {{Dit::getRole($order->serahterima['id_upk_penyerah'])}}
                                            @endif
                                          </td>
                                      </tr>
                                      <tr>
                                          <td></td>
                                          <td></td>
                                          <td class="pt-3">
                                              @if (!isset($order->serahterima['id_upk_penyerah']))
                                                    <button type="submit" class="btn btn-primary float-right btn-sm"><i class="fas fa-save"></i> Simpan</button>
                                                @else 
                                                    <button type="button" class="btn btn-primary float-right btn-sm"><i class="fas fa-pencil-alt"></i> Edit</button>
                                                @endif
                                          </td>
                                      </tr>
                                  </table>
                              </form>
                          </div>
                      </div>
                      
                  </div>
              </div>
              
              <div class="card">
                  <div class="card-header" style="font-weight: bold;">
                      LABORATORIUM UNTUK UPK
                  </div>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-6">
                              <form action="#">
                                  <table>
                                      <tr class="text-center">
                                          <td colspan="3">Yang Menerima</td>
                                      </tr>
                                      <tr>
                                          <td class="pt-5">Tanda Tangan</td>
                                          <td class="pt-5">:</td>
                                          <td class="pl-5 pt-5">____________________________________</td>
                                      </tr>
                                      <tr>
                                          <td>Nama</td>
                                          <td>:</td>
                                          <td class="pl-5">
                                              {{-- <select disabled class="custom-select">
                                                  <option disabled>-- Pilih --</option>
                                                  @foreach ($user as $item)
                                                      <option value="1">{{$item->name}}</option>
                                                  @endforeach
                                                </select> --}}
                                                {{isset($order->serahterima['id_lab_penerima']) ? Dit::getUser($order->serahterima['id_lab_penerima'])->name : '-'}}
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>Instansi</td>
                                          <td>:</td>
                                          <td class="pl-5">
                                                {{isset($order->serahterima['id_lab_penerima']) ? Dit::getRole($order->serahterima['id_lab_penerima']) : '-'}}
                                            </td>
                                      </tr>
                                  </table>
                              </form>
                          </div>

                          <div class="col-6">
                              <form action="#">
                                  <table>
                                      <tr class="text-center">
                                          <td colspan="3">Yang Menyerahkan</td>
                                      </tr>
                                      <tr>
                                          <td class="pt-5">Tanda Tangan</td>
                                          <td class="pt-5">:</td>
                                          <td class="pl-5 pt-5">____________________________________</td>
                                      </tr>
                                      <tr>
                                          <td>Nama</td>
                                          <td> : </td>
                                          <td class="pl-5">
                                              {{-- <select disabled class="custom-select">
                                                  <option disabled>-- Pilih --</option>
                                                  @foreach ($user as $item)
                                                      <option value="{{$item->id}}">{{$item->name}}</option>
                                                  @endforeach
                                                </select> --}}
                                                {{isset($order->serahterima['id_lab_penyerah']) ? Dit::getUser($order->serahterima['id_lab_penyerah'])->name : '-'}}
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>Instansi</td>
                                          <td> : </td>
                                          <td class="pl-5">
                                                {{isset($order->serahterima['id_lab_penyerah']) ? Dit::getRole($order->serahterima['id_lab_penyerah']) : '-'}}
                                            </td>
                                      </tr>
                                  </table>
                              </form>
                          </div>
                      </div>
                      
                  </div>
              </div>

              

          </div>
      </div>