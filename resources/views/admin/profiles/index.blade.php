@extends('admin.layouts.app')

@section('title')
  الأعضاء
@endsection

@section('css')
  <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('section.content')

        <table class="table table-striped table-hover table-responsive datatable" id="users-table">
          <thead>
              <tr>
                  <th>#</th>
                  <th>الرقم التعريفي</th>
                  <th>الإسم</th>
                  <th>التلفون</th>
                  <th>الإيميل</th>
                  <th></th>
              </tr>
          </thead>
          {{-- <tbody>
              @foreach($user as $value)
              <tr>

                  <td>{{$value->id}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{$value->admin}}</td>
                  <td>
                          <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/page/{{$value->id}}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                          <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/page/{{$value->id}}/edit'><i class = 'material-icons'>edit</i></a>
                          <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/page/{{$value->id}}'><i class = 'material-icons'>info</i></a>
                  </td>
              </tr>
              @endforeach
          </tbody> --}}

        </table>
        

@endsection


@section('js')
  <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
  <script type="text/javascript">
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! url('/cp/profiles/data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'trainer_id', name: 'trainer_id' },
                { data: 'name', name: 'name' },
                { data: 'phone', name: 'phone' },
                { data: 'email', name: 'email' },
                { data: 'control', name: '' }
            ],
            "language": {
            "url": "{{ Request::root() }}/Arabic.json"
          },
            "stateSave": true,
            "responsive": true,

            "order": [[0, 'desc']],
            "pagingType": "full_numbers",
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            iDisplayLength: 25,
            fixedHeader: true,

            "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
            ,initComplete: function ()
            {
                var r = $('#data tfoot tr');
                r.find('th').each(function(){
                    $(this).css('padding', 8);
                });
                $('#data thead').append(r);
                $('#search_0').css('text-align', 'center');
            }
        });
    });

    table.columns().eq(0).each(function(colIdx) {
        $('input', table.column(colIdx).header()).on('keyup change', function() {
            table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
        });
    });



    table.columns().eq(0).each(function(colIdx) {
        $('select', table.column(colIdx).header()).on('change', function() {
            table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
        });

        $('select', table.column(colIdx).header()).on('click', function(e) {
            e.stopPropagation();
        });
    });



  </script>
@endsection
