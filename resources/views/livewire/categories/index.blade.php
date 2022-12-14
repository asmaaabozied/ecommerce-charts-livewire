<style>
    .pull-left{
            float: left;
    background-color: #323946 !important;
    height: 40px;
    padding: 4px 7px;
    margin-top: 15px;
    box-shadow: 0 1px 4px 0 #262c39;
    color: #D1B030 !important
    }
    button.export_btn{
         padding: 0.625rem 0.75rem;
    transition: all .15s cubic-bezier(.68, -.55, .265, 1.55);
    color: #8898aa;
    border: 1px solid #1B222C;
    border-radius: 0.25rem;
    background-color: white;
    background-clip: padding-box;
    box-shadow: 0 3px 2px rgb(233 236 239 / 5%);
    }

</style>
   
    <section class="categories">

        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="row">

                            <div class="col-xl-12 col-md-12 col-12">

                                <div class="row">
                                    <div class="col-xl-7 col-md-7 col-12">
                                        <div class="card-icon">
                                            <img src="{{ asset('assets/front/images/icons/Group 201.png') }}"
                                                 class="img-fluid" width="35px">
                                        </div>
                                        <h4 class="card-title">@lang('lang.categories') ({{$data['total']}})
                                            <span> </span>
                                        </h4>
                                    </div>
                                                             @can('create_categories')

                                    <div class="col-xl-3 col-md-3 col-8">
                                      
                                                @include('livewire.categories.create')


                                    </div>
                                                                            @endcan

                                    <div class="col-xl-2 col-md-2 col-4">
                                        <button type="button" class="btn btn-info filter-btn" data-toggle="collapse"
                                                data-target="#demo" style="margin:14px 0px;">
                                                    <span>@lang('filter')</span>
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

                        <div class="row ">

                            <div class="col-xl-2  col-lg-2 col-md-3 col-3">

                                <button wire:click="export"

                                        class="export_btn"> @lang('lang.export')</button>

                            </div>
                            <div class="col-xl-2  col-lg-2 col-md-3 col-3">

                                <button wire:click="exportCsv"

                                        class="export_btn"> @lang('lang.csv')</button>

                            </div>
                            <div class="col-xl-2 col-lg-2  col-md-3 col-3">

                                <button wire:click="exportPdf"

                                        class="export_btn"> @lang('lang.pdf')</button>

                            </div>
                        </div>


                </div>


                <div class="material-datatables table-responsive table">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover"
                           cellspacing="0" width="100%" style="width:100%">
                        <thead>
                        @if($data['categories'] !== 'null' && count($data['categories'] )>0)
                            <tr>
                                <th>@lang('lang.id')</th>
                                <th>@lang('lang.name')</th>

                                <th>@lang('lang.created_at')</th>
                                <th>@lang('lang.image')</th>

                                <th class="disabled-sorting text-right"></th>
                            </tr>

                        </thead>

                        <tbody>


                        @foreach($data['categories']  as $category)
                            <tr>
                                <td><input type="checkbox"
                                           aria-label="Checkbox for following text input"></td>
                                <th>{{$category->name}}</th>
                                <th>{{isset($category->created_at) ?$category->created_at->diffForHumans() :''}}

                                </th>

                                <td><span><img
                                            src="{{ $category->image_path }}"
                                            class="img-fluid" width="100px"></span></td>
                                <td class="text-right">
                                    @can('update_categories')
                                    <a data-toggle="modal" onclick="RenderActions1('')"  data-backdrop="static" data-keyboard="false"
                                       wire:click="toggleEditModal({{$category->id}})"
                                       title="Click to edit"
                                       class="btn" style="padding:0;"> <i
                                            class="material-icons"><img
                                                src="{{ asset('assets/front/images/icons/edit1.png') }}"
                                                class="img-fluid" width="25px"></i></a>
                                    @endcan
                                        @can('delete_categories')
                                    <a onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                       wire:click="destroy({{$category->id}})"><i
                                            class="material-icons"><img
                                                src="{{ asset('assets/front/images/icons/trash1.png') }}"
                                                class="img-fluid" width="25px"></i>
                                    </a>
                                    @endcan
                                <!--  <a class="btn remove" rel="tooltip" href="javascript:void(0);"
                                                   wire:click="destroy({{$category->id}})">

                                                    <i class="material-icons"><img
                                                            src="{{ asset('assets/front/images/icons/trash1.png') }}"
                                                            class="img-fluid" width="25px"></i>

                                                </a> -->

                                        @can('read_categories')
                                    <a data-toggle="modal" wire:click="toggleShowModal({{$category->id}})"
                                       data-backdrop="static" data-keyboard="false"      onclick="RenderActions('/Users/EditUser/ed3256e3-9e4f-4ea4-a985-3f507ea89689')"
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

                        {{--//editpopModal--}}
                        @if($EditModelOpened==true)
                            @include('livewire.categories.edit')

                            {{--// showpopModal--}}
                        @elseif($ShowModelOpened==true)

                            @include('livewire.categories.show')


                            <!-- createpopModal -->
                        @elseif($AddModelOpened==true)

                            @include('livewire.categories.create')
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

@if(count($data['categories'] )>0)
    <div class="align-center">
        {!! $data['categories']->links()  !!}
    </div>
    @endif

    </section>

    </div>










