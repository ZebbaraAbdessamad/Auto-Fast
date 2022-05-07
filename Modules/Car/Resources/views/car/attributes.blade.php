@foreach ($attributes as $attribute)
    <div class="panel" style="padding: 10px; margin-top:10px;margin-bottom:10px;">
        <div class="card-header"><strong>{{__('Attribute: :name',['name'=>$attribute->name])}}</div>
        <br/>
        <div class="panel-body">
            <div class="terms-scrollable overflow-auto" style="padding-left: 10px;">
         
        
                @foreach($attribute->terms as $term)
                <div  class="">
                    <label class="term-item">
                        <input @if(!empty($car_attr) and in_array($term->id, $car_attr) ) checked @endif type="checkbox" name="terms[{{$term->id}}]" value="{{$term->id}}">
                        <span class="term-name">{{$term->name}}</span>
                    </label>
                </div>  
                @endforeach
            
            </div>
        </div>
    </div>
@endforeach