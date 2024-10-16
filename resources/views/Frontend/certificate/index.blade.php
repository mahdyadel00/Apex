@extends('layouts.Frontend.master')
@section('content')
<style>
    /* page certificate */

    #certificate {
      margin: 60px 40px;
    }

    #certificate .search {
      padding: 7px 15px;
      margin: 10px;
      border-radius: 5px;
      width: 200px;
    }


    #certificate table {
      width: 100%;
      border-collapse: collapse;
      table-layout: fixed;
      white-space: nowrap;
    }

    #certificate table img {
      width: 70px;
      height: 70px;
      border-radius: 50%;
    }

    #certificate table td:nth-child(1) {
      width: 100px;
      text-align: center;
    }

    #certificate table td:nth-child(2) {
      width: 150px;
      text-align: center;
    }

    #certificate table td:nth-child(3) {
      width: 100px;
      text-align: center;
    }

    #certificate table td:nth-child(4),
    #certificate table td:nth-child(5),
    #certificate table td:nth-child(6) {
      width: 150px;
      text-align: center;
    }

    #certificate table td:nth-child(4) input {
      width: 70px;
      padding: 10px 5px 10px 15px;
      border-radius: 3px;
    }

    #certificate table thead {
      border: 1px solid #000;
      border-left: none;
      border-right: none;
    }

    #certificate table thead td {
      padding: 15px 0;
      font-weight: 700;
      text-transform: uppercase;

    }

    #certificate table tbody tr td {
      padding-top: 15px;
    }
    #certificate table tbody tr {
      padding: 10px 0;
      border: 1px solid #000;
    }

    #certificate table tbody td {
      font-size: 18px;

    }
    @media (max-width:790px) {
      #certificate {
        margin: 30px 20px;
      }

      #certificate {
        overflow: auto;
      }
    }

    @media (max-width:900px) {
      #certificate {
        overflow: auto;
      }
    }
</style>
<div>
<h1 style="text-align: center;
    margin: 20px 0; font-size:25px">{{ __('front.certificates') }}</h1>
</div>




    <section id="certificate">
 <form action="{{route('certificates.index')}}" method="get">
    <label> Serial Number</label>
      <input type="text" id="serial" name="serial" placeholder="serial number" class="search" value="{{ request('serial') ?? ' '}}">
       <button class="btn btn-primary" type="submit" style="margin: 10px 0 20px 0;">{{ __('front.search') }}</button>
    </form>
      <table width="100%" id="certificateTable">
        <thead>
          <tr>
            <td>{{ __('front.image') }}</td>
            <td>{{ __('front.serial_number') }}</td>
            <td>{{ __('front.name') }}</td>
            <td>{{ __('front.email') }}</td>
            <td>{{ __('front.phone') }}</td>
            <td>{{ __('front.certificate') }}</td>
          </tr>
        </thead>
        <tbody>

            @foreach($students as $student)
              <tr>
                <td>
                    @foreach($student->media as $media)
                        @if($media->name == 'image' && $media != null)
                            <a href="{{ asset("storage/" . $media->path) }}" target="_blank">
                                <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px" alt="Student Image">
                            </a>
                        @else
                            <img src="{{ asset("front/img/logo1.png") }}" width="100px" height="100px" alt="Student Image">
                       @endif
                    @endforeach
                </td>
                <td>{{ $student->serial_number }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>
                    @foreach($student->media as $media)
                        @if($media->name == 'certificate')
                            <a href="{{ asset("storage/" . $media->path) }}" target="_blank">
                                <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                     alt="{{ __('front.certificate') }}">
                            </a>
                        @endif
                    @endforeach
                </td>
              </tr>
            @endforeach
        </tbody>

      </table>

    </section>

    @include('layouts.Frontend._footer')
@endsection
@push('js')
    <script>

        //if click input search show table
        $('.search_btn').click(function () {
            $('#certificateTable').show();
        });

    </script>
@endpush
