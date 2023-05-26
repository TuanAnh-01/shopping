<div class="col-md-12">
    <div class="box grid-box">

        <div class="box-header with-border">
            <div class="pull-right">

            </div>
            <div class="pull-left">
                <div class="btn-group grid-select-all-btn" style="display:none;margin-right: 5px;">
                    <a class="btn btn-sm btn-default hidden-xs"><span class="selected"></span></a>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" class="grid-batch-0">Batch delete </a></li>
                    </ul>
                </div>
                <div class="btn-group" style="margin-right: 5px" data-toggle="buttons">
                    <label class="btn btn-sm btn-dropbox 646f06eaa062c-filter-btn " title="Filter">
                        <a href ='/admin/orders' style="color: #fff"> Quay lại</a>

                    </label>

                </div>
            </div>
        </div>

        <div class="box-header with-border hide filter-box" id="filter-box">
            <form action="http://127.0.0.1/admin/filter-prices?_pjax=%23pjax-container" class="form-horizontal"
                  pjax-container="" method="get">

                <div class="row">
                    <div class="col-md-12">
                        <div class="box-body">
                            <div class="fields-group">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"> ID</label>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>

                                            <input type="text" class="form-control id" placeholder="ID" name="id"
                                                   value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="btn-group pull-left">
                                    <button class="btn btn-info submit btn-sm"><i class="fa fa-search"></i>&nbsp;&nbsp;Search
                                    </button>
                                </div>
                                <div class="btn-group pull-left " style="margin-left: 10px;">
                                    <a href="http://127.0.0.1/admin/filter-prices?_pjax=%23pjax-container"
                                       class="btn btn-default btn-sm"><i class="fa fa-undo"></i>&nbsp;&nbsp;Reset</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>


        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover grid-table" id="grid-table646f06ea9d4b9">
                <thead>
                <tr>
                    <th class="column-__row_selector__">

                    </th>
                    <th class="column-id">Id</th>
                    <th class="column-price_min">Name</th>
                    <th class="column-price_max">Images</th>
                    <th class="column-created_at">Quantity</th>
                    <th class="column-updated_at">Price</th>

                </tr>
                </thead>


                <tbody>
                @foreach($order_detail as $o)
                    <tr data-key="3">
                        <td class="column-__row_selector__">

                        </td>
                        <td class="column-id">
                            {{ $o->id }}
                        </td>
                        <td class="column-price_min">
                            {{ $o->name }}
                        </td>
                        <td class="column-price_max">
                            <img style="width: 65px;height: 70px;" src="../../images/{{$o->images}}" alt="">
                        </td>
                        <td class="column-created_at">
                            {{ $o->quantity }}
                        </td>
                        <td class="column-updated_at">
                            ${{number_format($o->quantity* $o->price, 0, ',', '.')}}
                        </td>

                    </tr>
                @endforeach



                </tbody>


            </table>

        </div>



        <!-- /.box-body -->
    </div>
</div>
