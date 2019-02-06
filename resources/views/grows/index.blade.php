@extends('master')

@section('page_title')
	
	<div class="level">
		<div class="level-left">
			<div class="level-item">
				<h2 class="title">Grow Cycles</h2>
			</div>

			<div class="level-item">
				<div id="create_grow">
				 	<div v-if="showModal" class="modal is-active">
					  <div class="modal-background"></div>
					  	<div class="modal-content">
					  		<div class="box">
								@include('grows.create')
							</div>
					  	</div>
					</div>

					<button class="button is-small is-primary" @click="showModal = true">Create</button>
				</div>				
			</div>
		</div>

		<div class="level-right">
			{{-- <div class="level-item">Year </div> --}}
            <div class="level-item">
                <div class="select">
                	<select>
	                    <option>2019</option>
	                    <option>2018</option>
                  	</select>
                </div>
            </div>
		</div>

	</div>

@endsection

@section('content')

	<div class="columns is-multiline">
		@foreach($grows as $x)
		<div class="column is-6-tablet is-4-desktop is-3-widescreen">
           	<article class="box">
                <div class="media">
            	    <div class="media-left">
            	   		<span class="icon is-large has-text-warning">
	                    	<i class="fas fa-star fa-3x"></i>
	                  	</span>
				    </div>
	                <div class="media-content">
	                    <p class="title is-5 is-marginless">
	                    	<a href="/grows/{{ $x->id }}">{{ $x->cycle }} </a>
	                    </p>
	                    <p class="subtitle is-6 is-marginless">{{ $x->date_start }} -> {{ $x->date_end }} </p>
	                    <div class="content is-small">
	                      Sales: 
	                      <br>
	                      Cost:
	                      <br>
	                      <a href="user.html">Edit</a>
	                      <span>·</span>
	                      <a>Delete</a>
	                    <p></p>
	                  </div>
	                </div>
              	</div>
          	</article>
        </div>
        @endforeach
    </div>

@endsection

@section('scripts')

	<script type="text/javascript">
		
		var create_grow = new Vue({
		  el: '#create_grow',
		  data: {
		  	showModal: false,
		  }
		})

	</script>

@endsection