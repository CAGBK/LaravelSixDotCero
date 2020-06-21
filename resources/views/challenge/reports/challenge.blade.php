@extends('layouts.app') @section('template_title') Desafíos @endsection @section('content')
<div class="form-card">
    <div class="col-12 nav-report-challenge">
        <h2 class="text ch-text fs-title-list">Reporte de Desafio</h2>
        <h3 class="text ch-text-two text-white">{{$challenge->name}}</h3>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <table id="challenge-report" class="table-responsive">
                <thead>
                    <tr>
                        <th class="sorting_asc"></th>
                        <th class="sorting_asc"></th>
                        <th class="sorting_asc"></th>
                        <th></th>
                        <th class="sorting_asc"></th>
                    </tr>
                </thead>
                @if ($users)
                <tbody>
                    @foreach($users as $user)
                    <tr class="tr-challenge-report">
                        <td class="sorting">
                            <label name="img-user" class="label-challenge-iteration" for="">{{ $loop->iteration }} </label>
                        </td>
                        <td>
                            <img src="@if ($user->profile->avatar_status == 1) {{ $user->profile->avatar }} @else {{ Gravatar::get($user->email) }} @endif" alt="{{ $user->name }}" class="user-avatar-nav user-challenge-report" />
                        </td>
                        <td class="">
                            <label name="img-user" class="label-challenge-name" for="">{{ $user->name }} </label>
                        </td>
                        <td>
                            @if($loop->first)
                            <i class="fa fa-trophy insigts-gold" aria-hidden="true"></i>
                            @endif @if($loop->iteration == 2)
                            <i class="fa fa-trophy insigts-silver" aria-hidden="true"></i>
                            @endif @if($loop->iteration == 3)
                            <i class="fa fa-trophy insigts-bronze" aria-hidden="true"></i>
                            @endif
                        </td>
                        <td class="tr-challenge-points">
                            <label name="img-user" class="label-challenge-points" for="">{{ $user->score }} Puntos</label>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
        </div>
        <div class="col-md-6">
            <table id="brands-check" class="table">
                @if ($subcategories)

                <tbody>
                    @foreach($subcategories as $subcategory)

                    <tr class="tr-challenge-two" style="background-color:{{$subcategory->color_brand}};">
                        <td class="sorting">
                            <label class="checkbox-two path cs-check">
                                <svg viewBox="0 0 21 21">
                                    <path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path>
                                </svg>
                            </label>
                            <img name="img-subcategory" src="{{ $subcategory->subcategory_image}}" alt="{{ $subcategory->subcategory_image}}" class="subcategory-challenge" />
                            <label class="sub-name">{{$subcategory->name}}</label>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection @section('footer_scripts') @include('scripts.reports') @endsection
