@extends('admin.layouts.app')

@section('title')
  الإقسام
@endsection

@section('section.content')

@if ($courses->count())
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>إسم القسم</th>
                        <th>عدد المقالات</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($courses as $row)
                        <tr>
                            <td>
                                {{ $row->id }}
                            </td>
                            <td>{{ $row->name }}</td>
                            <td>
                                {{count($row->posts)}}
                            </td>
                            <td>
                              <a class="btn btn-default" href = '/cp/courses/{{$row->id}}/edit'><i class = 'ion ion-edit'></i></a>
                              <a class="btn btn-default" href = "/cp/courses/{{$row->id}}/delete" ><i class = 'ion ion-trash-a'></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
@else
    NotFound
@endif


@endsection

