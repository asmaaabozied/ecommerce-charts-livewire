<div>
    <section class="roles">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">



                        <div class="card-header card-header-primary card-header-icon">
                            <div class="row">

                                <div class="col-xl-12 col-md-12 col-12">

                                    <div class="row fold_size">
                                        <div class="col-xl-8 col-md-8 col-12">
                                            <div class="card-icon">
                                                <img src="{{ asset('assets/front/images/icons/Group 201.png') }}"
                                                     class="img-fluid" width="35px">
                                            </div>
                                            <h4 class="card-title">@lang('lang.accountdetail') ()
                                                <span> </span>
                                            </h4>
                                        </div>

                                        <div class="col-xl-2 col-md-2 col-8">
                                            @include('livewire.AccountDetail.createaccountdetail')

                                        </div>
                                        <div class="col-xl-2 col-md-2 col-4">
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

                        <div class="card-body">
                            <div class="toolbar">
                                @if (flash()->message)
                                    <div class=" btn btn-success form-control  alert alert-box">
                                        {{ flash()->message }}
                                    </div>
                            @endif

                            <div class="row fold_size">

<div class="col-xl-2  col-lg-2 col-md-3 col-4">

    <button wire:click="export"

            class="form-control"> @lang('lang.export')</button>

</div>
<div class="col-xl-2  col-lg-2 col-md-3 col-4">

    <button wire:click="exportCsv"

            class="form-control"> @lang('lang.csv')</button>

</div>
<div class="col-xl-2 col-lg-2  col-md-3 col-4">

    <button wire:click="exportPdf"

            class="form-control"> @lang('lang.pdf')</button>

</div>
</div>
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="material-datatables table-responsive table">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                       cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    @if($data !== 'null' && count($data )>0)
                                        <tr>

                                            <td>@lang('lang.NO')</td>
                                            <td>@lang('lang.ACCOUNT EMAIL')</td>

                                            <td>@lang('lang.FIRST NAME')</td>
                                            <td>@lang('lang.LAST NAME')</td>
                                            <td>@lang('lang.ADDRESS')</td>

                                            <th>@lang('lang.created_at')</th>

                                            <th class="disabled-sorting text-right"></th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                    @foreach($data as $row)

                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{$row->account_email}}</td>

                                                <td>{{$row->first_name}}</td>
                                                <td>{{$row->last_name}}</td>
                                                <td>{{$row->address}}</td>
                                                <td>{{$row->created_at}}</td>
                                                <td>
                                                @include('livewire.AccountDetail.updateaccountdetail')
                                                    <a wire:click="destroy({{$row->id}})" class="btn"><img
                                                            src="{{ asset('assets/front/images/icons/trash1.png') }}"
                                                            class="img-fluid" width="25px"></a>
                                                </td>
                                            </tr>

                                    @endforeach

                                    @else
                                        <div class="col-12 d-flex justify-content-center align-items-center"
                                             style="height: 300px;">
                                            <div class="col-12 d-inline-block text-center">
                                            <i class="fa fa-table fa-5x" aria-hidden="true"></i>
                                                    <br><br>
                                                @lang('lang.no_data')
                                            </div>
                                        </div>
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end content-->
                    </div>
                    <!--  end card  -->
                </div>
                <!-- end col-md-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- /.box -->

    </section>

</div>
