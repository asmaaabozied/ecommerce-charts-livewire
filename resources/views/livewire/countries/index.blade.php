<section class="countries">

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="row">

                        <div class="col-xl-12 col-md-12 col-12">

                            <div class="row">
                                <div class="col-xl-8 col-md-8 col-8">
                                    <div class="card-icon">
                                        <img src="{{ asset('assets/front/images/icons/Group 201.png') }}"
                                             class="img-fluid" width="35px">
                                    </div>
                                    <h4 class="card-title">@lang('lang.countries') ({{$data['total']}})
                                        <span> </span>
                                    </h4>
                                </div>

                                <div class="col-xl-2 col-md-2 col-2">

                                    @can('create_countries')
                                        <a wire:click="toggleAddModal"
                                           data-backdrop="static" data-keyboard="false"
                                           class="pull-right btn">@lang('lang.create new')<i
                                                class="fa fa-arrow-circle-right"></i></a>
                                    @endcan
                                </div>
                                <div class="col-xl-2 col-md-2 col-2">
                                    <button type="button" class="btn btn-info filter-btn" data-toggle="collapse"
                                            data-target="#demo" style="margin:14px 0px;">Filter
                                    </button>

                                </div>
                            </div>
                        </div>


                        <div id="demo" class="collapse row" style="width:100%;margin:1%">

                            <div class="col-xl-4  col-md-4 col-lg-4 col-12 form-group">

                                <label class="">@lang('lang.name') </label>
                                <input wire:model="name"
                                       type="text" class="form-control"/>
                            </div>
                            <div class="col-xl-4  col-md-4 col-lg-4 col-12 form-group">

                                <label class="">Status

                                </label>
                                <select

                                    class="form-control date date1" id="GenderId"
                                    name="GenderId" placeholder="All" wire:model="active">
                                    <option selected disabled> Select</option>
                                    <option value="1">@lang('lang.active')</option>
                                    <option value="0">@lang('lang.nonactive')</option>
                                </select>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <div class="card-body">
            <div class="toolbar">
                @if (flash()->message)
                    <div class=" btn btn-success form-control  alert alert-box">
                        {{ flash()->message }}
                    </div>
            @endif
            <!--        Here you can write extra buttons/actions for the toolbar              -->


                <div class="row">

                    <div class="col-xl-2  col-lg-2 col-md-3 col-3">

                        <button wire:click="export"

                                class="form-control"> @lang('lang.export')</button>

                    </div>
                    <div class="col-xl-2  col-lg-2 col-md-3 col-3">

                        <button wire:click="exportCsv"

                                class="form-control"> @lang('lang.csv')</button>

                    </div>
                    <div class="col-xl-2 col-lg-2  col-md-3 col-3">

                        <button wire:click="exportPdf"

                                class="form-control"> @lang('lang.pdf')</button>

                    </div>
                </div>


            </div>


            <div class="material-datatables table-responsive table">
                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                       cellspacing="0" width="100%" style="width:100%">
                    <thead>
                    @if($data['countries'] !== 'null' && count($data['countries'] )>0)
                        <tr>
                            <th>@lang('lang.id')</th>
                            <th>@lang('lang.name')</th>

                            <th>@lang('lang.created_at')</th>


                            <th class="disabled-sorting text-right"></th>
                        </tr>

                    </thead>

                    <tbody>


                    @foreach($data['countries']  as $country)
                        <tr>
                            <td><input type="checkbox"
                                       aria-label="Checkbox for following text input"></td>
                            <th>{{$country->name}}</th>
                            <th>{{isset($country->created_at) ?$country->created_at->diffForHumans() :''}}

                            </th>


                            <td class="text-right">
                                @can('update_countries')
                                    <a data-toggle="modal" onclick="RenderActions1('')"
                                       data-backdrop="static" data-keyboard="false"
                                       wire:click="toggleEditModal({{$country->id}})"
                                       title="Click to edit"
                                       class="btn" style="padding:0;"> <i
                                            class="material-icons"><img
                                                src="{{ asset('assets/front/images/icons/edit1.png') }}"
                                                class="img-fluid" width="25px"></i></a>
                                @endcan

                                @can('delete_countries')
                                    <a onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                       wire:click="destroy({{$country->id}})"><i
                                            class="material-icons"><img
                                                src="{{ asset('assets/front/images/icons/trash1.png') }}"
                                                class="img-fluid" width="25px"></i>
                                    </a>
                                @endcan
                            <!--  <a class="btn remove" rel="tooltip" href="javascript:void(0);"
                                                   wire:click="destroy({{$country->id}})">

                                                    <i class="material-icons"><img
                                                            src="{{ asset('assets/front/images/icons/trash1.png') }}"
                                                            class="img-fluid" width="25px"></i>

                                                </a> -->

                                @can('read_countries')
                                    <a data-toggle="modal" wire:click="toggleShowModal({{$country->id}})"
                                       data-backdrop="static" data-keyboard="false"
                                       onclick="RenderActions('/Users/EditUser/ed3256e3-9e4f-4ea4-a985-3f507ea89689')"
                                       title="Click to edit" data-target="#modalUser1" class="btn"
                                       style="padding:0;"> <i class="material-icons"><img
                                                src="{{ asset('assets/front/images/icons/menu-dots-vertical.png') }}"
                                                class="img-fluid" width="25px"></i></a>
                                @endcan

                            </td>
                        </tr>
                    @endforeach

                    @else
                        <div class="col-12 d-flex justify-content-center align-items-center"
                             style="height: 300px;">
                            <div class="col-12 d-inline-block text-center">
                                <i class="fa fa-table fa-5x" aria-hidden="true"></i>
                                <br><br>
                                <p> @lang('lang.no_data') <p>
                            </div>
                        </div>
                    @endif

                    {{--                    //editpopModal--}}
                    @if($EditModelOpened==true)
                        @include('livewire.countries.edit')

                        {{--                        // showpopModal--}}
                    @elseif($ShowModelOpened==true)

                        @include('livewire.countries.show')


                        <!-- createpopModal -->
                    @elseif($AddModelOpened==true)

                        @include('livewire.countries.create')
                    @endif

                    </tbody>
                </table>
            </div>
        </div>


    </div>

    <!-- end content-->

    <!--  end card  -->


</section>


<!-- end row -->

<!-- /.box -->

@if(count($data['countries'] )>0)
    <div class="align-center">
        {!! $data['countries']->links()  !!}
    </div>
    @endif

    </section>
