@extends('layouts.app')

@section('content')
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                width: 80%;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Trips-Registration
                </div>
                @include('common.errors')
                <!-- 本登録フォーム -->
                <form action="{{ url('trips') }}" method="GET" class="form-horizontal">
                  {{ csrf_field() }}
                  <!-- 本のタイトル -->
                  <div class="form-group">
                    <label for="book" class="col-sm-3 control-label">Trips</label>
                    <div class="col-sm-6">
                      <input type="text" name="area" id="book-name" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-6">
                          <button type="submit" class="btn btn-default">
                              <i class="fa fa-plus"></i> Save
                          </button>
                      </div>
                  </div>
                </form>
            </div>
        </div>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif


            <div class="content">
                <div class="title m-b-md">
                    Trips
                </div>
                @if (count($trips) > 0)
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      旅先
                    </div>
                    <div class="panel-body">
                      <table class="table table-striped task-table">
                        <thead>
                          <th>行き先</th>
                          <th>地域</th>
                          <th>詳細</th>
                          <th>から</th>
                          <th>まで</th>
                        </thead>
                        <tbody>
                          @foreach($trips as $trip)
                          <tr>
                            <td>
                              {{ $trip -> title }}
                            </td>
                            <td>
                              {{ $trip -> destination -> area }}
                            </td>
                            <td>
                              {{ $trip -> description }}
                            </td>
                            <td>
                              {{ $trip -> best_season_from }}
                            </td>
                            <td>
                              {{ $trip -> best_season_to }}
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  @endif
            </div>
        </div>
        @endsection
