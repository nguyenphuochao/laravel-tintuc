<div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                    	Menu
                    </li>
@foreach($theloai as $tl)
                    <li href="#" class="list-group-item menu1">
                    	{{$tl->Ten}}
                    </li>
                    <ul>
                    @foreach($tl->loaitin as $l)
                		<li class="list-group-item">
                			<a href="loaitin/{{$l->id}}/{{$l->TenKhongDau}}.html">{{$l->Ten}}</a>
                		</li>
                		@endforeach
                    </ul>
@endforeach
                   
            </div>