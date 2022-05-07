    <div class="panel" style="padding: 15px;">
          <div class="card-header"><strong>Pricing</strong></div>
          <br/>
       <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="control-label">Number</label>
                            <input type="number" step="any" min="0" name="number" class="form-control" value="{{old('number',$car->number ?? '')}}" placeholder="Car Number">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Price</label>
                            <input type="number" step="any" min="0" name="price" class="form-control" value="{{old('price',$car->price ?? '')}}" placeholder="Car Price">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Sale Price</label>
                            <input type="number" step="any" name="sale_price" class="form-control" value="{{old('sale_price',$car->sale_price ?? '')}}" placeholder="Car Sale Price">
                            <span><i>If the regular price is less than the discount , it will show the regular price</i></span>
                        </div>
                    </div>
                </div>         
        </div>
    </div>
