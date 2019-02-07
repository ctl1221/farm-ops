@extends('master')

@section('page_title')
	<div class="level">
		<div class="level-left">
			<div class="level-item">
				<h2 class="title">Grow Cycles</h2>
			</div>

			<div class="level-item">
			 	<div v-if="showModal" class="modal is-active">
				  <div class="modal-background"></div>
				  	<div class="modal-content">
						@include('grows.partials.create')
				  	</div>
				</div>

				<button class="button is-small is-primary" @click="showModal = true">Create</button>			
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
	            <p class="title is-5 is-marginless" style="padding-bottom: 0.5rem">
	                <a href="/grows/{{ $x->id }}">{{ $x->cycle }} : {{ $x->date_start }}</a>
	            </p>

                <div class="media" style="justify-content: center; align-items: center">
            	    <div class="media-left">
	                    <h1 class="subtitle is-1 has-background-primary" style="padding-left: 0.5rem; padding-right: 0.5rem; border-radius: 10px">75</h1>	
				    </div>
	                <div class="media-content">
	                    <p class="subtitle is-6 is-marginless"> </p>
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
		
		var app_body = new Vue({
		  el: '#app_body',
		  data: {
		  	showModal: false,
		  },
		  created() {
		  	this.showModal = false;
		  }
		})

	</script>

@endsection